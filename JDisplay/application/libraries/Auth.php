<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	/**
	 * The CodeIgniter super object
	 *
	 * @var object
	 * @access public
	 */
	public $CI;

	/**
	 * Class constructor
	 */
	public function __construct() {
		$this->CI = &get_instance();
	}

	/**
	 * login()
	 * Fungsi untuk mengecek ketersediaan account users dalam proses login
	 * @access     public
	 * @param    string
	 * @return     bool
	 */
	public function login($username, $password) {
		$where = "username='$username' and aktif='1'";
		$result = $this->CI
						->db
						->where($where)
						->limit(1)
						->get('users');
		if ($result->num_rows() == 0) {
			$this->input_logged_in_failed($username, $password);
			return false;
		} else {
			$data = $result->row();
			if (password_verify($password, $data->password)) {
				$session_data = [];
				$session_data['id_user'] = $data->id_user;
				$session_data['username'] = $data->username;
				$session_data['level'] = $data->level;
				$session_data['TV'] = $data->TV;
				$session_data['is_logged_in'] = true;
				$session_data['display_name'] = $data->display_name;
				$session_data['photo'] = $data->photo;
				$session_data['ftp_user'] = $data->ftp_user;
				$session_data['ftp_pass'] = $data->ftp_pass;
				$session_data['ftp_home'] = $data->ftp_home;
				$this->CI->session->set_userdata($session_data);
				$this->last_logged_in();
				$this->input_logged_in();
				return true;
			}
			$this->input_logged_in_failed($username, $password);
			return false;
		}
	}

		  function get_real_ip()
		  {

		      if (isset($_SERVER["HTTP_CLIENT_IP"]))
		      {
		          return $_SERVER["HTTP_CLIENT_IP"];
		      }
		      elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
		      {
		          return $_SERVER["HTTP_X_FORWARDED_FOR"];
		      }
		      elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
		      {
		          return $_SERVER["HTTP_X_FORWARDED"];
		      }
		      elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
		      {
		          return $_SERVER["HTTP_FORWARDED_FOR"];
		      }
		      elseif (isset($_SERVER["HTTP_FORWARDED"]))
		      {
		          return $_SERVER["HTTP_FORWARDED"];
		      }
		      else
		      {
		          return $_SERVER["REMOTE_ADDR"];
		      }
		  }


	private function last_logged_in() {
		$data = [
			'last_logged_in' => date('Y-m-d H:i:s'),
			'ip_address' => $_SERVER['REMOTE_ADDR'],
		];
		$this->CI->db
			->where('username', $this->CI->session->userdata('username'))
			->update('users', $data);
	}

	private function input_logged_in() {
		$data = [
			'tanggal' => date('Y-m-d H:i:s'),
			'ip' => $this->get_real_ip(),
			'usernya' => $this->CI->session->userdata('username'),
			'status' => 'Success',
			'tgl' => date('Y-m-d'),
		];
		$this->CI->db
			//->where('username', $this->CI->session->userdata('username'))
			->insert('user_masuk', $data);
	}

	private function input_logged_in_failed($username,$password) {
		$data = [
			'tanggal' => date('Y-m-d H:i:s'),
			'ip' => $this->get_real_ip(),
			'usernya' => $username,
			'status' => 'Failled',
			'password' =>$password,
			'tgl' => date('Y-m-d'),
		];
		$this->CI->db
			->insert('user_masuk', $data);
		$block_kali= $this->CI->db
               ->where('ip_banned',$this->get_real_ip()) 
               ->where('open_banned','1') 
              ->from('ip_blacklist')->count_all_results();
		$block_ip= $this->CI->db
               ->where('ip',$this->get_real_ip()) 
               ->where('status','Failled') 
              ->from('user_masuk')->count_all_results();
        if($block_kali==0) $block_kali=1;
        if($block_ip>=($block_kali*10))
        {
        	$data = [
			'tgl_ban' => date('Y-m-d H:i:s'),
			'ip_banned' => $this->get_real_ip(),
			'alasan_banned' => 'user salah 10 kali',
			'open_banned' => '0',
			];
			$this->CI->db
			->insert('ip_blacklist', $data);
        }      

	}

	private function input_logged_out() {
		 $date_in= $this->CI->db
               ->select('tanggal')
               ->where('status','Success' ) 
               ->where('usernya', $this->CI->session->userdata('username'))   
               ->where('logout is Null' )   
               ->get('user_masuk' )->result_array()[0]['tanggal'];
         $begin = new DateTime($date_in);
		 $end = new DateTime(date('Y-m-d H:i:s'));
		 $diff = $begin->diff($end);

		$data = [
			'logout' => date('Y-m-d H:i:s'),
			'time_login' => $diff->h.":".$diff->i.":".$diff->s ,
		];
		$this->CI->db
			->where('usernya', $this->CI->session->userdata('username'))
			->where('status','Success')
			->where('logout is Null' ) 
			->update('user_masuk', $data);
	}
	/**
	 * is_logged_in()
	 * Fungsi untuk mengecek apakah data session user id kosong / tidak
	 * @access   public
	 * @return   bool
	 */
	public function is_logged_in() {
		return $this->CI->session->userdata('is_logged_in');
	}

	/**
	 * restrict()
	 * Fungsi untuk memvalidasi status login
	 * @access   public
	 * @return   bool
	 */
	public function restrict() {
		if (!$this->is_logged_in()) {
			redirect(base_url());
		}
	}

	/**
	 * logout()
	 * Fungsi untuk menghapus data session user
	 * @return   void
	 */
	public function logout() {
		$this->CI->session->sess_destroy('is_logged_in');
		$this->input_logged_out();
	}
}