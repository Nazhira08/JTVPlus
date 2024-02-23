<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historiip extends MY_Controller {
  
  private $pk = 'id';
  private $table = 'ip_whitelist';



  public function __construct() {
    parent::__construct();
    //if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
    
    if (cari_hak_akses($this->session->userdata('username'),'Historiip')=="0") redirect('dashboard');
    //$this->data['id_menu']=  $this->db->select('id')->where("site",'Setinguser')->get('menu')->result_array()[0]['id'];
    //$this->data['id_menu_awal']=  $this->db->select('tree_menu')->where("site",'Setinguser')->get('menu')->result_array()[0]['tree_menu'];

    $this->data['id_menu']=  $this->db->select('id')->where("site",'Historiip')->get('menu')->result_array()[0]['id'];
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
          ->order_by('count(*)','DESC')
          ->group_by('ip')
           ->get('user_masuk');  

           $this->data['jum_user_aktif'] = $this->db->where('aktif', '1')->from('users')->count_all_results();
           $this->data['total_failled'] = $this->db->where('status','Failled')->from('user_masuk')->count_all_results();
           $this->data['ip'] ="";
           $this->data['ip_blok'] ="";
           $this->data['ip_whitelist'] ="";
           $this->data['ip_delete_whitelist'] ="";
           if(strlen($this->input->get('ip'))>0)
           {
              $this->data['ip'] =$this->input->get('ip');
              $this->data['query_user_masuk'] = $this->db->select('*')->where('ip', $this->data['ip'])->order_by('id','DESC')->limit('10')->get('user_masuk'); 
              $this->data['blok'] = $this->db->select('*')->where('ip', $this->data['ip'])->where('open','0')->from('ip_block')->count_all_results();
              $this->data['ipwhitelist'] = $this->db->select('*')->where('ip', $this->data['ip'])->from('ip_whitelist')->count_all_results();
           }
           if(strlen($this->input->get('blok'))>0)
           {
              $this->data['ip_blok'] =$this->input->get('blok');
              $this->data['query_data'] = $this->db->select('*')->where('ip',$this->data['ip_blok'])->get('ip_block')->row_array();
              $this->data['tombol'] = 'Simpan Blok';
           }
           if(strlen($this->input->get('whitelist'))>0)
           {
              $this->data['ip_whitelist'] =$this->input->get('whitelist');
              $this->data['blok'] = $this->db->select('*')->where('ip', $this->data['ip'])->where('open','0')->from('ip_block')->count_all_results();
              $this->data['tombol'] = 'Simpan Whitelist';
           }
           if(strlen($this->input->get('whitelistdelete'))>0)
           {
              $this->data['ip_delete_whitelist'] =$this->input->get('whitelistdelete');
              $this->data['blok'] = $this->db->select('*')->where('ip',$this->data['ip_delete_whitelist'])->get('ip_whitelist')->row_array();
              $this->data['tombol'] = 'Delete IP Whitelist';
           }
           
           //$this->data['query_success_hari_ini'] = $this->db->where('month(tanggal)',date('m'))->where('status','Success')->where('year(tanggal)',date('Y'))->where('day(tanggal)',date('d'))->order_by('tanggal','DESC')->group_by('usernya')->get($this->table); 

          //$this->data['query_failled_hari_ini'] = $this->db->where('month(tanggal)',date('m'))->where('status','Failled')->where('year(tanggal)',date('Y'))->where('day(tanggal)',date('d'))->order_by('tanggal','DESC')->group_by('usernya')->get($this->table); 

    $this->data['action'] = site_url(uri_string());
    $this->data['judul'] = 'Whitelist IP Banned';
    

    if ($_POST && $this->input->post('jenis')=='ip_blok') 
      {
        //sleep(2);
        $ada_user = $this->db->where('ip', $this->input->post('ip'))->from('ip_block')->count_all_results();
        if($ada_user==0)
        {  
            if ($this->validation()) 
            {
                $this->db->insert('ip_block', $this->field_data()); 
            } 
            else 
            {
                    $this->session->set_flashdata('alert', alert('Simpan','IP dan alasan harus diisi'));
            }
        }
        else //user ada
        {
             if ($this->m_database->update('ip',$this->input->post('ip') ,'ip_block', $this->field_data_update())) 
                  {
                       $this->session->set_flashdata('alert', alert('Edit', 'Data Berhasil Diedit'));
                  }
                  else
                   {
                       $this->session->set_flashdata('alert', alert('Edit', 'Data gagal diedit'));
                   }
        }

         redirect($this->uri->segment(1));
      } 

    if ($_POST  && $this->input->post('jenis')=='ip_whitelist') 
      {
        //sleep(2);
        $ada_user = $this->db->where('ip', $this->input->post('ip'))->from('ip_whitelist')->count_all_results();
        if($ada_user==0)
        {  
            if ($this->validation()) 
            {
                $this->db->insert('ip_whitelist', $this->field_data()); 
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
    
    if ($_POST  && $this->input->post('jenis')=='delete_ip_whitelist') 
      {
        //sleep(2);
        $this->db->query("delete from ip_whitelist where ip='". $this->input->post('ip')."'"); 
         redirect($this->uri->segment(1));
      } 
    $this->data['alert'] = $this->session->flashdata('alert');
    $this->data['konten'] = 'admin/historiip/index';
    $this->load->view('admin/layout/index', $this->data);
  }
   
  private function field_data($photo = NULL) {
      $data['ip'] = $this->input->post('ip');
      $data['alasan'] = $this->input->post('alasan');
      $data['tanggal'] =date('Y-m-d H:i:s');
      return $data;
   }
    private function field_data_update($photo = NULL) {
      $data['open'] = $this->input->post('open');
      return $data;
   }
  

  public function validation()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('ip', 'ip', 'trim|required');
    $this->form_validation->set_rules('alasan', 'alasan', 'trim|required');
    $this->form_validation->set_error_delimiters('<i class="icon-remove-sign"></i> ', '<br>');
    return $this->form_validation->run();   
  }

}

/* End of file jaksa.php */
/* Location: ./application/controllers/jaksa.php */