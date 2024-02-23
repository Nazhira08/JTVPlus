<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li><a href="<?=site_url('lockip');?>">Home</a></li>
                    <li class="active">Open Lock IP</li>
                </ul>
    <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Lock IP</h2>
    </div>
    <div class="page-content-wrap">            
    <div class="row">
        <div class="col-xs-12">
            <?=$alert;?> 
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
               <div class="form-group">
                        <label class="col-md-2 control-label">ID</label>
                        <div class="col-md-9">
                            <input style="width: 100px"  readonly="yes" required autofocus placeholder="ID" type="text" class="form-control" name="id" value="<?=$query['id']?>">
                        </div>
                </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Banned</label>
                        <div class="col-md-9">
                            <input style="width: 400px"  readonly="yes" required autofocus placeholder="tanggal banned" type="text" class="form-control" name="tgl_ban" value="<?=$query['tgl_ban']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">IP Banned</label>
                        <div class="col-md-9">
                            <input style="width: 400px"  readonly="yes"  required autofocus placeholder="ip banned" type="text" class="form-control" name="ip_banned" value="<?=$query['ip_banned']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alasan Banned</label>
                        <div class="col-md-9">
                            <input style="width: 200px"  readonly="yes"  required autofocus placeholder="alasan banned" type="text" class="form-control" name="alasan_banned" value="<?=$query['alasan_banned']?>"> 
                        </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-md-2 control-label">Open Banned</label>
                        <div class="col-md-2">
                             <select name="open_banned" class="form-control select">
                                <?php
                                        $opt= array('0' => 'Banned', '1' => 'Open Banned') ;

                                       foreach ($opt as $i => $value) {
                                          echo "<option value=\"$i\"";
                                          if ($query['open_banned']== $i) 
                                          {
                                            echo "selected" ; 
                                          }
                                          echo ">$opt[$i]</option>" ;
                                        }

                                  ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alasan Open</label>
                        <div class="col-md-9">
                            <input style="width: 300px"  required autofocus placeholder="alasan open" type="text" class="form-control" name="alasan_open" value="<?=$query['alasan_open']?>"> 
                        </div>
                    </div>           
                    
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-9">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('lockip');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
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

