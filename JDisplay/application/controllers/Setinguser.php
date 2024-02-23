<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setinguser extends MY_Controller {
  
  private $pk = 'id_user';
  private $table = 'users';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Setinguser')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
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
          ->order_by('username')
           ->get($this->table);  

    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Seting Hak Akses User';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/setinguser/index';
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
                $this->db->query("delete from menu_user where nip='". $this->input->post('username')."'");
               foreach (menu_all()->result() as $row2) 
                {
                    if($this->input->post($row2->id)==1)
                       $this->db->query("insert into menu_user(nip,id) values('".$this->input->post('username')."','".$row2->id."')");
                }

                //edit data yang sudah dirubah
                if(strlen($_FILES['file_pendukung']['name'])>0)
                {
                  $data_photo = $this->db->select('photo')->where('id_user',$id)->get('users')->result_array()[0]['photo'];
                  //hapus foto
                  unlink(getcwd().'/assets/photo/'.$data_photo);
                  //simpan gambar

                  $path_info = pathinfo($_FILES['file_pendukung']['name']);
                  $nama_filenya=$this->input->post('username').'.'.$path_info['extension'];

                            //upload data
                  $config['upload_path']          = getcwd().'/assets/photo/';
                  $config['allowed_types']        = 'jpg';
                  $config['max_size']             = 4024;//4Mb
                  $config['max_width']            = 3290;//1024;
                  $config['max_height']           = 2090;//768;
                  $config['file_name']            = $nama_filenya;

                  $this->load->library('upload', $config);
                  if ( ! $this->upload->do_upload('file_pendukung'))
                  {
                        if ($this->m_database->update($this->pk, $id, $this->table, $this->field_data_edit())) 
                        {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                        }
                        else
                         {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                         } 
                  }
                  else
                  {
                    if ($this->m_database->update($this->pk, $id, $this->table, $this->field_data_edit($nama_filenya))) 
                        {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                        }
                        else
                         {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                         } 
                  }
                }
                else
                {
                  if ($this->m_database->update($this->pk, $id, $this->table, $this->field_data_edit())) 
                  {
                       $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                  }
                  else
                   {
                       $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                   }
                }

         redirect($this->uri->segment(1));
      } elseif ($id && $id != 0 && ctype_digit((string) $id)) {
         $this->data['judul'] = 'HAK AKSES USER';
         $this->data['tombol'] = 'UPDATE';
         $this->data['action'] = site_url(uri_string());
         $this->data['jenis_update'] = 'update';
         $this->data['posts'] = $this->data['post'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');

          $this->data['query'] = $this->db
          ->select('*')
          ->where('id_user',$id)
           ->get($this->table)->row_array();


          $this->data['user_menunya'] = $this->db 
           ->where('default_menu=0') 
           ->where('tree_menu=0') 
          ->order_by('urutan')
           ->get('menu');


         $this->data['konten'] = 'admin/setinguser/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      } else {
         $this->session->set_flashdata('alert', alert('error', status('404')));
         redirect($this->uri->segment(1));
      }
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
        sleep(2);
        $ada_user = $this->db->where('username', $this->input->post('username'))->from('users')->count_all_results();
        if($ada_user==0)
        {  
            if ($this->validation()) 
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $repassword = $this->input->post('repassword');
                $tgl_lahir = $this->input->post('tgl_lahir');
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                //jka password sama
                if($password==$repassword)
                {
                  //data sudah ada
                    
                    if(strlen($_FILES['file_pendukung']['name'])>0)
                      {
                          $path_info = pathinfo($_FILES['file_pendukung']['name']);
                          $nama_filenya=$this->input->post('username').'.'.$path_info['extension'];

                            //upload data
                            $config['upload_path']          = getcwd().'/assets/photo/';
                            $config['allowed_types']        = 'jpg';
                            $config['max_size']             = 4024;//4Mb
                            $config['max_width']            = 3290;//1024;
                            $config['max_height']           = 2090;//768;
                            $config['file_name']            = $nama_filenya;

                            $this->load->library('upload', $config);
                            if ( ! $this->upload->do_upload('file_pendukung'))
                            {
                              $this->db->insert('users', $this->field_data()); 
                              $this->session->set_flashdata('alert', alert('Simpan', 'Data Berhasil disimpan tanpa photo'));
                            }
                            else
                            {  
                              $this->db->insert('users', $this->field_data($nama_filenya)); 
                              $this->session->set_flashdata('alert', alert('Simpan', 'Data Berhasil disimpan dengan photo'));
                            }
                      }
                      else
                      {
                          $this->db->insert('users', $this->field_data());
                          $this->session->set_flashdata('alert', alert('Simpan', 'Data Berhasil disimpan tanpa photo'));
                      }

                }
                else
                {
                    $this->session->set_flashdata('alert', alert('Simpan', 'Data Password dan RePassword Harus sama'));
                }
            
            } 
            else 
            {
                    $this->session->set_flashdata('alert', alert('Simpan','username dan Password harus diisi'));
            }
        }
        else //user ada
        {
             $this->session->set_flashdata('alert', alert('Simpan', 'username sudah ada di data dan tidak boleh sama'));
        }

         redirect($this->uri->segment(1));
      } 

         $this->data['action'] = site_url(uri_string());
          $this->data['tombol'] = 'SAVE';
         $this->data['konten'] = 'admin/setinguser/add';
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
                //cari foto
                $data = $this->db->select('photo')->where('id_user',$id)->get('users')->result_array()[0]['photo'];
                //menghapus photo
                if(strlen($data)>0)
                {
                  unlink(getcwd().'/assets/photo/'.$data);
                }  
                $this->db->query("delete from menu_user where nip='". $this->input->post('username')."'");
                $this->db->query("delete from users where username='". $this->input->post('username')."'"); 
                $this->session->set_flashdata('alert', alert('Delete','Data Berhasil di hapus'));               
         redirect($this->uri->segment(1));
      } elseif ($id && $id != 0 && ctype_digit((string) $id)) {
         $this->data['judul'] = 'HAK AKSES USER';
         $this->data['tombol'] = 'DELETE';
         $this->data['action'] = site_url(uri_string());
         $this->data['jenis_update'] = 'update';
         $this->data['posts'] = $this->data['post'] = TRUE;
         $this->data['alert'] = $this->session->flashdata('alert');

          $this->data['query'] = $this->db
          ->select('*')
          ->where('id_user',$id)
           ->get($this->table)->row_array();


          $this->data['user_menunya'] = $this->db 
           ->where('default_menu=0') 
           ->where('tree_menu=0') 
          ->order_by('urutan')
           ->get('menu');


         $this->data['konten'] = 'admin/setinguser/hapus';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
      } else {
         $this->session->set_flashdata('alert', alert('error', status('404')));
         redirect($this->uri->segment(1));
      }
   }

  private function field_data($photo = NULL) {
      $data['username'] = $this->input->post('username');
      $data['password'] = crypt($this->input->post('password'),'$2y$10$qLgN1yw69/Xsy7W57RiZ8OkFcIGGqRakhqKQzJ5DQeJE2l/jEqRX6');
      $data['email'] = $this->input->post('email');
      $data['display_name'] = $this->input->post('display_name');
      $data['level'] = $this->input->post('level');
      $data['aktif'] = $this->input->post('aktif');
      $data['TV'] = $this->input->post('TV');
      $data['ftp_user'] = $this->input->post('ftp_user');
      $data['ftp_pass'] = $this->input->post('ftp_password');
      $data['ftp_home'] = $this->input->post('ftp_path');
      
      if(strlen($photo)>0) $data['photo'] = $photo;

      return $data;
   }
    private function field_data_edit($photo = NULL) {
      $data['email'] = $this->input->post('email');
      $data['display_name'] = $this->input->post('display_name');
      $data['level'] = $this->input->post('level');
      $data['aktif'] = $this->input->post('aktif');
      $data['TV'] = $this->input->post('TV');
      if(strlen($photo)>0) 
      {
        $data['photo'] = $photo;
      }

      return $data;
   }

  public function validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Nama akun', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_rules('repassword', 'RePassword', 'trim|required');
    $this->form_validation->set_error_delimiters('<i class="icon-remove-sign"></i> ', '<br>');
    return $this->form_validation->run();   
  }

}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */