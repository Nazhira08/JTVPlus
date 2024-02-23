
    <!-- Wrap all page content here -->

    
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

                  

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.html#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">

                            <div class="widget widget-warning widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">Total Kiriman</div>                                                                        
                                        <div class="widget-subtitle">Berita hari ini</div>
                                        <div class="widget-int"><?=$kiriman_hari_ini?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Kiriman Saya</div>
                                        <div class="widget-subtitle">Hari ini</div>
                                        <div class="widget-int"><?=$kiriman_saya_hari_ini;?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Total Login</div>
                                        <div class="widget-subtitle">Hari ini</div>
                                        <div class="widget-int"><?=jumlah_success_login('Y-m-d')?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Login Gagal </div>
                                        <div class="widget-subtitle">Hari ini</div>
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
                                <div class="widget-item-left"><BR>
                                    <span class="fa fa-cloud-upload"></span> 
                                </div>
                                <div class="widget-data">
                                    <div class="widget-big-int"><span class="num-count"><?=$jum_video_saya;?></span></div>
                                    <div class="widget-title">Video</div>
                                    <div class="widget-subtitle">Kiriman Saya hari ini</div>                                
                                </div>                             
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                        

                        </div>
                         <div class="col-md-3">

                            <div class="widget widget-warning widget-padding-sm">                            
                                <div class="widget-item-left"><BR>
                                   <span class="fa fa-cloud-download"></span> 
                                </div>
                                <?php if($jum_video_saya>=2)
                                {?>
                                <div class="widget-data">
                                    <div class="widget-big-int"><span class="num-count"></span></div>
                                    <div class="widget-title">Silahkan Ambil</div>
                                    <div class="widget-subtitle">Video Hari ini</div>                                
                                </div>     
                                <?php }
                                else
                                {?>
                               <div class="widget-data">
                                    <div class="widget-big-int"><span class="num-count">- <?=2-$jum_video_saya;?></span></div>
                                    <div class="widget-title">Video</div>
                                    <div class="widget-subtitle">Kurang untuk mengakses video hari ini</div>                                
                                </div>     
                                <?php } ?> 
                                                       
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                        

                        </div>
                    <!-- END WIDGETS -->                    
                    
                    <div class="row">
                       <div class="col-md-4">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-cloud-upload"></i>  Kiriman berita saya</h3>
                                        <span>6 kiriman terakhir</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top" title="Refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Date</th>
                                                    <th width="50%">File</th>
                                                    <th width="20%">Video</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no=0; foreach ($upload_data->result() as $row) { $no++ ?>
                                                <tr>
                                                    <td><strong><?=$row->tanggal?></strong></td>
                                                    <td><?=$row->Judul?></td>
                                                    <td><span class="label label-success">
                                                        <i class="glyphicon glyphicon-film"></i> <?=jml_video($row->No_berita); ?> Buah
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-cloud-download"></i>  Ambil data Video</h3>
                                        <span>6 pilihan video terakhir</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top" title="Refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Date</th>
                                                    <th width="50%">File</th>
                                                    <th width="20%">Video</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no=0; foreach ($download_data->result() as $row) { $no++ ?>
                                                <tr>
                                                    <td><strong><?=$row->tanggal?></strong></td>
                                                    <td><?=$row->Judul?></td>
                                                    <td><span class="label label-success">
                                                        <i class="glyphicon glyphicon-film"></i> <?=jml_video($row->No_berita); ?> Buah
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-cloud"></i> Video Terbaru</h3>
                                        <span>4 video terbaru</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="index.html#" class="panel-refresh" data-toggle="tooltip" data-placement="top" title="Refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="index.html#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="index.html#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Date</th>
                                                    <th width="50%">File</th>
                                                    <th width="20%">From</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no=0; foreach ($newfile_data->result() as $row) { $no++ ?>
                                                <tr>
                                                    <td><strong><?=$row->tgl_selesai?></strong></td>
                                                    <td><?=$row->Judul?></td>
                                                    <td><span class="label label-success">
                                                        <i class="fa fa-user"></i> <?=$row->username; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>

                    </div>
                    </div>
                    
                    <div class="row">
                      
                    </div>
                    
                   
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->   