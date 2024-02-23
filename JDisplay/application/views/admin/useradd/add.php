<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li><a href="<?=site_url('useradd');?>">Home</a></li>
                    <li class="active">Tambah User</li>
                </ul>
    <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Tambah User</h2>
    </div>
    <div class="page-content-wrap">            
    <div class="row">
        <div class="col-xs-12">
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Username</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Username" type="text" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Password" type="password" class="form-control" name="password" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ulangi Password</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Password" type="password" class="form-control" name="repassword" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Display Name</label>
                        <div class="col-md-9">
                            <input style="width: 200px"  required autofocus placeholder="display name" type="text" class="form-control" name="display_name"> 
                        </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-md-2 control-label">Level</label>
                        <div class="col-md-2">
                             <select name="level" class="form-control select">
                                <?php
                                        $opt= array('user' => 'user', 'admin' => 'admin') ;

                                       foreach ($opt as $i => $value) {
                                          echo "<option value=\"$i\"";
                                          echo ">$opt[$i]</option>" ;
                                        }

                                  ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-9">
                            <input style="width: 300px"  required autofocus placeholder="Email" type="text" class="form-control" name="email"> 
                        </div>
                    </div>           
                    <div class="form-group">
                        <label class="col-md-2 control-label">aktif</label>
                        <div class="col-md-2">
                             <select name="aktif" class="form-control select">
                                <?php
                                        $opt= array('0' => 'Tdk Aktif', '1' => 'Aktif') ;

                                       foreach ($opt as $i => $value) {
                                          echo "<option value=\"$i\"";
                                          echo ">$opt[$i]</option>" ;
                                        }

                                  ?>
                            </select>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-md-2 control-label">FTP User</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Username" type="text" class="form-control" name="ftp_user">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">FTP Password</label>
                        <div class="col-md-9">
                            <input style="width: 400px"  required autofocus placeholder="Username" type="text" class="form-control" name="ftp_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">FTP Path</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Username" type="text" class="form-control" name="ftp_path">
                        </div>
                    </div>                        
                    <div class="form-group">
                        <label class="col-md-2 control-label">TV</label>
                        <div class="col-md-9">
                            <input style="width: 200px"  required autofocus placeholder="TV" type="text" class="form-control" name="TV"> 
                        </div>
                    </div>    
                    <div class="form-group">
                         <label class="col-md-2 control-label">Photo</label>
                        <div class="col-md-9">
                             <input style="width: 300px" accept=".jpg" id="file_pendukung" autofocus placeholder="alasan" type="file" class="form-control" name="file_pendukung"  onchange="validateFileType()">
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-9">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('useradd');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
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

