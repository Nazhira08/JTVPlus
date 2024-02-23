<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylibrary extends MY_Controller {
  
  private $pk = 'urutan';
  private $table = 'berita_kiriman';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Mylibrary')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Mylibrary')->get('menu')->result_array()[0]['id'];
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

          
          if(strlen($this->input->post('search'))>0) $this->data['search'] = $this->input->post('search');
          elseif(strlen($this->input->get('search'))>0) $this->data['search'] = $this->input->get('search');
          else $this->data['search'] = '';

          if(strlen($this->input->get('pos'))>0) $this->data['pos'] = $this->input->get('pos')-1;
          else $this->data['pos'] = 0;

          if(strlen($this->input->get('TVnya'))>0) $this->data['TVnya'] = $this->input->get('TVnya');
          else $this->data['TVnya'] = '';

          if(strlen($this->data['search'])==0)
          {
                if($this->data['pos']==0) $limitnya=0; else $limitnya=$this->data['pos']*12;
                if($this->data['pos']==0) $limitsampai=12; else $limitsampai=12;
                if(strlen($this->data['TVnya'])==0)
                {
                    $this->data['query'] = $this->db
                    ->select('*')
                    ->where('selesai', '1')
                    ->where('verifikasi', '1')
                    ->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")
                    ->order_by('urutan','DESC')
                    ->limit($limitsampai,$limitnya)
                     ->get($this->table);
                   
                      $jum_record = $this->db->where('selesai', '1')->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")->where('verifikasi', '1')->from('berita_kiriman')->limit('40')->count_all_results(); 
                      $this->data['jum_query']=ceil($jum_record/12);

                }
                else
                {
                       $this->data['query'] = $this->db
                      ->select('*')
                      ->where('selesai', '1')
                      ->where('verifikasi', '1')
                      ->where("(username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')) and username in (select username from users where TV='".$this->data['TVnya']."')")
                      ->order_by('urutan','DESC')
                      ->limit($limitsampai,$limitnya)
                       ->get($this->table);


                      $jum_record = $this->db->where('selesai', '1')->where('verifikasi', '1')->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")->where("username in (select username from users where TV='".$this->data['TVnya']."')")->from('berita_kiriman')->limit('40')->count_all_results(); 
                      $this->data['jum_query']=ceil($jum_record/12);

                       
                } 
          }
          else
          {
                if($this->data['pos']==0) $limitnya=0; else $limitnya=$this->data['pos']*12;
                if($this->data['pos']==0) $limitsampai=12; else $limitsampai=12;
                if(strlen($this->data['TVnya'])==0)
                {
                    $this->data['query'] = $this->db
                    ->select('*')
                    ->where('selesai', '1')
                    ->where('verifikasi', '1')
                    ->where("judul like'%".$this->data['search']."%' or isi like'%".$this->data['search']."%'")
                    ->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")
                    ->order_by('urutan','DESC')
                    ->limit($limitsampai,$limitnya)
                     ->get($this->table);
                   
                      $jum_record = $this->db->where('selesai', '1')->where('verifikasi', '1')->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")->from('berita_kiriman')->limit('40')->count_all_results(); 
                      $this->data['jum_query']=ceil($jum_record/12);

                }
                else
                {
                       $this->data['query'] = $this->db
                      ->select('*')
                      ->where('selesai', '1')
                      ->where('verifikasi', '1')
                      ->where("username in (select username from users where TV='".$this->data['TVnya']."')")
                      ->where("judul like'%".$this->data['search']."%' or isi like'%".$this->data['search']."%'")
                      ->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")
                      ->order_by('urutan','DESC')
                      ->limit($limitsampai,$limitnya)
                       ->get($this->table);


                      $jum_record = $this->db->where('selesai', '1')->where('verifikasi', '1')->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")->where("username in (select username from users where TV='".$this->data['TVnya']."')")->from('berita_kiriman')->limit('40')->count_all_results(); 
                      $this->data['jum_query']=ceil($jum_record/12);

                       
                } 
          }

           $this->data['jum_ALL']= $this->db->where('selesai', '1')->where("username='".$this->session->userdata('username')."' or urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."')")->where('verifikasi', '1')->from('berita_kiriman')->count_all_results();       
          $this->data['TV'] = $this->db
                ->select('a.TV as TVnya,count(*) as jumlahnya')
                ->where("(b.username='".$this->session->userdata('username')."' or b.urutan in (select no_urut_berita from berita_list_akses where username='".$this->session->userdata('username')."'))")
                ->where('b.selesai', '1')
                ->where('b.verifikasi', '1')
                ->where('a.username=b.username')                
                ->order_by('jumlahnya','DESC')
                ->group_by('b.username')
                ->limit('40')
                 ->get('users a,berita_kiriman b');

    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Library Berita';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/mylibrary/index';
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

        $this->data['query'] = $this->db
          ->select('*')
          ->where('selesai', '0')->where('username',$this->session->userdata('username'))
           ->get($this->table)->row_array();  
         
      $_SESSION["No_berita"] = cari_no_berita($this->session->userdata('username'));
      
      $this->data['video'] = $this->db
          ->select('*')
          ->where('No_berita', cari_no_berita($this->session->userdata('username')))->get('berita_file');  
  
      $ada_user = $this->db->where('selesai', '0')->where('username',$this->session->userdata('username'))->from('berita_kiriman')->count_all_results();     
      if($ada_user==0)
      {
          $this->db->insert('berita_kiriman', $this->field_data_kosong()); 
      }
      

      if ($_POST) 
      {
        //sleep(2);
        $ada_user = $this->db->where('ip', $this->input->post('ip'))->from('ip_whitelist')->count_all_results();
        if($ada_user==0)
        {  
            if ($this->validation()) 
            {
                //mencari no _urut
                $urutan=  $this->db->select('urutan')->where('selesai', '0')->where('username',$this->session->userdata('username'))->get('berita_kiriman')->result_array()[0]['urutan'];
                //jika simpan 
                if($this->input->post('finish')=="1")
                 { 
                      if ($this->m_database->update('urutan',$urutan ,'berita_kiriman', $this->field_data_update())) 
                       {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                        }
                        else
                         {
                             $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                         }
                  }
                  else //simpan sementara finis=0
                  {
                       if ($this->m_database->update('urutan',$urutan ,'berita_kiriman', $this->field_data_update2())) 
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
                    $this->session->set_flashdata('alert', alert('Simpan','IP dan alasan harus diisi'));
            }
        }
        else //user ada
        {
             $this->session->set_flashdata('alert', alert('Simpan', 'Ip sudah di whitelist'));
        }

         redirect($this->uri->segment(1));
      } 

         $this->data['action'] = site_url(uri_string());
          $this->data['tombol'] = 'Save';
         $this->data['konten'] = 'admin/kirimberita/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
   }
  public function download()
  {
          
          //$query = "insert into download(No_berita,NIP,tanggal,jam,ip,status) values('".$_GET[No_berita]."','".$_SESSION[NIP]."','".date('y')."-".date('m')."-".date('d')."','".date("H:i:s")."','".GetIpPrivate()."','Success')";
         
          $urutan = $this->input->get('urutan');

          //cek apakah urutan itu punya hak akses
          $ada_hak_akses_user = $this->db->where('no_urut_berita', $urutan)->where('username',$this->session->userdata('username'))->from('berita_list_akses')->count_all_results();  
          $kiriman_sendiri = $this->db->where('urutan', $urutan)->where('username',$this->session->userdata('username'))->from('berita_kiriman')->count_all_results();  
          
          if($ada_hak_akses_user==1 or $kiriman_sendiri==1)
          {
              //cek apakah data sdh dipindah ke storage
             $movetostorage=  $this->db->select('movetostorage')->where('urutan', $urutan)->get('berita_kiriman')->result_array()[0]['movetostorage'];

             if($movetostorage==0)
             {
                //Set the time out
                //cari path download
                //cari no berita
                $no_berita=  $this->db->select('No_berita')->where('urutan', $urutan)->get('berita_kiriman')->result_array()[0]['No_berita'];

                //download all materi

                 $file_berita = $this->db->select('*')->where('No_berita', $no_berita)->get('berita_file');  

                 $data_simpan['No_berita'] = $no_berita;
                 $data_simpan['username'] = $this->session->userdata('username');
                 $data_simpan['tanggal'] =date('Y-m-d H:i:s');
                 $data_simpan['jam'] = date('H:i:s');
                 $data_simpan['status'] = "success";
                 $data_simpan['ip_publik'] = get_real_ip();
                 $data_simpan['ip_private'] = getHostByName(getHostName());
                 $this->db->insert('berita_download', $data_simpan); 

                  $no=0;
                 foreach($file_berita->result() as $row) 
                 {

                      set_time_limit(0);

                      //path to the file
                      //$file_path=$_REQUEST['path'].$_REQUEST['filename'];
                      //$file_path=$_REQUEST['path'].$_REQUEST['filename'];

                      $file_path = $row->path.$row->uid."/".$row->nama;  
                      $filename = $row->nama;

                      if(file_exists($file_path))
                      {
                          $no++;
                        
                          $file_zip[$no]=$file_path;
                          $file_name[$no]=$filename;
                      }
                      
                  }
                  $files = $file_zip;
                  $zip_name = "/tmp/".time().".zip";
                  $zip = new ZipArchive;
                     //$zip->open($zipname, ZipArchive::CREATE);
                      //foreach ($files as $file) {
                      //  $zip->addFile($file);
                       //   }
                      //$zip->close();
                      if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
                      { 
                          // Opening zip file to load files
                          $error .= "* Sorry ZIP creation failed at this time";
                      }
                      $no=0;
                      foreach($files  as $file)
                      { 
                          $no++;
                          $zip->addFile($file, $file_name[$no]); // Adding files into zip
                      }
                      $zip->close();
                      if(file_exists($zip_name))
                      {
                          // push to download the zip
                          header('Content-type: application/zip');
                          header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                          readfile($zip_name);
                          // remove zip file is exists in temp path
                          unlink($zip_name);
                      }

              }

          }


  }


     

   public function berita()
  {
      $urutan = $this->input->get('urutan');
     
      $Isi=  $this->db->select('Isi')->where('urutan', $urutan)->get('berita_kiriman')->result_array()[0]['Isi'];
      echo $Isi;
      return($Isi);

  }

  public function removeDir($dir){
        foreach (scandir($dir) as $item){
            if ($item == "." || $item == "..")
                continue;

            if (is_dir($item)){
                $this->removeDir($item);
            } else {
                unlink(join(DIRECTORY_SEPARATOR, array($dir, $item)));
            }
        }
        rmdir($dir);
    }

public function update_image() {
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


      
   }
  
  private function field_data_kosong() {
      $data['username'] = $this->session->userdata('username');
      $data['tanggal'] =date('Y-m-d H:i:s');
      $data['jam'] = date('H:i:s');
      $data['selesai'] = "0";
      $data['No_berita'] = cari_no_berita($this->session->userdata('username'));
      $data['ippublik'] = get_real_ip();
      $data['ipprivate'] = getHostByName(getHostName());
      return $data;
   } 

    private function field_data_update() {
      $data['Judul'] = $this->input->post('judul');
      $data['Isi'] = $this->input->post('isi_berita');
      $data['selesai'] = "1";
      $data['tgl_selesai'] =date('Y-m-d H:i:s');
      return $data;
   }
   private function field_data_update2() {
      $data['Judul'] = $this->input->post('judul');
      $data['Isi'] = $this->input->post('isi_berita');
      $data['tgl_selesai'] =date('Y-m-d H:i:s');
      return $data;
   }
  

  public function validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('judul', 'judul', 'trim|required');
    $this->form_validation->set_rules('isi_berita', 'isi_berita', 'trim|required');
    $this->form_validation->set_error_delimiters('<i class="icon-remove-sign"></i> ', '<br>');
    return $this->form_validation->run();   
  }

}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */