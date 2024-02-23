<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<ul class="breadcrumb">
        <li><a href="<?=site_url('menu');?>">Menu</a></li>
        <li class="active">Tambah Menu</li>
</ul>
<div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Tambah Menu</h2>
    </div>
<div class="page-content-wrap">  
    <div class="row">
        <div class="col-xs-12">
            <?=$alert;?> 
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
             <div class="block">

                    <div class="form-group">
                        <label class="col-md-2 control-label">ID</label>
                        <div class="col-md-1">
                            <input required readonly autofocus placeholder="ID" type="text" class="form-control" name="id" value="<?=$id_nya;?>">
                        </div>                                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">NAMA</label>
                        <div class="col-md-4">
                            <input <?php if($jenis_update=="delete") {?> readonly="yes" <?php }?>  required autofocus placeholder="Nama" type="text" class="form-control" name="nama" value="<?=(set_value('nama')) ? set_value('nama') : $query['nama']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Icon</label>
                        <div class="col-md-2">
                            <input <?php if($jenis_update=="delete") {?> readonly="yes" <?php }?>  required autofocus placeholder="icon" type="text" class="form-control" name="icon" value="<?=(set_value('icon')) ? set_value('icon') : $query['icon']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">SITE</label>
                        <div class="col-md-4">
                            <input <?php if($jenis_update=="delete") {?> readonly="yes" <?php }?>  required autofocus placeholder="Site" type="text" class="form-control" name="site" value="<?=(set_value('site')) ? set_value('site') : $query['site']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Default Menu</label>
                        <div class="col-md-2">
                            <?php if($jenis_update=="update" ||$jenis_update=="tambah") {?> 
                                    <select name="default_menu"  class="form-control select" >
                                    <?php
                                    $opt= array('0' => 'Orang Tertentu','1' => 'Untuk Semua Orang') ;

                                    foreach ($opt as $i => $value) {
                                      echo "<option value=\"$i\"";
                                      if ($query['default_menu'] == $i) 
                                      {
                                        echo "selected" ; 
                                      }
                                      echo ">$opt[$i]</option>" ;
                                    }

                                    ?>
                                    </select>
                            <?php }
                            else
                                {?><input <?php if($jenis_update=="delete") {?> readonly="yes" <?php }?>  required autofocus placeholder="Menu Default" type="text" class="form-control" name="default_menu" value="<?=(set_value('default_menu')) ? set_value('default_menu') : $query['default_menu']?>">
                                    <?php }
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">URUTAN</label>
                        <div class="col-md-1">
                            <input <?php if($jenis_update=="delete") {?> readonly="yes" <?php }?>  required autofocus placeholder="Urutan" type="text" class="form-control" name="urutan" value="<?=(set_value('urutan')) ? set_value('urutan') : $query['urutan']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">TREE MENU</label>
                        <div class="col-md-2">
                            <?php if($jenis_update=="update" ||$jenis_update=="tambah") {?> 
                                    <select name="tree_menu"  class="form-control select" >
                                    <option value="" selected></option>
                                    <?php
                                    if($jenis_update=="tambah")
                                        $id='999';
                                    else
                                        $id=$query['id'];
                                    foreach (menu_all($id)->result() as $row2)
                                    {
                                      echo "<option value=\"$row2->id\"";
                                      if ($row2->id == $query['tree_menu']) 
                                      {
                                        echo "selected" ; 
                                      }
                                      echo ">$row2->nama</option>" ;
                                    }

                                    ?>
                                    </select>
                            <?php }
                            else
                                {?>
                                    <input style="width: 400px"  <?php if($jenis_update=="delete") {?> readonly="yes" <?php }?>  required autofocus placeholder="tree menu" type="text" class="form-control" name="tree_menu" value="<?=(set_value('tree_menu')) ? set_value('tree_menu') : $query['tree_menu']?>">
                                    <?php }
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">GROUP</label>
                        <div class="col-md-2">
                            <?php if($jenis_update=="update" ||$jenis_update=="tambah") {?> 
                                    <select name="group"  class="form-control select">
                                    <option value="" selected></option>
                                    <?php
                                    foreach (group_user()->result() as $row2)
                                    {
                                      echo "<option value=\"$row2->nama_group\"";
                                      if ($row2->nama_group == $query['group']) 
                                      {
                                        echo "selected" ; 
                                      }
                                      echo ">$row2->nama_group</option>" ;
                                    }

                                    ?>
                                    </select>
                            <?php }
                            else
                                {?>
                                    <input style="width: 400px"  <?php if($jenis_update=="delete") {?> readonly="yes" <?php }?>  required autofocus placeholder="group" type="text" class="form-control" name="group" value="<?=(set_value('group')) ? set_value('group') : $query['group']?>">
                                    <?php }
                            ?>

                        </div>
                    </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-9">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('menu');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-body">

                    <div id="form_detail" name="form_detail"></div>


                </div>
            </div>
       </form>
    </div>
</div>
</div>
