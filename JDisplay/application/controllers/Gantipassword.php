<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantipassword extends MY_Controller {
	
	private $pk = 'is_user';
	private $table = 'users';
  
public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    if (cari_hak_akses($this->session->userdata('username'),'Gantipassword')=="0") redirect('dashboard');
    $this->data['id_menu']=  $this->db->select('id')->where("site",'gantipassword')->get('menu')->result_array()[0]['id'];
    $this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'gantipassword')->get('menu')->result_array()[0]['tree_menu'];
  }

  
	public function index()
	{
		//$this->data['query'] = $this->db->order_by('cso', 'DESC')->get($this->table);
    $this->data['menu'] = $this->db
          ->select('c.*')
          ->join('menu c', 'p.id = c.id', 'LEFT')   
          ->where('c.tree_menu=0') 
          ->where('p.nip',$this->session->userdata('username') ) 
          ->order_by('c.urutan','ASC') 
           ->get("menu_user p"); 
    $this->data['menu_default'] = $this->db
          ->select('*')
          ->where("default_menu='1'") 
          ->order_by('urutan','ASC')
           ->get("menu"); 
     
      if ($_POST) {
         if ($this->validation()) {
               
              $data['password'] = $this->input->post('password');
              $data['password1'] = $this->input->post('password1');
              $data['password2'] = $this->input->post('password2');
              $data['ecryp_pass']=crypt($data['password'] , '$2y$10$qLgN1yw69/Xsy7W57RiZ8OkFcIGGqRakhqKQzJ5DQeJE2l/jEqRX6'); 
              $data['ecryp_pass1']=crypt($data['password1'], '$2y$10$qLgN1yw69/Xsy7W57RiZ8OkFcIGGqRakhqKQzJ5DQeJE2l/jEqRX6'); 
              //pass sama antara pass dan repass
              if( $data['password1'] == $data['password2'] )
              {
                 //pass lama sama
                if($this->db->from(users)->where('username',$this->session->userdata('username'))->where('password',$data['ecryp_pass'])->count_all_results()==1)
                {
                      $this->db->query("update users set password = '". $data['ecryp_pass1'] ."' where username='".$this->session->userdata('username')."'");
                      $this->session->set_flashdata('alert', alert('Edit', 'Data Password Berhasil Diedit'));

            
                }
                else 
                {
                      $this->session->set_flashdata('alert', alert('Edit', 'Data Gagal di edit - Password lama salah / Tidak cocok '));
                }
              }
              else 
                {
                      $this->session->set_flashdata('alert', alert('Edit', 'Data Gagal di edit - Password Dan Re Password tidak sama '));
                }
            }
         redirect($this->uri->segment(1));
      } else {
         $this->data['judul'] = 'Edit Data';
         $this->data['tombol'] = 'UPDATE';
         $this->data['action'] = site_url(uri_string());
         $this->data['jenis_update'] = 'update';
         $this->data['posts'] = $this->data['post'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');

         $this->data['konten'] = 'admin/gantipassword/index';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      }
	}


   private function validation() {
      $this->load->library('form_validation');
       $this->form_validation->set_rules('password', 'password', 'trim|required');  
      $this->form_validation->set_rules('password1', 'password1', 'trim|required');
      $this->form_validation->set_rules('password2', 'password2', 'trim|required');
      $this->form_validation->set_error_delimiters('', '<br>');
      return $this->form_validation->run();
   }






}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */