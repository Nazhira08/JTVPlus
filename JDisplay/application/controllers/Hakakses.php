<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hakakses extends MY_Controller {
  
  private $pk = 'urutan';
  private $table = 'berita_kiriman';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Hakakses')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Hakakses')->get('menu')->result_array()[0]['id'];
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
          else $this->data['search'] = date('Y-m-d');

          if(strlen($this->input->get('pos'))>0) $this->data['pos'] = $this->input->get('pos')-1;
          else $this->data['pos'] = 0;

          if(strlen($this->input->get('TVnya'))>0) $this->data['TVnya'] = $this->input->get('TVnya');
          else $this->data['TVnya'] = '';

          //unverifikasi
          $this->data['hslsimpan'] =""; 
         if ($_POST) 
          {
               //jika urutan 
               if(strlen($this->input->post('urutan'))>0 and $this->input->post('save')=="simpan")
                {
                    //cek apakah data jumlah video yang bisa didownload lebih dari 0

                    $this->db->query("update berita_kiriman set verifikasi='1' where urutan='". $this->input->post('urutan')."'");
                    $this->data['hslsimpan'] =" Berhasil unverifikasi Video ini silahkan cek verifikasi"; 
                    
                }
          }


                if(strlen($this->data['TVnya'])==0)
                {
                    $this->data['query'] = $this->db
                    ->select('*')
                    ->where('selesai', '1')
                    ->where('verifikasi', '0')
                    ->where("tanggal ='".$this->data['search']."'")
                    ->order_by('urutan','DESC')
                    ->limit(($this->data['pos']*12)+12,$this->data['pos']*12)
                     ->get($this->table);
                   
                      $jum_record = $this->db->where('selesai', '1')->where('verifikasi', '0')->where("tanggal ='".$this->data['search']."'")->from('berita_kiriman')->limit('40')->count_all_results(); 
                      $this->data['jum_query']=ceil($jum_record/12);

                }
                else
                {
                       $this->data['query'] = $this->db
                      ->select('*')
                      ->where('selesai', '1')
                      ->where('verifikasi', '0')
                      ->where("username in (select username from users where TV='".$this->data['TVnya']."')")
                       ->where("tanggal ='".$this->data['search']."'")
                      ->order_by('urutan','DESC')
                      ->limit(($this->data['pos']*12)+12,$this->data['pos']*12)
                       ->get($this->table);


                      $jum_record = $this->db->where('selesai', '1')->where('verifikasi', '0') ->where("tanggal ='".$this->data['search']."'")->where("username in (select username from users where TV='".$this->data['TVnya']."')")->from('berita_kiriman')->count_all_results(); 
                      $this->data['jum_query']=ceil($jum_record/12);

                       
                } 

           $this->data['jum_ALL']= $this->db->where('selesai', '1')->where("tanggal ='".$this->data['search']."'")->where('verifikasi', '0')->from('berita_kiriman')->count_all_results();       
          $this->data['TV'] = $this->db
                ->select('a.TV as TVnya,count(*) as jumlahnya')
                ->where('b.selesai', '1')
                ->where('b.verifikasi', '0')
                ->where("b.tanggal ='".$this->data['search']."'")
                ->where('a.username=b.username')
                ->order_by('jumlahnya','DESC')
                ->group_by('b.username')
                ->limit('40')
                 ->get('users a,berita_kiriman b');

         //ambil data boleh ambil berapa
         $jum_record_valid= $this->db->where('username',$this->session->userdata('username'))->where('selesai', '1')->where('verifikasi', '0')->from('berita_kiriman')->count_all_results();
         $jum_ambil_video= $this->db->where('username',$this->session->userdata('username'))->from('berita_list_akses')->count_all_results();

         $this->data['jum_boleh_ambil'] = $jum_record_valid-$jum_ambil_video;

        

    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Library Berita';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/verifikasicontent/index';
    $this->load->view('admin/layout/index', $this->data);
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
                 $jumlah_file_berita = $this->db->where('No_berita', $no_berita)->from('berita_file')->count_all_results();  

                 $data_simpan['No_berita'] = $no_berita;
                 $data_simpan['username'] = $this->session->userdata('username');
                 $data_simpan['tanggal'] =date('Y-m-d H:i:s');
                 $data_simpan['jam'] = date('H:i:s');
                 $data_simpan['status'] = "success";
                 $data_simpan['ip_publik'] = get_real_ip();
                 $data_simpan['ip_private'] = getHostByName(getHostName());
                 $data_simpan['jenis'] = 'Verifikasi';
                 $this->db->insert('berita_download_verifikasi', $data_simpan); 
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


  public function uploaddelete()
  {
      $No_berita = $this->input->get('No_berita');
      $uid = $this->input->get('uid');    
      //$id=$this->input->get('id');
      //$narasumber=$this->input->get('narasumber');

      $path=  $this->db->select('path')->where('uid', $uid)->where('No_berita',$No_berita)->get('berita_file')->result_array()[0]['path'];
      $dir=$path.$uid;
      // /rmdir($dir);
      $this->removeDir($dir);

      $this->db->query("delete from berita_file where uid='". $uid."' and No_berita='".$No_berita."'");
      redirect($this->uri->segment(1)."/tambah?No_berita=".$dir);

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
      $data['no_urut_berita'] = $this->input->post('urutan');
      $data['ip_publik'] = get_real_ip();
      $data['ip_private'] = getHostByName(getHostName());
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