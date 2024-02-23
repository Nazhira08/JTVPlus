<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<ul class="breadcrumb">
                    <li class="active">Reset Pasword User</li>
                </ul>
    <div class="page-title">                    
        <h2><span class="fa fa-key"></span> Reset Password</h2>
    </div>
    <div class="page-content-wrap">            
    <div class="row">
        <div class="col-xs-12">
            <?=$alert;?> 
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="col-md-6">
                <div class="form-body">

                    <div class="form-group">
                                <label class="col-md-3 control-label">Password Lama </label>
                                <div class="col-md-9">
                                    <input style="width: 400px"  required autofocus placeholder="password" type="password" class="form-control" name="password">
                                </div>                                        
                        </div>
                        <div class="form-group">
                        <label class="col-md-3 control-label">PASSWORD BARU</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Password Baru" type="password" class="form-control" name="password1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">ULANGI PASSWORD BARU</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Ulangi Password Baru" type="password" class="form-control" name="password2">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
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