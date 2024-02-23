<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li><a href="<?=site_url('lokasi');?>">Home</a></li>
                    <li class="active">Lokasi</li>
                </ul>
    <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Lokasi</h2>
    </div>
    <div class="page-content-wrap">            
    <div class="row">
        <div class="col-xs-12">
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Lokasi</label>
                        <div class="col-md-2">
                            <input  required autofocus placeholder="lokasi" type="text" class="form-control" name="lokasi" >
                        </div>
                    </div>                    
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-7">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('lokasi');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
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

