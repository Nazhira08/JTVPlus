<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">
.message-box{
    display:none;
    position:fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.5);
    z-index:9999
}
.message-box.open{
    display:block
}
.message-box .mb-container{
    position:absolute;
    left:0;
 /*   top:5%; */
    position:fixed;
    top: calc(150px);
    background:rgba(0,0,0,.9);
 /*    padding:20px; */
    width:100%
}
.message-box .mb-container .mb-middle{
    width:100%;
    left:2%;
    position:relative;
    color:#FFF
}
.message-box .mb-container .mb-middle .mb-title{
    width:100%;
    float:left;
    padding:10px 0 0;
    font-size:31px;
    font-weight:400;
    line-height:36px
}
.message-box .mb-container .mb-middle .mb-title .fa,.message-box .mb-container .mb-middle .mb-title .glyphicon{
    font-size:38px;
    float:left;
    margin-right:10px
}
.message-box .mb-container .mb-middle .mb-content{
    width:100%;
    float:left;
    padding:10px 0 0
}
.message-box .mb-container .mb-middle .mb-content p{
    margin-bottom:0
}
.message-box .mb-container .mb-middle .mb-footer{
    width:100%;
    float:left;
    padding:10px 0
}
.message-box.message-box-warning .mb-container{
    background:rgba(254,162,35,.9)
}
.message-box.message-box-danger .mb-container{
    background:rgba(182,70,69,.9)
}
.message-box.message-box-info .mb-container{
    background:rgba(63,186,228,.9)
}
.message-box.message-box-success .mb-container{
    background:rgba(149,183,93,.9)
}
</style>


 <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="<?=site_url('dashboard');?>">Home</a></li>
                    <li class="active">SO</li>
                </ul>
                <!-- END BREADCRUMB -->                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">                                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-inbox"></span> SO / MO <small>[<?=$jum_all-$jum_terbaca?> data]</small></h2>
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
                            <div class="panel-body mail">
                                <?php $no=0; foreach ($query->result() as $row) { $no++ ?>
                                 <?php if($read=="0") {?><div class="mail-item mail-unread mail-success"> <?php } elseif($read=="1") {?><div class="mail-item mail-read mail-success"> <?php } ?>   <!-- mail-item mail-unread mail-success -->                                
                                    <div class="mail-star">
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <div class="mail-user"><?=cari_karyawan($row->user_input,"Nama")?></div>                                    
                                    <a href="<?=site_url('editor').'/lihat_data?id='.$row->id.'&read='.$read;?>" class="mail-text"><?=$row->no_so;?></a>                                    
                                    <div class="mail-date"><?=$row->tgl_input;?></div>
                                </div>
                                <?php } ?>                              
                                
                            </div>
                            <div class="panel-footer">                                
                                                            
                                
                                <ul class="pagination pagination-sm pull-right">
                                    <li <?php if($pos==0) {?>class="disabled" <?php }?>><?php if($pos==0) {?><a href="#"><?php } else {?><a href="<?=site_url('editor')?>/read?pos=<?=($pos)?>"> <?php }?>«</a></li>
                                    <?php $no=0; for ($i=0;$i<=$jum_query;$i++) { $no++ ?>
                                        <li <?php if($i==$pos) {?>class="active" <?php } ?>><a href="<?=site_url('editor')?>/read?pos=<?=($i+1)?>"><?=$no?></a></li>
                                    <?php } ?>
                                    <!--<li><a href="pages-mailbox-inbox.html#">2</a></li>
                                    <li><a href="pages-mailbox-inbox.html#">3</a></li>
                                    <li><a href="pages-mailbox-inbox.html#">4</a></li> -->                                   
                                    <li><a href="pages-mailbox-inbox.html#">»</a></li> 
                                </ul>
                            </div>                            
                        </div>
                        
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                </div>
                <!-- END CONTENT FRAME -->

         <script>
     function set_url(url) {
                $('#video-movie').attr('src',url);
                //$('#btn-yes').attr('href',url);
             }
             //ajax untuk menampilkan data isi berita
             function set_url2(url) {
                $('#urutan').attr('value',url);
                var hasil = document.getElementById("hasil-output");    
                var xmlhttp = false;

                try {
                 xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                 try {
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                 } catch (E) {
                  xmlhttp = false;
                 }
                }
                if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                 xmlhttp = new XMLHttpRequest();
                }
                var JsVar = url;   //urutan berita
                xmlhttp.open("GET","<?=site_url('Libraryberita/berita?urutan=');?>" + JsVar,true);   // ini untuk di pass ke script php nya
                 xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {   
                   hasil.innerHTML ='<font style="color:#000000">'+xmlhttp.responseText+'</font>'; 
                  }
                 } 
                 xmlhttp.send(null);
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