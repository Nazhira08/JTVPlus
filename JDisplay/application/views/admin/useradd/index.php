<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <ul class="breadcrumb">
        <li class="active">Seting User</li>
  </ul>
   <div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-user"></span> User Seting </h2>
      </div>
      <?=$alert;?> 
      <div class="panel panel-default">
          <div class="panel-heading">                                
            <h4 class="panel-title"></h4><a href="<?=site_url('useradd/tambah/');?>"><button type="button" class="btn btn-warning btn-sm">Tambah User</button></a>
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
                <th>User</th>
                <th>Level</th>
                <th>Last Login</th>
                <th>Display</th>
                <th>TV</th>
                <th>Status</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->level; ?> </td>
                <td><?php echo $row->last_logged_in; ?> </td>
                <td><?php echo $row->display_name; ?> </td>
                <td><?php echo $row->TV; ?> </td>  
                <td><?php if( $row->aktif=="1") echo "Aktif"; else echo "Tdk aktif" ?> </td>      
                <td>
                    <div class="btn-group">
                        <a href="<?=site_url('useradd/update/'.$row->id_user);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="<?=site_url('useradd/delete/'.$row->id_user);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="delete"><i class="fa fa-trash-o"></i></a>
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
