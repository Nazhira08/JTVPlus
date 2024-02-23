<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*if (!function_exists('alert')) {
   function alert($type, $content) {
      $alert = '';
      if ($type == 'error') {
         $alert .= '<div class="alert alert-danger alert-dismissable">';
         $alert .= '<i class="fa fa-ban"></i>';
         $alert .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
         $alert .= $content;
         $alert .= '</div>';
      } elseif ($type == 'success') {
         $alert .= '<div class="alert alert-success" role="alert">';
         $alert .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
         $alert .= ' <strong>Well done!</strong> You successfully read this important alert message.';
         $alert .= '</div>';

      } elseif ($type == 'warning') {
         $alert .= '<div class="mb-container">';
         $alert .= '<div class="mb-middle">';
         $alert .= '<div class="mb-title"><span class="fa fa-globe"></span> Some <strong>Title</strong></div>';
         $alert .= '<div class="mb-content">';
         $alert .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tellus sed mauris mollis pellentesque nec a ligula. Quisque ultricies eleifend lacinia. Nunc luctus quam pretium massa semper tincidunt. Praesent vel mollis eros. Fusce erat arcu, feugiat ac dignissim ac, aliquam sed urna. Maecenas scelerisque molestie justo, ut tempor nunc.</p>    ';
         $alert .= '</div>';
         $alert .= '<div class="mb-footer">';
         $alert .= '<button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>';
         $alert .= '</div>';
         $alert .= '</div>';
         $alert .= '</div>';
      } elseif ($type == 'info') {
         $alert .= '<div class="alert alert-info alert-dismissable">';
         $alert .= '<i class="fa fa-info"></i>';
         $alert .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
         $alert .= $content;
         $alert .= '</div>';
      }
      return $alert;
   }
}
*/


/* Fungsi Khusus JFTP*/

if (!function_exists('cek_kepemilikan_file')) {
   function cek_kepemilikan_file($direktori,$nama,$user) {
       $CI =& get_instance();
       //$this->ci->load->database();
       $jml_data = $CI->db
              ->where('direktori',$direktori)
              ->where('nama',$nama)
              ->where('user_add',$user)
              ->where('status','create')
              ->from('datafile')->count_all_results();
        return $jml_data;
   }
}

if (!function_exists('cek_id_kepemilikan_file')) {
   function cek_id_kepemilikan_file($direktori,$nama,$user) {
       $CI =& get_instance();
       //$this->ci->load->database();
       $jml_data = $CI->db
              ->select('id')
              ->where('direktori',$direktori)
              ->where('nama',$nama)
              ->where('user_add',$user)
              ->where('status','create')
              ->get('datafile')->result_array()[0]['id'];
        return $jml_data;
   }
}

/* Fungsi Khusus JFTP*/

if (!function_exists('alert')) {
   function alert($type, $content) {
      $alert = '';
      if ($type == 'error') {
         $alert .= '<div class="alert alert-danger alert-dismissable">';
         $alert .= '<i class="fa fa-ban"></i>';
         $alert .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
         $alert .= $content;
         $alert .= '</div>';
      }  elseif ($type == 'Edit') {
         $alert .= '<div class="alert alert-success" role="alert">';
         $alert .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
         $alert .= ' <strong>'.$type.'</strong> <BR>'.$content;
         $alert .= '</div>';
      } elseif ($type == 'Simpan') {
         $alert .= '<div class="alert alert-success" role="alert">';
         $alert .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
         $alert .= ' <strong>'.$type.'</strong> <BR>'.$content;
         $alert .= '</div>';
      } elseif ($type == 'Delete') {
         $alert .= '<div class="alert alert-success" role="alert">';
         $alert .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
         $alert .= ' <strong>'.$type.'</strong> <BR>'.$content;
         $alert .= '</div>';
      }
      return $alert;
   }
}
if (!function_exists('status')) {
   function status($key = '') {
      $message = '';
      switch ($key) {
      case 'dibuat':
         $message = 'Data sudah tersimpan !';
         break;
      case 'not_created':
         $message = 'Data tidak tersimpan !';
         break;
      case 'updated':
         $message = 'Data sudah diperbaharui !';
         break;
      case '404':
         $message = 'Halaman tidak ditemukan !';
         break;
      case 'deleted':
         $message = 'Data sudah dihapus !';
         break;
      case 'not_deleted':
         $message = 'Data tidak terhapus !';
         break;
      case 'not_selected':
         $message = 'Tidak ada data yang terpilih !';
         break;
      case 'ada':
         $message = 'Data sudah ada !';
         break;
      case 'posting':
         $message = '&nbsp;&nbsp;&nbsp;Maaf Data sudah diposting !';
         break;
      case 'pass1':
         $message = '&nbsp;&nbsp;&nbsp;  Password Lama tidak sesuai !';
         break;
      case 'pass2':
         $message = '&nbsp;&nbsp;&nbsp;  Password Dan Re Password tidak sama !';
         break;
      case 'nipsalah':
         $message = '&nbsp;&nbsp;&nbsp; User Belum terdaftar !';
         break;
      }
      return $message;
   }
}


