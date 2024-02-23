<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li><a href="<?=site_url('whitelistip');?>">Home</a></li>
                    <li class="active">Open Lock IP</li>
                </ul>
    <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Lock IP</h2>
    </div>
    <div class="page-content-wrap">            
    <div class="row">
        <div class="col-xs-12">
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
                    <div class="form-group">
                        <label class="col-md-2 control-label">ID</label>
                        <div class="col-md-2">
                            <input  required autofocus placeholder="id" readonly="yes" type="text" class="form-control" name="id" value="<?=$query['id']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">IP</label>
                        <div class="col-md-2">
                            <input  required autofocus placeholder="ip" readonly="yes" type="text" class="form-control" name="ip" value="<?=$query['ip']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alasan</label>
                        <div class="col-md-7">
                            <input required autofocus placeholder="alasan" readonly="yes" type="text" class="form-control" name="alasan" value="<?=$query['alasan']?>">
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-7">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-trash-o"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('whitelistip');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
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
