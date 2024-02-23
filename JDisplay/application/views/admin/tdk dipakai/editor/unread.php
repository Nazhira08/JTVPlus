<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">

/*modal fullscreen */


</style>


 <!-- START BREADCRUMB -->
                 <ul class="breadcrumb push-down-0">
                    <li><a href="<?=site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?=site_url('editor');?>">Editor</a></li>
                    <li class="active">SO</li>
                </ul>
                <!-- END BREADCRUMB -->                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">                                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-inbox"></span> SO / MO <small> [<?=$jum_all-$jum_terbaca?> data]</small></h2>
                        </div>                                                                                
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <div class="block">
                            <div class="list-group border-bottom">
                                <a href="<?=site_url('editor');?>" <?php if($read=="0") {?> class="list-group-item active" <?php } elseif($read=="1") { ?> class="list-group-item " <?php } ?> ><span class="fa fa-inbox"></span> Belum terbaca <?php if($read=="0") {?><span class="badge badge-success"><?php } elseif($read=="1") {?> <span class="badge badge-warning"> <?php } ?><?=$jum_all-$jum_terbaca?></span></a>
                                <a href="<?=site_url('editor/read');?>" <?php if($read=="1") {?> class="list-group-item active" <?php } elseif($read=="0") { ?> class="list-group-item" <?php } ?> ><span class="fa fa-inbox"></span> Terbaca <?php if($read=="0") {?><span class="badge badge-success"><?php } elseif($read=="1") {?> <span class="badge badge-warning"> <?php } ?><?=$jum_terbaca?></span></a>                            
                            </div>                        
                        </div>
                    </div>
                    <!-- END CONTENT FRAME LEFT -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h3 class="panel-title"><?=$query['no_so']?></h3>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-default"><span class="fa fa-mail-reply"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-warning"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>                                    
                                </div>
                            </div>
                            <div class="panel-body">
                                <h3>Dari : <?=cari_karyawan($query['user_input'],'Nama')?> <small class="pull-right text-muted"><span class="fa fa-clock-o"></span> <?=$query['tgl_input']?></small></h3>
                                <p>Hello <?=cari_karyawan($this->session->userdata('username'),'Nama')?>,</p>
                                <h6>Generate Code</h6>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th width="50">Kode</th><th>Title/Noted</th><th>Tanggal Input</th><th style="width:60px;">&nbsp;</th>
                                    </tr>
                                     <?php $no=0; foreach ($generatecode->result() as $row) { $no++ ?>
                                    <tr>
                                        <td><span <?php if(($no % 2)==0) {?> class="label label-success" <?php } else {?> class="label label-danger" <?php }?> ><?=$row->kode?></span></td><td><a href="pages-mailbox-message.html#"><?=$row->title?></a> <BR>
                                        <?=$row->note?>
                                        </td>
                                        <td><?=$row->tanggal?></td><td><div class="btn-group">
                        <a href="<?=site_url('inputSO/tambah?edit='.$row->id);?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Cek finis video"><i class="fa fa-film"></i></a>
                    </div></td>
                                    </tr>
                                    <?php } ?>                                  
                                </table>
                            </div>
                            <div class="panel-body panel-body-table">
                                <h6>Attachments</h6>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th width="50">type</th><th>name</th><th width="100">size</th>
                                    </tr>
                                     <?php $no=0; foreach ($attachment->result() as $row) { $no++ ?>
                                    <tr>
                                        <td><span <?php if($row->extension=="pdf") {?> class="label label-primary" <?php } else {?> class="label label-success" <?php }?> ><?=$row->extension?></span></td>
                                        <?php if($row->extension=="pdf") {?>
                                        <td>
                                        <a href="#myModal" class="trash list-group-item" data-id="<?=$row->id?>" role="button" data-toggle="modal"  data-target="#viewModalacc"  onclick="set_url('<?= base_url(); ?>assets/so/<?=substr($row->path,strlen($row->path)-11,11)?><?=$row->uid?>/<?=$row->nama?>')"><?=$row->nama?></a>
                                        
                                        </td><td><?=fsize($row->besar)?></td>
                                        <?php } elseif($row->extension=="jpg") {?>
                                        <td>
                                        <a href="#myModal" class="trash list-group-item" data-id="<?=$row->id?>" role="button" data-toggle="modal"  data-target="#viewModalacc2"  onclick="set_url2('<?= base_url(); ?>assets/so/<?=substr($row->path,strlen($row->path)-11,11)?><?=$row->uid?>/<?=$row->nama?>')"><?=$row->nama?></a>
                                        </td><td><?=fsize($row->besar)?></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>                                  
                                </table>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-success pull-right"><span class="fa fa-mail-reply"></span> Post Reply</button>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                </div>
                <!-- END CONTENT FRAME -->                    
            </div>            
            <!-- END PAGE CONTENT -->
        <!-- BLUEIMP GALLERY -->

  


        <div class="modal fade" id="viewModalacc" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:80%;height:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="memberModalLabel">SOP JTV</h4>
                    </div>
                    <div class="dash">
                         <object id="datapdf" data="" type="application/pdf" width="100%" height="500px"> 
                                                          <p>It appears you don't have a PDF plugin for this browser.
                                                           No biggie... you can click here to
                                                          download the PDF file.</p>  
                         </object> 
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="viewModalacc2" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:80%;height:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="memberModalLabel">SOP JTV</h4>
                    </div>
                    <div class="dash">
                         <img id="datajpg" src="" alt="Smiley face" height="500px" width="100%">
                    </div>

                </div>
            </div>
        </div>

        <!-- END BLUEIMP GALLERY -->
         <script>
            function set_url(url) {
                $('#datapdf').attr('data',url);
                //$('#btn-yes').attr('href',url);
             }
            function set_url2(url) {
                $('#datajpg').attr('src',url);
                //$('#btn-yes').attr('href',url);
             }
             
    </script>
   <script>
            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                enterMode: "keep",
                tabMode: "shift"                                                
            });
            editor.setSize('300%','420px');

     
        </script>  

<script>    
            //$('.summernote').summernote('disable');   
             //$('#quote').summernote('disable');     
           
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement;

                var link = target.src ? target.parentNode : target;
                var options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }};
                var links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
        </script>  