if (!function_exists('get_real_ip')) {
      function get_real_ip()
      {

          if (isset($_SERVER["HTTP_CLIENT_IP"]))
          {
              return $_SERVER["HTTP_CLIENT_IP"];
          }
          elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
          {
              return $_SERVER["HTTP_X_FORWARDED_FOR"];
          }
          elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
          {
              return $_SERVER["HTTP_X_FORWARDED"];
          }
          elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
          {
              return $_SERVER["HTTP_FORWARDED_FOR"];
          }
          elseif (isset($_SERVER["HTTP_FORWARDED"]))
          {
              return $_SERVER["HTTP_FORWARDED"];
          }
          else
          {
              return $_SERVER["REMOTE_ADDR"];
          }
      }
}

if (!function_exists('indo_date')) {
   function indo_date($str) {
      if (!is_valid_date($str)) return NULL;
      $exp = explode("-", $str);
      return $exp[2] . ' ' . bulan($exp[1]) . ' ' . $exp[0];
   }
}

if (!function_exists('bulan')) {
   function bulan($kode, $type = 'L') {
      $bulan = '';
      switch ($kode) {
         case '01':
            $bulan = 'Januari';
            break;
         case '02':
            $bulan = 'Februari';
            break;
         case '03':
            $bulan = 'Maret';
            break;
         case '04':
            $bulan = 'April';
            break;
         case '05':
            $bulan = 'Mei';
            break;
         case '06':
            $bulan = 'Juni';
            break;
         case '07':
            $bulan = 'Juli';
            break;
         case '08':
            $bulan = 'Agustus';
            break;
         case '09':
            $bulan = 'September';
            break;
         case '10':
            $bulan = 'Oktober';
            break;
         case '11':
            $bulan = 'Nopember';
            break;
         case '12':
            $bulan = 'Desember';
            break;
      }
      if ($type != 'L') {
         return substr($bulan, 0, 3);
      }
      return $bulan;
   }
}

if (!function_exists('hari')) {
   function hari($kode) {
      $hari = '';
      switch ($kode) {
         case '1':
            $hari = 'Senin';
            break;
         case '2':
            $hari = 'Selasa';
            break;
         case '3':
            $hari = 'Rabu';
            break;
         case '4':
            $hari = 'Kamis';
            break;
         case '5':
            $hari = "Jum'at";
            break;
         case '6':
            $hari = 'Sabtu';
            break;
         case '0':
            $hari = 'Minggu';
            break;
      }
      return $hari;
   }
}

if (!function_exists('jumlah_success_login')) {
   function jumlah_success_login($tgl) {
       $CI =& get_instance();
       //$this->ci->load->database();
       $jml_ijinnya = $CI->db
              ->where('month(tanggal)',date('m',strtotime($tgl)))
              ->where('year(tanggal)',date('Y',strtotime($tgl)))
              ->where('day(tanggal)',date('d',strtotime($tgl)))
              ->where('status','Success')
              ->from('user_masuk')->count_all_results();
      if($jml_ijinnya==0)
      {
            return "0";
      }
        else
      {        
        $ijin = $CI->db
              //->select('count(*) as jumlah')
              ->where('month(tanggal)',date('m',strtotime($tgl)))
              ->where('year(tanggal)',date('Y',strtotime($tgl)))
              ->where('day(tanggal)',date('d',strtotime($tgl)))
              ->where('status','Success')
              ->group_by('usernya')
              ->from('user_masuk')->count_all_results();//->get('user_masuk')->result_array()[0]['jumlah'];
          return $ijin;
      }
   }
}

