<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backupcontent extends MY_Controller {
  
  private $pk = 'id';
  private $table = 'storage';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Backupcontent')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Backupcontent')->get('menu')->result_array()[0]['id'];
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

    if(strlen($this->input->post('bulan'))>0) $this->data['bulan'] = $this->input->post('bulan');
          elseif(strlen($this->input->get('bulan'))>0) $this->data['bulan'] = $this->input->get('bulan');
          else $this->data['bulan'] = date('m');

    if(strlen($this->input->post('storage1'))>0) $this->data['storage1'] = $this->input->post('storage1');
          elseif(strlen($this->input->get('storage1'))>0) $this->data['storage1'] = $this->input->get('storage1');
          else $this->data['storage1'] = ""; 

    if(strlen($this->input->post('storage2'))>0) $this->data['storage2'] = $this->input->post('storage2');
          elseif(strlen($this->input->get('storage2'))>0) $this->data['storage2'] = $this->input->get('storage2');
          else $this->data['storage2'] = "";       

    if(strlen($this->input->post('tahun'))>0) $this->data['tahun'] = $this->input->post('tahun');
          elseif(strlen($this->input->get('tahun'))>0) $this->data['tahun'] = $this->input->get('tahun');
          else $this->data['tahun'] = date('Y');

    $this->data['hslsimpan'] = "";      
    $this->data['query'] = $this->db
          ->select('*,count(*) as jumlah')
          ->where('month(tanggal)',$this->data['bulan'])
          ->where('year(tanggal)',$this->data['tahun'])
          ->group_by('tanggal')
          ->order_by('tanggal','ASC')
          ->get('berita_kiriman'); 

     $this->data['storage'] = $this->db
          ->select('*')
          ->where('kondisi','1')
          ->get('storage');   

    $this->data['jum_query'] = $this->db->where('month(tanggal)',$this->data['bulan'])->where('year(tanggal)',$this->data['tahun'])->from('berita_kiriman')->count_all_results();
    //$this->data['jum_akses'] = $this->db->where('tanggal',date('Y-m-d'))->where('selesai','0')->from('berita_kiriman')->count_all_results();
    $this->data['jum_akses'] = $this->db->where('year(tanggal)',date('Y'))->where('month(tanggal)',date('m'))->where('day(tanggal)',date('d'))->where('logout is NULL')->from('user_masuk')->group_by('usernya')->count_all_results();
          

    if($_POST and $this->input->post('jenis')=="backup") //jika yang ditekan backup
    {
    	if($this->data['storage1']<>"[Pilih Storage]" or $this->data['storage2']<>"[Pilih Storage]" )	
    	{
	    	//cek apakah hari ini sdh di backup
	    	$ada_backup_hari_ini = $this->db->where('tanggal', date('Y-m-d'))->from('berita_backup_storage')->count_all_results();	
	    	if($ada_backup_hari_ini==0)
	    	{
	    		$storage_namaya="";
	    		if($this->data['storage1']<>"[Pilih Storage]")
	    		{
	    			 $data_simpan['bulan'] = date('m');
	                 $data_simpan['user'] = $this->session->userdata('username');
	                 $data_simpan['tanggal'] =date('Y-m-d');
	                 $data_simpan['tahun'] = date('Y');
	                 $data_simpan['ip_publik'] = get_real_ip();
	                 $data_simpan['ip_private'] = getHostByName(getHostName());
	                 $data_simpan['id_storage'] = $this->data['storage1'];
	                 $this->db->insert('berita_backup_storage', $data_simpan); 
	                 $storage_namaya=$storage_namaya.$this->db->select('nama_storage')->where("id",$this->data['storage1'])->get('storage')->result_array()[0]['nama_storage'];
	    		}
	    		if($this->data['storage2']<>"[Pilih Storage]" and $this->data['storage1']<>$this->data['storage2'] )
	    		{
	    			 $data_simpan['bulan'] = date('m');
	                 $data_simpan['user'] = $this->session->userdata('username');
	                 $data_simpan['tanggal'] =date('Y-m-d');
	                 $data_simpan['tahun'] = date('Y');
	                 $data_simpan['ip_publik'] = get_real_ip();
	                 $data_simpan['ip_private'] = getHostByName(getHostName());
	                 $data_simpan['id_storage'] = $this->data['storage2'];
	                 $this->db->insert('berita_backup_storage', $data_simpan); 
	                 if(strlen($storage_namaya)> 0) $storage_namaya=$storage_namaya . "dan ".$this->db->select('nama_storage')->where("id",$this->data['storage2'])->get('storage')->result_array()[0]['nama_storage'];
	                 else $storage_namaya=$storage_namaya.$this->db->select('nama_storage')->where("id",$this->data['storage2'])->get('storage')->result_array()[0]['nama_storage'];
	    		}

	    		$this->download($this->data['bulan'],$this->data['tahun']);
	    		
	    		$this->data['hslsimpan'] ="Backup data berhasil , Mohon jangan lupa kopi hasil ke storage ".$storage_namaya;
	    	}
	    	else
	    	{
	    		$this->data['hslsimpan'] ="Hari ini anda sudah backup , Mohon backup lagi di hari lain";
	    	}
    	}
    	else
    	{
    		 $this->data['hslsimpan'] ="Mohon diisi storagenya";
    	}
    }

    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Storage';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/backupcontent/index';
    $this->load->view('admin/layout/index', $this->data);
  }


public function download($bln,$thn)
  {
          
          //$query = "insert into download(No_berita,NIP,tanggal,jam,ip,status) values('".$_GET[No_berita]."','".$_SESSION[NIP]."','".date('y')."-".date('m')."-".date('d')."','".date("H:i:s")."','".GetIpPrivate()."','Success')";
         
                //Set the time out
                //cari path download
                //cari no berita

                //download all materi

                 $file_berita = $this->db->select('*')->where("No_berita in ( select No_berita FROM berita_kiriman where month(tanggal)='".$bln."' and year(tanggal)='".$thn."')")->get('berita_file');  
                 //$jumlah_file_berita = $this->db->where('No_berita', $no_berita)->from('berita_file')->count_all_results();  

                 $data_simpan['bulan'] = date('m');
                 $data_simpan['user'] = $this->session->userdata('username');
                 $data_simpan['tanggal'] =date('Y');
                 $data_simpan['tahun'] = date('H:i:s');
                 $data_simpan['ip_publik'] = get_real_ip();
                 $data_simpan['ip_private'] = getHostByName(getHostName());
                 $this->db->insert('berita_backup', $data_simpan); 
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
                          $zip->addFile($file); // Adding files into zip
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