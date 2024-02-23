<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <ul class="breadcrumb">
        <li class="active">Whitelist IP</li>
  </ul>
   <div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-laptop"></span><span class="fa fa-check-square-o"></span> Advertiser  </h2>
      </div>
      <?=$alert;?> 
      <div class="panel panel-default">
          <div class="panel-heading">    
           <h4 class="panel-title"></h4><a href="<?=site_url('advertiser/tambah/');?>"><button type="button" class="btn btn-warning btn-sm">Tambah Advertiser</button></a>
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
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th style="width:80px;">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->kode; ?></td>
                <td><?php echo $row->nama; ?> </td>
                <td><?php echo $row->alamat; ?> </td> 
                <td>
                    <div class="btn-group">
                        <a href="<?=site_url('advertiser/update/'.$row->kode);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </td>          
            </tr>
            <?php } ?>
            </tbody>
            
          </table>
       </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</div>
</div>