if (!function_exists('jumlah_failled_login')) {
   function jumlah_failled_login($tgl) {
       $CI =& get_instance();
       //$this->ci->load->database();
       $jml_ijinnya = $CI->db
              ->where('month(tanggal)',date('m',strtotime($tgl)))
              ->where('year(tanggal)',date('Y',strtotime($tgl)))
              ->where('day(tanggal)',date('d',strtotime($tgl)))
              ->where('status','Failled')
              ->from('user_masuk')->count_all_results();
      if($jml_ijinnya==0)
      {
            return "0";
      }
        else
      {        
        $ijin = $CI->db
              ->select('count(*) as jumlah')
              ->where('month(tanggal)',date('m',strtotime($tgl)))
              ->where('year(tanggal)',date('Y',strtotime($tgl)))
              ->where('day(tanggal)',date('d',strtotime($tgl)))
              ->where('status','Failled')
              ->get('user_masuk')->result_array()[0]['jumlah'];
          return $ijin;
      }
   }
}

if (!function_exists('jumlah_success_login_ip')) {
   function jumlah_success_login_ip($ip) {
       $CI =& get_instance();
       //$this->ci->load->database();
       $jml_ijinnya = $CI->db
              ->where('ip',$ip)
              ->where('status','Success')
              ->from('user_masuk')->count_all_results();
      if($jml_ijinnya==0)
      {
            return "0";
      }
        else
      {        
          return $jml_ijinnya;
      }
   }
}

if (!function_exists('jumlah_failled_login_ip')) {
   function jumlah_failled_login_ip($ip) {
       $CI =& get_instance();
       //$this->ci->load->database();
       $jml_ijinnya = $CI->db
              ->where('ip',$ip)
              ->where('status','Failled')
              ->from('user_masuk')->count_all_results();
      if($jml_ijinnya==0)
      {
            return "0";
      }
        else
      {        
        return $jml_ijinnya;
      }
   }
}

if (!function_exists('block_ip_client')) {
   function block_ip_client() {
       $CI =& get_instance();
       $data=0;
       //jika ada di whitelist maka boleh masuk
       $boleh = $CI->db
              ->where('ip',get_real_ip())
              ->from('ip_whitelist')->count_all_results();
        if($boleh==1)
        {
           $data=0;
        }
        else
        {
          $data = $CI->db
              ->where('ip_banned',get_real_ip())
              -> where('open_banned','0')
              ->from('ip_blacklist')->count_all_results();
        }
          return $data;
      }
}

if (!function_exists('block_ip')) {
   function block_ip() {
       $CI =& get_instance();
       $data=0;
        //jika ada di whitelist maka boleh masuk
       $boleh = $CI->db
              ->where('ip',get_real_ip())
              ->from('ip_whitelist')->count_all_results();
        if($boleh==1)
        {
           $data=0;
        }
        else
        {
          $data = $CI->db
              ->where('ip',get_real_ip())
              -> where('open','0')
              ->from('ip_block')->count_all_results();
        }
        return $data;
        }
}

if (!function_exists('apa_whitelist_ip')) {
   function apa_whitelist_ip($ip) {
       $CI =& get_instance();
       $data = $CI->db
              ->where('ip',$ip)
              ->from('ip_whitelist')->count_all_results();
        return $data;
        }
}

if (!function_exists('apa_blok_ip')) {
   function apa_blok_ip($ip) {
       $CI =& get_instance();
       $data = $CI->db
              ->where('ip',$ip)
              -> where('open','0')
              ->from('ip_block')->count_all_results();
        return $data;
        }
}

if (!function_exists('jumlah_mega_kiriman')) {
   function jumlah_mega_kiriman($tgl) {
       $CI =& get_instance();
       //$this->ci->load->database();
       $besar_jum_file = $CI->db
              ->select('SUM(besar_file) as besar_jum_file')
              ->where("No_berita in ( select No_berita FROM berita_kiriman where tanggal='$tgl')")                
              ->get('berita_file')->result_array()[0]['besar_jum_file'];
        return $besar_jum_file;
   }
}

