<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {
	
	private $pk = 'id';
	private $table = 'menu';

  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
     if (cari_hak_akses($this->session->userdata('username'),'Menu')=="0") redirect('dashboard');
     $this->data['id_menu']=  $this->db->select('id')->where("site",'menu')->get('menu')->result_array()[0]['id'];
     $this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'menu')->get('menu')->result_array()[0]['tree_menu'];
  } 

	public function index()
	{
		//$this->data['query'] = $this->db->order_by('cso', 'DESC')->get($this->table);
		 
          $this->data['query'] = $this->db
          ->select('*')
           ->order_by('id')
           ->get($this->table); 


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

    $this->data['action'] = site_url(uri_string());
		$this->data['judul'] = 'Menu';
		$this->data['tombol'] = 'Cari';

		
		$this->data['alert'] = $this->session->flashdata('alert');
		$this->data['konten'] = 'admin/menu/index';
		$this->load->view('admin/layout/index', $this->data);
	}

   public function tambah()
   {
      
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
           
      if($this->db->from('menu')->count_all_results()==0)
      {
        $this->data['id_nya']='1';
      }
    else
      {
        $this->data['id_nya']=$this->db->select('max(id) as idnya2')->get('menu')->result_array()[0]['idnya2'] + 1;
      }

      $this->data['jenis_update'] = 'tambah';
      if ($_POST) {
        $ada=$this->db->from('menu')->where('nama',$this->input->post('nama'))->count_all_results();
        //$this->data['jumkaryawan'] = $this->db->from('karyawan')->where('tgl_keluar is null')->where('tv="JTV"')->count_all_results();
        if($ada==1)
        {
            $this->session->set_flashdata('alert', alert('Simpan', 'Data gagal disimpan Karena ada nama menu yang sama'));
        } 
        else
        {
           if ($this->validation()) 
           {
              if ($this->db->insert($this->table, $this->field_data())) {
                 $this->session->set_flashdata('alert', alert('Simpan', 'Data berhasil disimpan'));
              } else {
                 $this->session->set_flashdata('alert', alert('Simpan', 'Data gagal disimpan'));
              }
           } else {
              $this->session->set_flashdata('alert', alert('Simpan', 'Data gagal disimpan'));
          }
        }
         redirect(uri_string());
         
      } else {
         $this->data['judul'] = 'Tambah Menu';
         //$this->data['jenis_update'] = 'tambah';
         $this->data['tombol'] = 'Simpan';
         $this->data['action'] = site_url(uri_string());
         $this->data['alert'] = $this->session->flashdata('alert');
         $this->data['query'] = FALSE;
         $this->data['konten'] = 'admin/menu/tambah';
         $this->load->view('admin/layout/index', $this->data);
      }
   }

public function update() {
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

      $id = $this->uri->segment(3);
      $this->data['id_nya']=$id;
      if ($_POST) {
         if ($this->validation()) {
               if ($this->m_database->update($this->pk, $id, $this->table, $this->field_data('update'))) {
                  $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
               } else {
                  $this->session->set_flashdata('alert', alert('Edit', 'Data gagal Diedit'));
               }
            }
         redirect($this->uri->segment(1));
      } elseif ($id && $id != 0 && ctype_digit((string) $id)) {
         $this->data['judul'] = 'Edit Data';
         $this->data['tombol'] = 'UPDATE';
         $this->data['action'] = site_url(uri_string());
         $this->data['jenis_update'] = 'update';
         $this->data['posts'] = $this->data['post'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');

         $this->data['query'] = $this->db
                                ->select('*')
                                 ->where('id',$id ) 
                                 ->get($this->table )->row_array();
         $this->data['konten'] = 'admin/menu/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      } else {
         $this->session->set_flashdata('alert', alert('error', status('404')));
         redirect($this->uri->segment(1));
      }
   }


   public function delete() {
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

      $id = $this->uri->segment(3);
      $this->data['id_nya']=$id;
      if ($_POST) {
              if($this->db->select('count(*) as jumlahnya')->where('id',$id)->get('menu_user')->result_array()[0]['jumlahnya']==0)
              {
                $this->db->query("delete from menu where id='". $id."'");
                $this->session->set_flashdata('alert', alert('Delete','Data Berhasil di hapus'));          
              }
            else
            {
                $this->session->set_flashdata('alert', alert('Delete','Data Gagal di hapus Karena ada di menu user'));          
            }
         redirect($this->uri->segment(1));
      } elseif ($id && $id != 0 && ctype_digit((string) $id)) {
         $this->data['judul'] = 'Delete Data';
         $this->data['tombol'] = 'DELETE';
         $this->data['action'] = site_url(uri_string());
         $this->data['jenis_update'] = 'delete';
         $this->data['posts'] = $this->data['post'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');

          $this->data['query'] = $this->db
                                ->select('*')
                                 ->where('id',$id ) 
                                 ->get($this->table )->row_array();
         $this->data['konten'] = 'admin/menu/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      } else {
         $this->session->set_flashdata('alert', alert('error', status('404')));
         redirect($this->uri->segment(1));
      }

   }

   private function field_data($type = 'tambah', $photo = NULL) {
      //$data['id'] = $this->input->post('id');
      $data['nama'] = $this->input->post('nama');
      $data['icon'] = $this->input->post('icon');
      $data['site'] = $this->input->post('site');
      $data['default_menu'] = $this->input->post('default_menu');
      $data['urutan'] = $this->input->post('urutan');
      $data['tree_menu'] = $this->input->post('tree_menu');
      $data['group'] = $this->input->post('group');
      return $data;
   }

   private function validation() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nama', 'nama', 'trim|required');
      $this->form_validation->set_rules('icon', 'icon', 'trim|required');
      $this->form_validation->set_rules('site', 'site', 'trim|required');
      $this->form_validation->set_rules('urutan', 'urutan', 'trim|required');
      $this->form_validation->set_error_delimiters('', '<br>');
      return $this->form_validation->run();
   }

}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */