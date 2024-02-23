
    
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

                  

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?=site_url('Dashboard');?>">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                         <div class="col-md-3">                        
                            <a href="ui-widgets.html#" class="tile tile-success tile-valign"><?=get_disk_free("/");?>Gb
                                <div class="informer informer-default dir-tr"><span class="fa fa-cloud"></span></div><BR>
                                <div class="informer informer-default dir-bl">Free Disk Space</div>
                            </a>                                                    
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
                       
                    <!-- END WIDGETS -->                    
                    
                    <div class="row">
                       <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                       
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
                                               
                                            </thead>

                                            <tbody>
                                               
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>

                    </div>
                    
                    <div class="row">
                      
                    </div>
                    
                   
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->   