if (!function_exists('fsize')) {
  function fsize($file){
    $a = array("B", "KB", "MB", "GB", "TB", "PB");
    $pos = 0;
    $size = $file;
    while ($size >= 1024)
    {
    $size /= 1024;
    $pos++;
    }
    return round ($size,2)." ".$a[$pos];
  }
}

if (!function_exists('menu_tree_jum')) {
   function menu_tree_jum($menu) {
       $CI =& get_instance();
        $data = $CI->db
              ->where('tree_menu',$menu) 
              ->from('menu')->count_all_results();
          return $data;
        }
}

if (!function_exists('menu_tree')) {
   function menu_tree($menu) {
       $CI =& get_instance();
        $data = $CI->db
              ->select('*')
              ->where('tree_menu',$menu) 
              ->order_by('urutan','ASC')  
              ->get('menu');
          return $data;
        }
}

if (!function_exists('id_menu_tree')) {
   function id_menu_tree($id) {
      if(strlen($id)>0 and $id<>0)
      {
       $CI =& get_instance();
       $data = $CI->db
              ->select('tree_menu')
              ->where('id',$id)                
              ->get('menu')->result_array()[0]['tree_menu'];
       }
       else
          $data="";
          return $data;
        }
}

if (!function_exists('hak_akses')) {
   function hak_akses($nip) {
       $CI =& get_instance();
        $data = $CI->db
              ->select('a.*')
              ->join('menu a', 'a.id = d.id', 'LEFT')
              ->where('d.nip',$nip)  
              ->get('menu_user d');
          return $data;
        }
}

if (!function_exists('group_user')) {
   function group_user() {
       $CI =& get_instance();
        $data = $CI->db
              ->get('group');
          return $data;
        }
}

if (!function_exists('menu_all')) {
   function menu_all($id) {
       $CI =& get_instance();
       if(strlen($id)==0)
        {
          $data = $CI->db
              ->select('*')
              ->get('menu');
        }
        else
        {
          $data = $CI->db
              ->select('*')
              ->where('id <>'.$id)
              ->where('default_menu=0')
              ->where('tree_menu=0')
              ->get('menu');
        }
        return $data;
      
        }
}
if (!function_exists('get_disk_free')) {
function get_disk_free($path){
  
  $df = round((((disk_free_space($path)/1024)/1024)/1024),2);

  return $df;
}
}

if (!function_exists('get_server_memory_usage')) {
function get_server_memory_usage(){
  
  $free = shell_exec('free');
  $free = (string)trim($free);
  $free_arr = explode("\n", $free);
  $mem = explode(" ", $free_arr[1]);
  $mem = array_filter($mem);
  $mem = array_merge($mem);
  $memory_usage =(integer)($mem[2]/$mem[1]*100);

  return $memory_usage;
}
}



if (!function_exists('agama')) {
   function agama() {
      return [
         'Islam' => 'Islam',
         'Kristen' => 'Kristen',
         'Katholik' => 'Katholik',
         'Hindu' => 'Hindu',
         'Budha' => 'Budha',
      ];
   }
}

// buat dirrektori

if (!function_exists('create_dir')) {
   function create_dir($dir) {
      if (!is_dir($dir)) {
         if (!mkdir($dir, 0777, true)) {
            die('Failed to create directory : ' . $dir);
         }
      }
   }
}

if (!function_exists('encode_url')) {
   function encode_url($key = '') {
      $CI = &get_instance();
      $CI->load->library('encrypt_url');
      return $CI->encrypt_url->encode($key);
   }
}

if (!function_exists('decode_url')) {
   function decode_url($key = '') {
      $CI = &get_instance();
      $CI->load->library('encrypt_url');
      return $CI->encrypt_url->decode($key);
   }
}

if (!function_exists('sex')) {
   function sex() {
      return [
         'Laki-laki' => 'Laki-laki',
         'Perempuan' => 'Perempuan',
      ];
   }
}

if (!function_exists('copyright')) {
   function copyright() {
      date_default_timezone_set('Asia/Jakarta');
      $date = 2016;
      $str = date('Y') > $date ? "COPYRIGHT &copy; " . $date . ' - ' . date('Y') : "COPYRIGHT &copy; " . $date;
      return $str;
   }
}

