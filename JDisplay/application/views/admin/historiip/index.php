<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <ul class="breadcrumb">
        <li class="active">Whitelist IP</li>
  </ul>
   <div class="row">
    <div class="col-md-12">
      <div class="page-title">                    
          <h2><span class="fa fa-files-o"></span> Histori Komputer</h2>
      </div>
      <?=$alert;?> 
                    <div class="row">
                        <div class="col-md-3">

                            <div class="widget widget-warning widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">Jumlah User Aktif</div>                                                                        
                                        <div class="widget-subtitle">27/08/2014 15:23</div>
                                        <div class="widget-int"><?=$jum_user_aktif?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Login Success Today</div>
                                        <div class="widget-subtitle">Visitors</div>
                                        <div class="widget-int"><?=jumlah_success_login(date('Y-m-d'));?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Total Failled</div>
                                        <div class="widget-subtitle">Visitors</div>
                                        <div class="widget-int"><?=$total_failled?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Login Failled Today</div>
                                        <div class="widget-subtitle">Visitors</div>
                                        <div class="widget-int"><?=jumlah_failled_login(date('Y-m-d'));?></div>
                                    </div>
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>

                        </div>
                         <div class="col-md-3">

                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                </div>                                                      
                            </div>                        

                        </div>
                        <div class="col-md-3">

                            <div class="widget widget-info widget-padding-sm">                            
                                <div class="widget-item-left">
                                    <input class="knob" data-width="100" data-height="100" data-min="0" data-max="100" data-displayInput=false data-bgColor="#d6f4ff" data-fgColor="#FFF" value="<?=100-get_server_memory_usage();?>%" data-readOnly="true" data-thickness=".2"/>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-big-int"><span class="num-count"><?=100-get_server_memory_usage();?></span>%</div>
                                    <div class="widget-title">Memory</div>
                                    <div class="widget-subtitle">Total free space</div>                                
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                        

                        </div>
                         <div class="col-md-3">                        
                            <a href="ui-widgets.html#" class="tile tile-success tile-valign"><?=get_disk_free("/");?>Gb
                                <div class="informer informer-default dir-tr"><span class="fa fa-cloud"></span></div><BR>
                                <div class="informer informer-default dir-bl">Free Disk Space</div>
                            </a>                                                    
                        </div>

      <div class="panel panel-default">
          <div class="panel-heading">    
           <h4 class="panel-title">Data Histori IP</h4>
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
                <th>IP</th>
                <th>Tanggal</th>
                <th>Failled</th>
                <th>Success</th>
                <th>Blok</th>
                <th style="width:130px;">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->ip; ?></td>
                <td><?php echo $row->tanggal; ?> </td>
                <td><?php echo jumlah_success_login_ip($row->ip); ?> </td> 
                <td><?php echo jumlah_failled_login_ip($row->ip); ?> </td> 
                <td><?php if(apa_blok_ip($row->ip)==1) echo"<span class=\"label label-danger label-form\">Blok</span>"; else echo"<span class=\"label label-success label-form\">Open</span>"; ?> </td> 
                <td>
                    <div class="btn-group">
                        <a href="<?=site_url('historiip?ip='.$row->ip);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="View"><i class="fa fa-tasks"></i></a>
                        <?php 
                        if(apa_whitelist_ip($row->ip)==0)
                        {
                        ?>
                        <a href="<?=site_url('historiip?blok='.$row->ip);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Block IP"><i class="fa fa-lock"></i></a>
                        <?php  }
                        ?>

                        <?php 
                        if(apa_whitelist_ip($row->ip)==0)
                        {
                        ?>
                        <a href="<?=site_url('historiip?whitelist='.$row->ip);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Whitelist IP"><i class="fa fa-thumbs-o-up"></i></a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <button type="button" class="btn btn-default" disabled="disabled"><i class="fa fa-lock"></i></button>
                        <a href="<?=site_url('historiip?whitelistdelete='.$row->ip);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Delete Whitelist IP"><i class="fa fa-thumbs-o-down"></i></a>
                        <?php
                        }?>
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

      <?php if(strlen($ip)>0)
      { ?>
              <?php
              if($ipwhitelist==0 && $blok==1)
                {?>
                                  <div class="col-md-3">

                                        <div class="widget widget-danger widget-item-icon">
                                            <div class="widget-item-left">
                                                <span class="fa fa-minus-circle"></span>
                                            </div>
                                            <div class="widget-data">
                                                <div class="widget-int num-count">BLOK</div>
                                                <div class="widget-title">IP Terblok</div>
                                                <div class="widget-subtitle">Mulai</div>
                                            </div>
                                            <div class="widget-controls">                                
                                                <a href="ui-widgets.html#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                            </div>                            
                                        </div>

                                    </div>
              <?php
              }
              elseif($ipwhitelist==1)
                {?>
                                    <div class="col-md-3">

                                        <div class="widget widget-success widget-item-icon">
                                            <div class="widget-item-left">
                                                <span class="fa fa-thumbs-o-up"></span>
                                            </div>
                                            <div class="widget-data">
                                                <div class="widget-int num-count">OK</div>
                                                <div class="widget-title">IP Whitelist</div>
                                                <div class="widget-subtitle">IP ini sdh terverivikasi</div>
                                            </div>
                                            <div class="widget-controls">                                
                                                <a href="ui-widgets.html#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                            </div>                            
                                        </div>

                                    </div>
             

              <?php 
              }
              else
                {?>
                                    <div class="col-md-3">

                                        <div class="widget widget-success widget-item-icon">
                                            <div class="widget-item-left">
                                                <span class="fa fa-thumbs-o-up"></span>
                                            </div>
                                            <div class="widget-data">
                                                <div class="widget-int num-count">OPEN</div>
                                                <div class="widget-title"><span class="label label-info label-form">IP Terdetect aman</span></div>
                                                <div class="widget-subtitle"><span class="label label-danger label-form">Tapi tetap Check data IP </span></div>
                                            </div>
                                            <div class="widget-controls">                                
                                                <a href="ui-widgets.html#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                            </div>                            
                                        </div>

                                    </div>
             

              <?php 
              }?>?>
            <div class="panel panel-default">
                      <div class="panel-heading">    
                       <h4 class="panel-title">Data Status</h4>
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
                            <th>User</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach ($query_user_masuk->result() as $row) { $no++ ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->usernya; ?></td>
                            <td><?php echo $row->tanggal; ?> </td>
                            <td><?php echo $row->status; ?> </td>   
                        </tr>
                        <?php } ?>
                        </tbody>
                        
                      </table>
                   </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

  <?php  } ?>
   <?php if(strlen($ip_blok)>0)
      { ?>
  <div class="panel panel-default">           
    <div class="row">
      <div class="col-xs-12">
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
                     <div class="form-group">
                        <H3><label class="col-md-4 control-label">INSERT DATA BLOK</label></H3>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">IP</label>
                        <div class="col-md-2">
                             <input  type="hidden" class="form-control" name="jenis" value="ip_blok">
                            <input  required autofocus placeholder="ip" readonly="yes" type="text" class="form-control" name="ip" value="<?=$ip_blok?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alasan</label>
                        <div class="col-md-7">
                            <input required autofocus placeholder="alasan" type="text" class="form-control" name="alasan" value="<?=$query_data['alasan']?>">
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
                                          if ($query_data['open']== $i) 
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
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-save"></i> &nbsp;&nbsp;<?=$tombol;?></button>
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
    <?php  } ?>

<?php if(strlen($ip_whitelist)>0)
      { ?>
  <div class="panel panel-default">           
    <div class="row">
      <div class="col-xs-12">
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
                     <div class="form-group">
                        <H3><label class="col-md-4 control-label">INSERT DATA WHITELIST</label></H3>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">IP</label>
                        <div class="col-md-2">
                             <input  type="hidden" class="form-control" name="jenis" value="ip_whitelist">
                            <input  required autofocus placeholder="ip" readonly="yes" type="text" class="form-control" name="ip" value="<?=$ip_whitelist?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alasan</label>
                        <div class="col-md-7">
                            <input required autofocus placeholder="alasan" type="text" class="form-control" name="alasan" value="">
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-7">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-save"></i> &nbsp;&nbsp;<?=$tombol;?></button>
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
    <?php  } ?>

    <?php if(strlen($ip_delete_whitelist)>0)
      { ?>
  <div class="panel panel-default">           
    <div class="row">
      <div class="col-xs-12">
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
            <div class="block">
                     <div class="form-group">
                        <H3><label class="col-md-4 control-label">DELETE DATA WHITELIST</label></H3>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">IP</label>
                        <div class="col-md-2">
                             <input  type="hidden" class="form-control" name="jenis" value="delete_ip_whitelist">
                            <input  required autofocus placeholder="ip" readonly="yes" type="text" class="form-control" name="ip" value="<?=$ip_delete_whitelist?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Alasan</label>
                        <div class="col-md-7">
                            <input required autofocus placeholder="alasan" type="text" class="form-control" name="alasan" value="<?=$blok['alasan']?>">
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-7">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-save"></i> &nbsp;&nbsp;<?=$tombol;?></button>
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
    <?php  } ?>


</div>
</div>
</div>

