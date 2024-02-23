<?php
//memasukkan file config.php
            $path_reporter="/berita/JNMC";
            $folder = $path_reporter."/".date("Y")."/".date("m")."/".date("d")."/";
            $cek1=$path_reporter;
            If(!file_exists($cek1)) 
            {
              mkdir($cek1); 
            }
            $cek1 = $path_reporter."/".date("Y");
            If(!file_exists($folder)) 
            {
              mkdir($cek1); 
            }
            $cek1 = $path_reporter."/".date("Y")."/".date("m");
            If(!file_exists($cek1)) 
            {
              mkdir($cek1);
            }
            $cek1 = $path_reporter."/".date("Y")."/".date("m")."/".date("d");
            If(!file_exists($cek1)) 
            {
              mkdir($cek1); 
            }
            //specify redirect URL
            //$redirect = "index.php?pilih=tulis&filenya=".$_FILES["file"]["name"] ;
            //upload the file
            
            move_uploaded_file($_FILES["media"]["tmp_name"], "$folder".$_FILES["media"]["name"]); 
            //masukkan ke database
            //$time_end = microtime_float();
            //$time = $time_end - $time_start;
            //opendb();
            //$no_berita =cari_no_berita($this->session->userdata('username'));
            $cek1="$folder".$_FILES["media"]["name"];
            If(file_exists($cek1)) 
            {
                echo '<div class="alert alert-warning">Success Upload Files.</div>' ; 
                 $result = 1;
            } else { 
                echo '<div class="alert alert-warning">Gagal upload file.</div>'; 
            }

?>