if (!function_exists('developed')) {
   function developed() {
      return 'DIKEMBANGKAN OLEH <a href="#" target="_blank">SOFTNET SUPPORT</a>';
   }
}

if (!function_exists('is_valid_date')) {
   function is_valid_date($str) {
      $split = [];
      if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $str, $split)) {
         return checkdate($split[2], $split[3], $split[1]);
      }
      return false;
   }
}


if (!function_exists('aksesnya')) {
   function aksesnya($nip,$id) {
       $CI =& get_instance();
       //$this->ci->load->database();
        $jumlah = $CI->db
              ->where('nip',$nip)  
              ->where('id',$id)    
              ->from('menu_user')->count_all_results();
          return $jumlah;
        }
}



if (!function_exists('jumlah_barang')) {
   function jumlah_barang($nama,$status) {
       $CI =& get_instance();
        $data = $CI->db
              ->where('nama_barang',$nama) 
              ->where('status',$status) 
              ->from('jtv_inventaris.it_Inventaris')->count_all_results();
          return $data;
        }
}

if (!function_exists('saldo_linda')) {
   function saldo_linda($tahun,$bulan,$tipe) { // tipe 1 pemasukkan 2 pengeluaran
       $CI =& get_instance();
       if($tipe==1)
       {
        $jumlah_data = $CI->db
                   ->where('bulan',$bulan)->where('tahun',$tahun)              
                    ->from('jtv_keuangan.so_detail')->count_all_results();
        if($jumlah_data==0) $data=0;
        else
        {
          $data = $CI->db
          ->select('sum(debet*ord) as pemasukkan')->where('bulan',$bulan)->where('tahun',$tahun)->group_by('bulan,tahun')->get('jtv_keuangan.so_detail')->result_array()[0]['pemasukkan'];
        }
        return $data;
       } 
      elseif($tipe==2)
      {
         $jumlah_data = $CI->db
                   ->where('bulan',$bulan)->where('tahun',$tahun)              
                    ->from('jtv_keuangan.so_detail')->count_all_results();
        if($jumlah_data==0) $data=0;
        else
        {
        $data = $CI->db
          ->select('sum(kredit*ord) as pengeluaran')->where('bulan',$bulan)->where('tahun',$tahun)->group_by('bulan,tahun')->get('jtv_keuangan.so_detail')->result_array()[0]['pengeluaran'];
        }
        return $data;
      }
  }
}

if (!function_exists('cari_hak_akses')) {
   function cari_hak_akses($nip,$controller) {
       $CI =& get_instance();
       //$this->ci->load->database();
       //jika tidak ada di database maka untuk global
       $adatdk = $CI->db
                    ->where('site',$controller)     
                    ->from('menu')->count_all_results();
      if($adatdk==0)
      {
             $default_menu = $CI->db
                    ->where('site',$controller)  
                    ->where('nip',$nip)              
                    ->from('absensi_akses_tambahan')->count_all_results();
              if($default_menu=="0") 
              {
                  return "0";
              }
              else
              {
                  return "1";
              }
      } 
      else
      { 
             $default_menu = $CI->db
                    ->select('default_menu')
                    ->where('site',$controller)                
                    ->get('menu')->result_array()[0]['default_menu'];
              if($default_menu=="1") 
              {
                  return "1";
              }
              else
              {
                    $tree_menu = $CI->db
                    ->select('tree_menu')
                    ->where('site',$controller)                
                    ->get('menu')->result_array()[0]['tree_menu'];
                    //jika merupakan tree menu
                    if($tree_menu=="0")
                    {
                          $id_controller = $CI->db
                          ->select('id')
                          ->where('site',$controller)                
                          ->get('menu')->result_array()[0]['id'];
                          $hasilnya = $CI->db
                          ->where('nip',$nip)  
                          ->where('id',$id_controller)    
                          ->from('menu_user')->count_all_results();
                          return $hasilnya;
                    }
                    else
                    {
                          $id_controller = $tree_menu;
                          $hasilnya = $CI->db
                          ->where('nip',$nip)  
                          ->where('id',$id_controller)    
                          ->from('menu_user')->count_all_results();
                          return $hasilnya;
                    }
              }
        }
   }
}

