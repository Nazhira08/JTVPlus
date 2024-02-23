<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputSO extends MY_Controller {
  
  private $pk = 'urutan';
  private $table = 'berita_kiriman';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'InputSO')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'InputSO')->get('menu')->result_array()[0]['id'];
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
          ->limit('30')
           ->get('so');

           
    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'INPUT SO';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/inputSO/index';
    $this->load->view('admin/layout/index', $this->data);
  }

public function tambah() {

    if(strlen($this->input->get('edit'))>0)
      {
          $jumlah = $this->db->where('user_input',$this->session->userdata('username'))->where('id',$this->input->get('edit'))->from('so')->count_all_results();
          if($jumlah==1)
          {
              $this->db->query("update so set edit='0' where user_input='".$this->session->userdata('username')."'");
              $this->db->query("update so set edit='1' where id='".$this->input->get('edit')."'");
          }

      }

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
          ->where('id', cari_so_id($this->session->userdata('username')))
          ->limit('30')
           ->get('so')->row_array(); 

        $this->data['so'] = $this->db
          ->select('*')
          ->where('CHMO not in(select no_so from so where no_so is not NULL)')
          ->order_by('tgl_so','DESC')
          ->limit('30')
           ->get('so_keuangan');  
      
      

         
      $_SESSION["so_id"] = cari_so_id($this->session->userdata('username'));
      
      $this->data['video'] = $this->db
          ->select('*')
          ->where('id_so', cari_so_id($this->session->userdata('username')))->get('so_file');  
  
      $this->data['generated_code'] = $this->db
          ->select('*')
          ->where('id_so', cari_so_id($this->session->userdata('username')))
          ->where('delete1','0')
          ->get('so_generatecode');  

      $this->data['generated_code2'] = $this->db
          ->select('*')
          ->where("delete1='0' and kode not in (select kode from so_generatecode where id_so='".cari_so_id($this->session->userdata('username'))."')")
          ->group_by('kode')
          ->get('so_generatecode');
          
        $this->data['query1'] = $this->db
          ->select('*')
          ->order_by('id','DESC')
          ->limit('30')
           ->get('so_generatecode')->row_array(); 

      if ($_POST) 
      {
        //sleep(2);
        if($this->input->post('kirim')=="delete")
        {
            $jum_record = $this->db->where('id', $this->input->post('id'))->from('so_generatecode')->count_all_results();
            if($jum_record==1) $this->db->query("update so_generatecode set delete1='1' where id='".$this->input->post('id')."'");
        }
        elseif($this->input->post('kirim')=="finish")
        {
            $id_so = cari_so_id($this->session->userdata('username'));
            $jum_file = $this->db->where('id_so',$id_so)->from('so_file')->count_all_results();
            //$jum_code = $this->db->where('id_so',$id_so)->from('so_generatecode')->count_all_results();
             if($jum_file>=1) 
              {
                $this->m_database->update('id',$id_so,'so', $this->field_data_update2());
              }
              else
              {
                $this->m_database->update('id',$id_so,'so', $this->field_data_update3());
              }
              redirect($this->uri->segment(1));
        }
        elseif($this->input->post('kirim')=="simpan_lama")
        {
            $kode = $this->input->post('kode');
            $jum_code = $this->db->where('kode',$kode)->from('so_generatecode')->count_all_results();
             if($jum_code==0) 
              {
                $this->db->insert('so_generatecode', $this->field_data2($this->input->post('tipe'),'1'));
              }
              redirect($this->uri->segment(1)."/tambah");
        }
        else
        {  
            if(strlen($this->input->post('id'))>0)
            {
                $jum_record = $this->db->where('id', $this->input->post('id'))->from('so_generatecode')->count_all_results();
                if($jum_record==1)
                {
                  if ($this->validation()) 
                  {
                    $this->m_database->update('id',$this->input->post('id') ,'so_generatecode', $this->field_data_update());
                  }
                }
            }
            elseif (strlen($this->input->post('id'))==0)
            { 
              if ($this->validation()) 
                  {
                      $this->db->insert('so_generatecode', $this->field_data($this->input->post('tipe'),'1'));
                  }
            }
        }
         redirect($this->uri->segment(1)."/tambah");
      } 

         $this->data['action'] = site_url(uri_string());
          $this->data['tombol'] = 'Save';
         $this->data['konten'] = 'admin/inputSO/tambah';
         $this->load->view('admin/layout/index', $this->data);
         // print_r($this->data['query']);
   }

public function simpan_so()
  {
      $so = $this->input->get('so');
      $this->db->query("update so set no_so='".$so."' where id='".cari_so_id($this->session->userdata('username'))."'");
      redirect($this->uri->segment(1)."/tambah");
      //return "1";
  }

  public function simpan_gc()
  {
      $gc = $this->input->get('gc');
      //$kode=$this->db->select('kode')->where('id',$gc)->get('so_generatecode')->result_array()[0]['kode'];
      // /$title=$this->db->select('title')->where('id',$gc)->get('so_generatecode')->result_array()[0]['title'];
      $data1['id_so'] = cari_so_id($this->session->userdata('username'));
      $data1['kode'] = $this->db->select('kode')->where("id",$gc)->get('so_generatecode')->result_array()[0]['kode'];
      $data1['title'] =$this->db->select('title')->where("id",$gc)->get('so_generatecode')->result_array()[0]['title'];
      $data1['note'] = $this->db->select('note')->where("id",$gc)->get('so_generatecode')->result_array()[0]['note'];
      $data1['lokasi'] = $this->db->select('lokasi')->where("id",$gc)->get('so_generatecode')->result_array()[0]['lokasi'];
      $data1['tanggal'] =date('Y-m-d H:i:s');
      $data1['nip_pembuat'] =$this->session->userdata('username');

      $data1['ip_ccode'] = get_real_ip().' dan private '.getHostByName(getHostName());

      if($this->input->post('Editor')=="on") $data1['editor'] = "1"; else $data1['editor'] = "0";
      if($this->input->post('Promo')=="on") $data1['promo'] = "1"; else $data1['promo'] = "0";
      if($this->input->post('Library')=="on") $data1['library'] = "1"; else $data1['library'] = "0";
      if($this->input->post('Manager')=="on") $data1['manager'] = "1"; else $data1['manager'] = "0";
      if($this->input->post('Direksi')=="on") $data1['direksi'] = "1"; else $data1['direksi'] = "0";

      $this->db->insert('so_generatecode', $data1);
      //$this->db->query("update so set no_so='".$so."' where id='".cari_so_id($this->session->userdata('username'))."'");
      redirect($this->uri->segment(1)."/tambah");
      //return "1";
  }
  public function uploaddelete()
  {
      $id = $this->input->get('id');
      $uid = $this->input->get('uid');    
      //$id=$this->input->get('id');
      //$narasumber=$this->input->get('narasumber');

      $path=  $this->db->select('path')->where('uid', $uid)->where('id',$id)->get('so_file')->result_array()[0]['path'];
      $dir=$path.$uid;
      // /rmdir($dir);
      $this->removeDir($dir);

      $this->db->query("delete from so_file where uid='". $uid."' and id='".$id."'");
      redirect($this->uri->segment(1)."/tambah");

  }

   public function deletegcode()
  {
      $id = $this->input->get('id');

      $this->db->query("update so_generatecode set delete1='1' where id='". $id."'");
      redirect($this->uri->segment(1)."/tambah");

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
  

  private function field_data($tipe,$lokasi) {
      $data['id_so'] = cari_so_id($this->session->userdata('username'));
      
      $data['title'] = $this->input->post('title');
      $data['note'] = $this->input->post('note');
      if($lokasi=='1') $data['lokasi'] = "SURABAYA";
      elseif($lokasi=='2') $data['lokasi'] = "JAKARTA";
      $data['kode'] = cari_kode_generated ($tipe,$data['lokasi']);
      $data['tanggal'] =date('Y-m-d H:i:s');
      $data['nip_pembuat'] =$this->session->userdata('username');

      $data['ip_ccode'] = get_real_ip().' dan private '.getHostByName(getHostName());

      //if($this->input->post('Editor')=="on") $data['editor'] = "1"; else $data['editor'] = "0";
      //if($this->input->post('Promo')=="on") $data['promo'] = "1"; else $data['promo'] = "0";
      //if($this->input->post('Library')=="on") $data['library'] = "1"; else $data['library'] = "0";
      //if($this->input->post('Manager')=="on") $data['manager'] = "1"; else $data['manager'] = "0";
      //if($this->input->post('Direksi')=="on") $data['direksi'] = "1"; else $data['direksi'] = "0";

      return $data;
   } 

    private function field_data_update() {
      $data['title'] = $this->input->post('title');
      $data['note'] = $this->input->post('note');
      if($this->input->post('Editor')=="on") $data['editor'] = "1"; else $data['editor'] = "0";
      if($this->input->post('Promo')=="on") $data['promo'] = "1"; else $data['promo'] = "0";
      if($this->input->post('Library')=="on") $data['library'] = "1"; else $data['library'] = "0";
      if($this->input->post('Manager')=="on") $data['manager'] = "1"; else $data['manager'] = "0";
      if($this->input->post('Direksi')=="on") $data['direksi'] = "1"; else $data['direksi'] = "0";
      return $data;
   }
   
   private function field_data_update2() {
      $data['tgl_selesai'] = date('Y-m-d H:i:s');
      $data['selesai'] = "1";
      $data['edit'] = "0";
      if($this->input->post('Editor')=="on") $data['editor'] = "1"; else $data['editor'] = "0";
      if($this->input->post('Promo')=="on") $data['promo'] = "1"; else $data['promo'] = "0";
      if($this->input->post('Library')=="on") $data['library'] = "1"; else $data['library'] = "0";
      if($this->input->post('Manager')=="on") $data['manager'] = "1"; else $data['manager'] = "0";
      if($this->input->post('Direksi')=="on") $data['direksi'] = "1"; else $data['direksi'] = "0";
      return $data;
   }
   private function field_data_update3() {
      if($this->input->post('Editor')=="on") $data['editor'] = "1"; else $data['editor'] = "0";
      if($this->input->post('Promo')=="on") $data['promo'] = "1"; else $data['promo'] = "0";
      if($this->input->post('Library')=="on") $data['library'] = "1"; else $data['library'] = "0";
      if($this->input->post('Manager')=="on") $data['manager'] = "1"; else $data['manager'] = "0";
      if($this->input->post('Direksi')=="on") $data['direksi'] = "1"; else $data['direksi'] = "0";
      return $data;
   }
  
  private function field_data2($tipe,$lokasi) {
      $data['id_so'] = cari_so_id($this->session->userdata('username'));
      
      $data['title'] = $this->input->post('title');
      $data['note'] = $this->input->post('note');
      if($lokasi=='1') $data['lokasi'] = "SURABAYA";
      elseif($lokasi=='2') $data['lokasi'] = "JAKARTA";
      $data['kode'] = $this->input->post('kode');
      $data['tanggal'] =date('Y-m-d H:i:s');
      $data['nip_pembuat'] =$this->session->userdata('username');
      if($this->input->post('Editor')=="on") $data['editor'] = "1"; else $data['editor'] = "0";
      if($this->input->post('Promo')=="on") $data['promo'] = "1"; else $data['promo'] = "0";
      if($this->input->post('Library')=="on") $data['library'] = "1"; else $data['library'] = "0";
      if($this->input->post('Manager')=="on") $data['manager'] = "1"; else $data['manager'] = "0";
      if($this->input->post('Direksi')=="on") $data['direksi'] = "1"; else $data['direksi'] = "0";
      
      $data['ip_ccode'] = get_real_ip().' dan private '.getHostByName(getHostName());
      return $data;
   } 

  public function validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'title', 'trim|required');
    $this->form_validation->set_rules('note', 'note', 'trim|required');
    $this->form_validation->set_error_delimiters('<i class="icon-remove-sign"></i> ', '<br>');
    return $this->form_validation->run();   
  }

}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */