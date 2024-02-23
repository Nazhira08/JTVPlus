<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <ul class="breadcrumb">
        <li class="active">Storage</li>
  </ul>
   <div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-hdd-o"></span>  Data Storage </h2>
      </div>
      <?=$alert;?> 
      <div class="panel panel-default">
          <div class="panel-heading">    
           <h4 class="panel-title"></h4><a href="<?=site_url('storage/tambah/');?>"><button type="button" class="btn btn-warning btn-sm">Tambah Storage</button></a>
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
                <th>Label</th>
                <th>Jenis</th>
                <th>Sisa Capacity</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->nama_storage; ?></td>
                <td><?php echo $row->jenis_storage; ?> </td>
                <td><?php echo fsize($row->capacity*1024*1024*1024); ?> </td> 
                <td>
                    <div class="btn-group">
                        <a href="<?=site_url('storage/update/'.$row->id);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="<?=site_url('storage/delete/'.$row->id);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="delete"><i class="fa fa-trash-o"></i></a>
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

