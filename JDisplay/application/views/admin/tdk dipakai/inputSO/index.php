<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <ul class="breadcrumb">
        <li class="active">Berita</li>
  </ul>
   <div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-calendar"></span> Input SO  </h2>
      </div>
      <?=$alert;?> 
      <div class="panel panel-default">
          <div class="panel-heading">    
           <h4 class="panel-title"></h4><a href="<?=site_url('InputSO/tambah/');?>"><button type="button" class="btn btn-warning btn-sm">Input SO</button></a>
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
                <th>No SO</th>
                <th>Tanggal Input </th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Jum SO</th>
                <th style="width:80px;">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->no_so; ?></td>
                <td><?php echo $row->tgl_input; ?> </td>
                 <td><?php echo $row->tgl_selesai; ?> </td>
                 <td><?php if($row->selesai=="1") echo "Selesai"; else echo "Progress";?> </td>
                <td> <i class="glyphicon glyphicon-film"></i> <?=jml_file($row->id); ?> Buah </td> 
                 <td>
                    <div class="btn-group">
                        <a href="<?=site_url('inputSO/tambah?edit='.$row->id);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="edit data"><i class="fa fa-pencil"></i></a>
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