if (!function_exists('cari_hak_akses_form')) {
   function cari_hak_akses_form($nip,$controller,$id) {
       $CI =& get_instance();
       //$this->ci->load->database();
       //cari dulu tipe apakah 0 atau 1
       $adatdk = $CI->db
                    ->where('id',$id)     
                    ->from('menu_lain')->count_all_results();
      if($adatdk==0)
      {
          return "0";
      } 
      else
      { 
              //kalau 0 semua boleh akses
             $security = $CI->db
                    ->select('security')
                    ->where('menu',$controller) 
                    ->where('id',$id)     
                    ->get('menu_lain')->result_array()[0]['security'];
              if($security=="0") 
              {
                  return "1";
              }
              else
              {
                    //cek di 
                    $tree_menu = $CI->db
                    ->where('id_menu_lain',$id)   
                    ->where('nip',$nip)
                    ->from('menu_lain_security')->count_all_results();
                    //jika merupakan tree menu
                    if($tree_menu=="0")
                    {
                          return "0";
                    }
                    else
                    {
                          return "1";
                    }
              }
        }
   }
}


if (!function_exists('cari_level')) {
   function cari_level($level) {
       $CI =& get_instance();
       //$this->ci->load->database();
        $cek = $CI->db
              ->where('level',$level)   
              ->from('users')->count_all_results();
        if($cek==0)
        {
            return "0";
        }
        else
        {
          return "1";
        }
   }
}

if (!function_exists('simpan_update_data')) {
   function simpan_update_data($variabel,$nilai,$typedb,$NIP,$tanggal) {
       $CI =& get_instance();
       //$this->ci->load->database();
       // typedb=1 adalah insert klo 2 update 3 hapus NIP
        if($typedb==1)
        {            
            $CI->db->query("insert into cetak_absen(NIP,nip_cari,tgl_in,um) values('".$nilai."','".$NIP."','".$variabel."','0')");
        }
        elseif ($typedb==3) {
           $CI->db->query("delete from cetak_absen where nip_cari='".$NIP."'");
        }  
        elseif ($typedb==2) {
         $CI->db->query("update cetak_absen set ".$variabel."='".$nilai."' where tgl_in='".$tanggal."' and NIP='".$NIP."'"); 
        }  
   }
}

if (!function_exists('simpan_update_data_posting')) {
   function simpan_update_data_posting($variabel,$nilai,$typedb,$NIP,$tanggal) {
       $CI =& get_instance();
       //$this->ci->load->database();
       // typedb=1 adalah insert klo 2 update 3 hapus NIP
        if($typedb==1)
        {            
            $CI->db->query("insert into report_absen(NIP,bulan,tgl_in,tahun) values('".$NIP."','".$variabel."','".$tanggal."','".$nilai."')");
        }
        elseif ($typedb==3) {
           $CI->db->query("delete from report_absen where nip='".$NIP."' and bulan='".$variabel."' and tahun='".$nilai."'");
        }  
        elseif ($typedb==2) {
         $CI->db->query("update report_absen set ".$variabel."='".$nilai."' where tgl_in='".$tanggal."' and NIP='".$NIP."'"); 
        }  
   }
}

if (!function_exists('cari_database')) {
   function cari_database($tabel,$field,$value,$field_dicari) {
       $CI =& get_instance();
       //$this->ci->load->database();
       if(strlen($value)==0)
       {
        $data = $CI->db
                ->where($field)   
                ->from($tabel)->count_all_results();
          if($data==0)
          {
              return "";
          }
          else
          {
            $hasilnya = $CI->db
                ->select($field_dicari)
                ->where($field)               
                 ->get($tabel)->result_array()[0][$field_dicari];
            return $hasilnya;
          }
      }
    else
      {
          $data = $CI->db
                ->where($field,$value)   
                ->from($tabel)->count_all_results();
          if($data==0)
          {
              return "";
          }
          else
          {
            $hasilnya = $CI->db
                ->select($field_dicari)
                ->where($field,$value)               
                 ->get($tabel)->result_array()[0][$field_dicari];
            return $hasilnya;
          }
      }
   }
}
if (!function_exists('cari_database_lengkap')) {
   function cari_database_lengkap($field,$value,$field2,$value2,$field3,$value3,$field4,$value4,$field5,$value5,$database) {
       $CI =& get_instance();
       //$this->ci->load->database();
      if(strlen($value)==0)
      {
        $dbnya = $CI->db
              ->select('*')
              ->where($field)
              ->get($database);
      }
      elseif(strlen($field2)==0)
      {
        $dbnya = $CI->db
              ->select('*')
              ->where($field,$value)
              ->get($database);
      }
      elseif(strlen($field3)==0)
      {
        $dbnya = $CI->db
              ->select('*')
              ->where($field,$value)
              ->where($field2,$value2)
              ->get($database);
      }
      elseif(strlen($field4)==0)
      {
        $dbnya = $CI->db
              ->select('*')
              ->where($field,$value)
              ->where($field2,$value2)
              ->where($field3,$value3)
              ->get($database);
      }
      elseif(strlen($field5)==0)
      {
        $dbnya = $CI->db
              ->select('*')
              ->where($field,$value)
              ->where($field2,$value2)
              ->where($field3,$value3)
               ->where($field4,$value4)
              ->get($database);
      }
       elseif(strlen($field5)>0)
      {
        $dbnya = $CI->db
              ->select('*')
              ->where($field,$value)
              ->where($field2,$value2)
              ->where($field3,$value3)
               ->where($field4,$value4)
               ->where($field5,$value5) 
              ->get($database);
      }              
          return $dbnya;
   }
}



