<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li><a href="<?=site_url('Setinguser');?>">Home</a></li>
                    <li class="active">Edit Security</li>
                </ul>
    <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Security insert</h2>
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
                            <input style="width: 100px"  readonly="yes" required autofocus placeholder="ID" type="text" class="form-control" name="id_user" value="<?=$query['id_user']?>">
                        </div>
                </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Username</label>
                        <div class="col-md-9">
                            <input style="width: 400px"  readonly="yes" required autofocus placeholder="Username" type="text" class="form-control" name="username" value="<?=$query['username']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-9">
                            <input style="width: 400px"  readonly="yes"  required autofocus placeholder="Password" type="password" class="form-control" name="password" value="<?=$query['password']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Display Name</label>
                        <div class="col-md-9">
                            <input style="width: 200px"  required autofocus placeholder="display name" type="text" class="form-control" name="display_name" value="<?=$query['display_name']?>"> 
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
                                          if ($query['level']== $i) 
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
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-9">
                            <input style="width: 300px"  required autofocus placeholder="Email" type="text" class="form-control" name="email" value="<?=$query['email']?>"> 
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
                                          if ($query['aktif']== $i) 
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
                        <label class="col-md-2 control-label">TV</label>
                        <div class="col-md-9">
                            <input style="width: 200px"  required autofocus placeholder="TV" type="text" class="form-control" name="TV" value="<?=$query['TV']?>"> 
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-md-2 control-label"> HAK AKSES </label>
                        <div class="col-md-9">
                        </div>
                    </div>            
                    
                <?php
                 foreach ($user_menunya->result() as $row2) 
                  {?>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?=$row2->nama?></label>
                        <div class="col-md-2">
                            <select name="<?=$row2->id?>" class="form-control select" style="width: 150px">
                                <?php
                                        $opt= array('0' => 'NOT ACCESS', '1' => 'ACCESS') ;

                                       foreach ($opt as $i => $value) {
                                          echo "<option value=\"$i\"";
                                          if (aksesnya($query['username'],$row2->id) == $i) 
                                          {
                                            echo "selected" ; 
                                          }
                                          echo ">$opt[$i]</option>" ;
                                        }

                                  ?>
                            </select>
                        </div>
                    </div>   


                  <?php } ?>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-9">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
                        <a href="<?=site_url('Setinguser');?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-angle-double-left"></i> BACK</a>
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

