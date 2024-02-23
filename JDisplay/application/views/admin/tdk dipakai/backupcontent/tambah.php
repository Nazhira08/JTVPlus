<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li><a href="<?=site_url('storage');?>">Home</a></li>
                    <li class="active">Storage</li>
                </ul>
    <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Storage</h2>
    </div>
    <div class="page-content-wrap">            
    <div class="row">
        <div class="col-xs-12">
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nama Storage</label>
                        <div class="col-md-2">
                            <input  required autofocus placeholder="Label Storage" type="text" class="form-control" name="nama_storage" value='<?=$query['nama_storage'];?>'>
                             <input type="hidden" class="form-control" name="id" value='<?=$query['id'];?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Jenis Storage</label>
                        <div class="col-md-7">
                            <input required autofocus placeholder="jenis" type="text" class="form-control" name="jenis_storage" value='<?=$query['jenis_storage'];?>' >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Kapasitas</label>
                        <div class="col-md-1">
                            <input required autofocus placeholder="capacity" type="text" class="form-control" name="capacity" value='<?=$query['capacity'];?>'> 
                        </div>
                        <div class="col-md-1" value='<?=$query['capacity'];?>'>
                            <B>Gigabyte</B>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">serial</label>
                        <div class="col-md-7">
                            <input required autofocus placeholder="serial" type="text" class="form-control" name="sn" value='<?=$query['sn'];?>'>
                        </div>
                    </div>
                    
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-7">
                        <button type="submit" class="btn btn-success btn-sm btn-flat" name="save" value="<?=$tombol;?>"><i class="<?=$image?>"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('storage');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
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