if (!function_exists('cari_jumlah_db')) {
   function cari_jumlah_db($field,$value,$field2,$value2,$field3,$value3,$database) {
       $CI =& get_instance();
       if(strlen($field2)==0)
       {
              if($value==1)
              {
              $data = $CI->db
              ->where($field)    
              ->from($database)->count_all_results();
              }
              else
              { 
                $data = $CI->db
              ->where($field,$value)    
              ->from($database)->count_all_results();
             }
       }
       elseif(strlen($field3)==0)
       {
              if($value==1)
              {
              $data = $CI->db
              ->where($field)    
              ->where($field2,$value2)
              ->from($database)->count_all_results();
              }
              else
              { 
                $data = $CI->db
                ->where($field,$value)   
                ->where($field2,$value2)
                ->from($database)->count_all_results();
              }
       }
     else
       {
               if($value==1)
              {
                $data = $CI->db
                ->where($field)    
                ->where($field2,$value2)
                ->where($field3,$value3)
                ->from($database)->count_all_results();
              }
              else
              { 
                $data = $CI->db
                ->where($field,$value)    
                ->where($field2,$value2)
                ->where($field3,$value3)
                ->from($database)->count_all_results();
              }
       }
          return $data;
   }
}


if (!function_exists('cari_tree_view')) {
   function cari_tree_view($id) {
       $CI =& get_instance();

     $hasilnya= $CI->db
               ->where('id',$id )    
               ->from('menu')->count_all_results();
      if($hasilnya==0)
        $hasilnya="";
      else
      $hasilnya= $CI->db
               ->select('*')
               ->where('id',$id )    
               ->get('menu')->result_array()[0]['nama'];
       return $hasilnya;
   }
}



if (!function_exists('cari_public')) {
   function cari_public($id) {
      if($id==0)
        $hasilnya="Private";
      else
      $hasilnya= "Public";
       return $hasilnya;
   }
}

if (!function_exists('detikkejam')) {
   function detikkejam($waktu){
       if(($waktu>0) and ($waktu<60)){
           if(strlen($waktu)==1) $waktu="0".$waktu; 
           $lama="00:00:".$waktu;
           return $lama;
       }
       if(($waktu>60) and ($waktu<3600)){
           $detik=fmod($waktu,60);
           if(strlen($detik)==1) $detik="0".$detik; 
           $menit=$waktu-$detik;
           $menit=$menit/60;
           if(strlen($menit)==1) $menit="0".$menit; 
           $lama="00:".$menit.":".$detik;
           return $lama;
       }
       elseif($waktu >3600){
           $detik=fmod($waktu,60);
           if(strlen($detik)==1) $detik="0".$detik; 
           $tempmenit=($waktu-$detik)/60;
           $menit=fmod($tempmenit,60);
           if(strlen($menit)==1) $menit="0".$menit; 
           $jam=($tempmenit-$menit)/60;    
           if(strlen($jam)==1) $jam="0".$jam; 
           $lama=$jam.":".$menit.":".$detik;
           return $lama;
       }
   }
}