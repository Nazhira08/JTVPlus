<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <ul class="breadcrumb">
        <li class="active">Lock IP</li>
  </ul>
   <div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-laptop"></span><span class="fa fa-lock"></span> Lock IP </h2>
      </div>
      <?=$alert;?> 
      <div class="panel panel-default">
          <div class="panel-heading">                                
            <h4 class="panel-title">Data Lock IP</h4>
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
                <th>IP</th>
                <th>Alasan Ban</th>
                <th>Status</th>
                <th style="width:80px;">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->tgl_ban; ?></td>
                <td><?php echo $row->ip_banned; ?> </td>
                <td><?php echo $row->alasan_banned; ?> </td>
                <td><?php if( $row->open_banned=="1") echo "Aktif"; else echo "Tdk aktif" ?>  </td>       
                <td>
                    <div class="btn-group">
                        <a href="<?=site_url('lockip/update/'.$row->id);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Open IP">
                        <button type="button" class="btn btn-danger btn-rounded"><?php if( $row->open_banned=="1") echo "Ban"; else echo "Open" ?> </button></a>
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

 <!-- warning -->
        <div class="message-box message-box-warning animated fadeIn" id="message-box-warning">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-warning"></span> Simpan</div>
                    <div class="mb-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tellus sed mauris mollis pellentesque nec a ligula. Quisque ultricies eleifend lacinia. Nunc luctus quam pretium massa semper tincidunt. Praesent vel mollis eros. Fusce erat arcu, feugiat ac dignissim ac, aliquam sed urna. Maecenas scelerisque molestie justo, ut tempor nunc.</p>                  
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end danger -->