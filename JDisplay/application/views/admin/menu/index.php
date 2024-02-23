            <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<ul class="breadcrumb">
        <li class="active">Seting Menu</li>
  </ul>
<div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-user"></span> User Menu </h2>
      </div>
      <?=$alert;?>      

        <div class="panel panel-default">
          <div class="panel-heading">                                
            <h4 class="panel-title"></h4><a href="<?=site_url('menu/tambah/');?>"><button type="button" class="btn btn-warning btn-sm">Tambah data</button></a>
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
                <th>NAMA</th>
                <th>ICON</th>
                <th>SITE</th>
                <th>DEFAULT MENU</th>
                <th>URUTAN</th>
                <th>TREE MENU</th>
                <th>GROUP</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->icon; ?> </td>
                <td><?php echo $row->site; ?></td>
                <td><?php echo cari_public($row->default_menu); ?></td>
                <td><?php echo $row->urutan; ?></td>
                <td><?php echo cari_tree_view($row->tree_menu); ?></td>
                <td><?php echo $row->group; ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?=site_url('menu/update/'.$row->id);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="<?=site_url('menu/delete/'.$row->id);?>" class="btn btn-sm bg-red" data-toggle="tooltip" data-original-title="Hapus"><i class="fa fa-trash-o"></i></a>
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