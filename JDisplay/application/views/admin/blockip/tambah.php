<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li><a href="<?=site_url('blockip');?>">Home</a></li>
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
                        <label class="col-md-2 control-label">Open</label>
                        <div class="col-md-2">
                             <select name="open" class="form-control select">
                                <?php
                                        $opt= array('0' => 'Close', '1' => 'Open') ;

                                       foreach ($opt as $i => $value) {
                                          echo "<option value=\"$i\"";
                                          if ($query['open']== $i) 
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
                    <div class="col-md-offset-2 col-md-7">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('blockip');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
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
