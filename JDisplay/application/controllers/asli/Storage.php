<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storage extends MY_Controller {
  
  private $pk = 'id';
  private $table = 'storage';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Storage')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Storage')->get('menu')->result_array()[0]['id'];
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
    $this->data['judul'] = 'Storage';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/storage/index';
    $this->load->view('admin/layout/index', $this->data);
  }

public function tambah() {
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



      if ($_POST) 
      {
        //sleep(2);
        $ada_storage = $this->db->where('nama_storage', $this->input->post('nama_storage'))->from('storage')->count_all_results();
        if($ada_storage==0)
        {  
            if ($this->validation()) 
            {
                $this->db->insert('storage', $this->field_data()); 
            } 
            else 
            {
                    $this->session->set_flashdata('alert', alert('Simpan','Semua kolom harus diisi'));
            }
        }
        else //user ada
        {
             $this->session->set_flashdata('alert', alert('Simpan', 'Nama Storage Sudah ada Mohon Gunakan nama lain'));
        }

         redirect($this->uri->segment(1));
      } 

         $this->data['action'] = site_url(uri_string());
          $this->data['tombol'] = 'SAVE';
         $this->data['konten'] = 'admin/storage/add';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
   }
public function delete() {
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
          $this->db->query("delete from storage where id='". $this->input->post('id')."'"); 
          $this->session->set_flashdata('alert', alert('Delete', 'Data Berhasil Didelete'));

                
                      if ($this->m_database->update($this->pk,$this->input->post('id'), $this->table, $this->field_data_edit())) 
                        {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                        }
                        else
                         {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                         } 

         redirect($this->uri->segment(1));
      } elseif ($id && $id != 0 && ctype_digit((string) $id)) {
         $this->data['judul'] = 'BLOCK IP';
         $this->data['image'] = 'fa fa-trash-o';
         $this->data['tombol'] = 'Delete';
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


         $this->data['konten'] = 'admin/storage/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      } else {
         $this->session->set_flashdata('alert', alert('error', status('404')));
         redirect($this->uri->segment(1));
      }
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
         //edit data yang sudah dirubah
                
                      if ($this->m_database->update($this->pk,$this->input->post('id'), $this->table, $this->field_data_edit())) 
                        {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                        }
                        else
                         {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                         } 
                
        
         redirect($this->uri->segment(1));
      } elseif ($id && $id != 0 && ctype_digit((string) $id)) {
         $this->data['judul'] = 'BLOCK IP';
         $this->data['image'] = 'fa fa-edit';
         $this->data['tombol'] = 'Update';
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


         $this->data['konten'] = 'admin/storage/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      } else {
         $this->session->set_flashdata('alert', alert('error', status('404')));
         redirect($this->uri->segment(1));
      }
   }
   
  private function field_data($photo = NULL) {
      $data['nama_storage'] = $this->input->post('nama_storage');
      $data['jenis_storage'] = $this->input->post('jenis_storage');
      $data['capacity'] = $this->input->post('capacity');
      $data['sn'] = $this->input->post('sn');
      $data['tgl'] =date('Y-m-d H:i:s');
      return $data;
   }

    private function field_data_edit($photo = NULL) {
      $data['nama_storage'] = $this->input->post('nama_storage');
      $data['jenis_storage'] = $this->input->post('jenis_storage');
      $data['capacity'] = $this->input->post('capacity');
      $data['sn'] = $this->input->post('sn');
      return $data;
   }
    private function field_data_update($photo = NULL) {
      $data['open'] = $this->input->post('open');
      return $data;
   }
  

  public function validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nama_storage', 'nama_storage', 'trim|required');
    $this->form_validation->set_rules('jenis_storage', 'jenis_storage', 'trim|required');
    $this->form_validation->set_rules('capacity', 'capacity', 'trim|required');
    $this->form_validation->set_rules('sn', 'sn', 'trim|required');
    $this->form_validation->set_error_delimiters('<i class="icon-remove-sign"></i> ', '<br>');
    return $this->form_validation->run();   
  }

}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */