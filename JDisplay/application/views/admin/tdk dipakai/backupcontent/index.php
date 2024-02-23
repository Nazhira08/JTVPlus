<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <ul class="breadcrumb">
        <li class="active">Storage</li>
  </ul>
   <div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-refresh"></span>  Backup data </h2>
      </div>
      <?=$alert;?> 
      <div class="panel panel-default">
          <div class="panel-heading">    
                            
              <h4 class="panel-title"></h4>
                  <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?> 
                    <div class="form-group">
                                    <div class="col-md-10">
                                            <?php if(strlen($hslsimpan)>0)
                                            {
                                               
                                            ?>
                                             <div class="alert alert-warning" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <strong>Warning</strong>  <?php  echo $hslsimpan; ?>
                                            </div>
                                            <?php 
                                            }?>
                                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Pilih Tanggal Backup</label>
                        <div class="col-md-2">
                            <select name="bulan"  class="form-control select" >
                                    <?php
                                    $opt= array('1' => 'Januari','2' => 'Februari','3' => 'maret','4' => 'April','5' => 'Mei','6' => 'Juni','7' => 'Juli','8' => 'Agustus','9' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember') ;

                                    foreach ($opt as $i => $value) {
                                      echo "<option value=\"$i\"";
                                      if ($bulan == $i) 
                                      {
                                        echo "selected" ; 
                                      }
                                      echo ">$opt[$i]</option>" ;
                                    }

                                    ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="tahun" class="form-control" value="<?=$tahun?>">
                        </div>
                        <div class="col-md-1"> 
                            <button type="submit" class="btn btn-info" name="jenis" value="cek"><span class="fa fa-search"></span> Cek </button>
                        </div>
                     </div>
                     <div class="form-group">
                        <?php if($jum_query>0)
                        {?>
                        <label class="col-md-2 control-label">Pilih Storage</label>
                        <div class="col-md-2">
                            <select name="storage1"  class="form-control select" >
                                   <option value='[Pilih Storage]'>[Pilih Storage]</option>
                                    <?php
                                     foreach ($storage->result() as $row)  {
                                      echo "<option value=\"$row->id\"";
                                      if ($storage2 == $row->id) 
                                      {
                                        echo "selected" ; 
                                      }
                                      echo ">$row->nama_storage</option>" ;
                                    }
                                    ?>
                            </select>
                        </div>
                        <label class="col-md-2 control-label">Pilih Storage Backup</label>
                        <div class="col-md-2">
                            <select name="storage2"  class="form-control select" >
                                     <option value='[Pilih Storage]'>[Pilih Storage]</option>
                                    <?php

                                    foreach ($storage->result() as $row)  {
                                      echo "<option value='$row->id'";
                                      if ($storage2 == $row->id) 
                                      {
                                        echo "selected" ; 
                                      }
                                      echo ">$row->nama_storage</option>" ;
                                    }
                                    ?>
                            </select>
                        </div>
                         <div class="col-md-2"> 
                            <button type="submit" class="btn btn-warning" name="jenis" value="backup"><span class="fa fa-download"></span> Backup </button>
                        </div>
                        <?php } ?>
                    </div>
                  </form>
                <ul class="panel-controls">
                    <li><a href="setinguser" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="setinguser" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="setinguser" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                                
          </div>
      
       
         <div class="panel-body">
          <table  class="table datatable">
            <thead>
            <tr>
                <th style="width: 50px">NO</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Kapasitas</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; $total=0; 
            $total_files=0;
            foreach ($query->result() as $row) { $no++; ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->tanggal; ?></td>
                <td><?php echo $row->jumlah; ?> </td>
                <td><?php echo fsize(jumlah_mega_kiriman($row->tanggal));
                 $total+=jumlah_mega_kiriman($row->tanggal);
                 $total_files+=$row->jumlah;
                 ?> </td>
            </tr>
            <?php } ?>
            </tbody>
            
          </table>
          

       </div>
       <div class="panel-body">
       <div class="col-md-3">
                  <div class="widget widget-info widget-item-icon">
                      <div class="widget-item-right">
                      <span class="fa fa-users"></span>
                  </div>                             
                    <div class="widget-data-left">
                        <div class="widget-int num-count"><?=$jum_akses?></div>
                        <div class="widget-title">User Akses</div>
                        <div class="widget-subtitle">Yang sedang akses Website</div>
                    </div>                                     
                </div>
          </div>
          <div class="col-md-3">                        
                <a href="#" class="tile tile-danger tile-valign"><?php echo fsize($total);?>
                    <div class="informer informer-default dir-tr"><span class="fa fa-cloud"></span></div>
                    <div class="informer informer-default dir-bl">Total Space Yang dibutuhkan</div>
                </a>                                                    
          </div>
          <div class="col-md-3">                        
                <a href="#" class="tile tile-info tile-valign">
                       <?php echo $total_files;?> Files
                    <div class="informer informer-default">Jumlah File</div>
                    <div class="informer informer-default dir-br"><span class="fa fa-files-o"></span></div>
                </a>                            
          </div>
          <div class="col-md-3">
                  <div class="widget widget-warning widget-item-icon">
                      <div class="widget-item-right">
                      <span class="fa fa-dashboard"></span>
                  </div>                             
                    <div class="widget-data-left">
                      <div class="widget-title">PERHATIAN</div>
                      <div class="widget-subtitle">Pastikan Proses Backup menggunakan internet stabil dan yang sedang mengakses Web tidak banyak</div>
                    </div>                                     
                </div>
          </div>

       </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</div>
</div>

