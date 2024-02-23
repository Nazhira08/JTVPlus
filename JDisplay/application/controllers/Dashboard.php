
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct() {
    parent::__construct();
     $this->data['id_menu']= 0;
     $this->data['id_menu_awal']=1;
    // $this->data['id_menu']= $this->db->select('id')->where('site','Dashboard')->get('menu')->result_array()[0]['id'];
   }
	public function index()
	{
		//if ($this->session->userdata('level') != 'admin' && $this->session->userdata('level') != 'hrd' ) {

		if(cari_level($this->session->userdata('level'))=='0') {
			redirect('login');
		}
		
			$this->data['menu'] = $this->db
          ->select('c.*')
          ->join('menu c', 'p.id = c.id', 'LEFT')   
          ->where('p.nip',$this->session->userdata('username') )
          ->where('c.tree_menu=0')
          ->order_by('c.urutan','ASC') 
           ->get("menu_user p"); 
       $this->data['menu_default'] = $this->db
          ->select('*')
          ->where("default_menu='1'") 
          ->order_by('urutan','ASC') 
           ->get("menu");

		  $this->data['home'] = $this->session->userdata('ftp_home');

		  $this->data['direktori'] = $this->input->get('home');
		  if($this->input->post('home')){
			if(strlen($this->input->post('home'))>0) $this->data['direktori'] = $this->input->post('home');  
		  }
		  
          
          

	        $this->data['tombol'] = 'Kirim';  
	        $this->data['judul'] = 'dashboard';
	        $this->data['alamat'] = 'dashboard';  
	        $this->data['action'] = site_url(uri_string());

			$this->data['konten'] = 'admin/dashboard';
			$this->load->view('admin/layout/index', $this->data);
		}




}
/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
