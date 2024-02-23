<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lockip extends MY_Controller {
  
  private $pk = 'id';
  private $table = 'ip_blacklist';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Lockip')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Lockip')->get('menu')->result_array()[0]['id'];
    $this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];
  } 

  public function index()
  {
    //$this->data['query'] = $this->db->order_by('cso', 'DESC')->get($this->table);
    
    
    $this->data['menu'] = $this->db
          ->select('c.*')
          ->join('menu c', 'p.id = c.id', 'LEFT')   
          ->where('p.nip',$this->session->userdata('username') ) 
          ->order_by('c.urutan','ASC') 
           ->where('c.tree_menu=0') 
           ->get("menu_user p"); 
       $this->data['menu_default'] = $this->db
          ->select('*')
          ->where("default_menu='1'") 
          ->order_by('urutan','ASC')
           ->get("menu"); 

    
          $this->data['query'] = $this->db
          ->select('*')
          ->order_by('id','DESC')
           ->get($this->table);  

    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Whitelist IP Banned';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/lockip/index';
    $this->load->view('admin/layout/index', $this->data);
  }


public function update() {
      $this->data['menu'] = $this->db
          ->select('c.*')
          ->join('menu c', 'p.id = c.id', 'LEFT')   
          ->where('p.nip',$this->session->userdata('username') ) 
          ->order_by('c.urutan','ASC') 
          ->where('c.tree_menu=0')
           ->get("menu_user p"); 

        $this->data['menu_default'] = $this->db
          ->select('*')
          ->where("default_menu='1'") 
          ->order_by('urutan','ASC')
           ->get("menu"); 

      $id = $this->uri->segment(3);


      if ($_POST) {

                //edit data yang sudah dirubah
                
                  if ($this->m_database->update($this->pk, $id, $this->table, $this->field_data())) 
                  {
                       $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                  }
                  else
                   {
                       $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                   }

         redirect($this->uri->segment(1));
      } elseif ($id && $id != 0 && ctype_digit((string) $id)) {
         $this->data['judul'] = 'LOCK IP';
         $this->data['tombol'] = 'UPDATE';
         $this->data['action'] = site_url(uri_string());
         $this->data['jenis_update'] = 'update';
         $this->data['posts'] = $this->data['post'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');

          $this->data['query'] = $this->db
          ->select('*')
          ->where('id',$id)
           ->get($this->table)->row_array();


          $this->data['user_menunya'] = $this->db 
           ->where('default_menu=0') 
           ->where('tree_menu=0') 
          ->order_by('urutan')
           ->get('menu');


         $this->data['konten'] = 'admin/lockip/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      } else {
         $this->session->set_flashdata('alert', alert('error', status('404')));
         redirect($this->uri->segment(1));
      }
   }
   
  private function field_data($photo = NULL) {
      $data['open_banned'] = $this->input->post('open_banned');
      $data['alasan_open'] = $this->input->post('alasan_open');
      $data['tgl_open'] =date('Y-m-d H:i:s');
      return $data;
   }
  

  public function validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('open_banned', 'open_banned', 'trim|required');
    $this->form_validation->set_rules('alasan_open', 'alasan_open', 'trim|required');
    $this->form_validation->set_error_delimiters('<i class="icon-remove-sign"></i> ', '<br>');
    return $this->form_validation->run();   
  }

}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */