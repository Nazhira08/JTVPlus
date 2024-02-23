<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends MY_Controller {
  
  private $pk = 'urutan';
  private $table = 'berita_kiriman';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Editor')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Editor')->get('menu')->result_array()[0]['id'];
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
          ->where("id not in (select id_so from so_read where nip='".$this->session->userdata('username')."')")
          ->where('editor','1')
          ->where('selesai','1')
          ->order_by('id','DESC')
          ->limit('10')
           ->get('so');

         $jum = $this->db
          ->select('*')
          ->where("id not in (select id_so from so_read where nip='".$this->session->userdata('username')."')")
          ->where('editor','1')
          ->where('selesai','1')
          ->order_by('id','DESC')
           ->from('so')->count_all_results();   
        $this->data['jum_query']=ceil($jum/12);   
           
    $this->data['jum_terbaca'] = $this->db->where('nip',$this->session->userdata('username'))->where("id_so in(select id from so where selesai='1' and editor='1')")->from('so_read')->count_all_results();
    $this->data['jum_all'] = $this->db->where('selesai','1')->where('editor','1')->from('so')->count_all_results();

    $this->data['read'] ="0";         
    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Library Berita';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/editor/index';
    $this->load->view('admin/layout/index', $this->data);
  }

public function read()
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

    if(strlen($this->input->get('pos'))>0) $this->data['pos'] = $this->input->get('pos')-1;
          else $this->data['pos'] = 0;       
    if($this->data['pos']==0) $limitnya=0; else $limitnya=$this->data['pos']*10;
    if($this->data['pos']==0) $limitsampai=10; else $limitsampai=10;
    
    $this->data['query'] = $this->db
          ->select('*')
          ->where("id in (select id_so from so_read where nip='".$this->session->userdata('username')."')")
          ->where('editor','1')
          ->where('selesai','1')
          ->order_by('id','DESC')
          ->limit($limitsampai,$limitnya)
           ->get('so'); 

    $this->data['jum_terbaca'] = $this->db->where('nip',$this->session->userdata('username'))->where("id_so in(select id from so where selesai='1' and editor='1')")->from('so_read')->count_all_results();
    $this->data['jum_all'] = $this->db->where('selesai','1')->where('editor','1')->from('so')->count_all_results();

    $jum = $this->db
          ->select('*')
          ->where("id in (select id_so from so_read where nip='".$this->session->userdata('username')."')")
          ->where('editor','1')
          ->where('selesai','1')
          ->order_by('id','DESC')
           ->from('so')->count_all_results();   
        $this->data['jum_query']=ceil($jum/12);  

    $this->data['read'] ="1";       
    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Library Berita';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/editor/index';
    $this->load->view('admin/layout/index', $this->data);
  }

   public function lihat_data()
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


       $id = $this->input->get('id'); 
       $this->data['read'] = $this->input->get('read');    
       
       $this->data['jum_terbaca'] = $this->db->where('nip',$this->session->userdata('username'))->where("id_so in(select id from so where selesai='1' and editor='1')")->from('so_read')->count_all_results();
    $this->data['jum_all'] = $this->db->where('selesai','1')->where('editor','1')->from('so')->count_all_results();

       if($this->db->where('nip',$this->session->userdata('username'))->where('id_so', $id)->from('so_read')->count_all_results()==0) $this->db->insert('so_read', $this->field_data($id)); 

         $this->data['query'] = $this->db
          ->select('*')
          -> where('id',$id)
          ->order_by('id','DESC')
           ->get('so')->row_array(); 

        $this->data['attachment'] = $this->db
          ->select('*')
          -> where('id_so',$id)
          ->order_by('id','DESC')
           ->get('so_file'); 
        $this->data['generatecode'] = $this->db
          ->select('*')
          -> where('id_so',$id)
          ->where('delete1','0')
          ->order_by('id','DESC')
           ->get('so_generatecode');  

    
           
    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Library Berita';
    $this->data['tombol'] = 'Cari';

    
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/editor/unread';
    $this->load->view('admin/layout/index', $this->data);
  }
  
  private function field_data($id_so) {
      $data['nip'] = $this->session->userdata('username');
      $data['tanggal_cek'] =date('Y-m-d H:i:s');
      $data['id_so'] = $id_so;
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