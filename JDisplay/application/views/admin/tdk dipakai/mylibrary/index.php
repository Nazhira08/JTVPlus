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
                    <li class="active">My Library</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">   
                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-stack-overflow"></span> Library  </h2>
                            <BR>
                            <span class="label label-info label-form">Untuk mendownload File Video Klik Video dan pilih download</span>
                        </div>                                                         
                    </div>
                    
                    <!-- START CONTENT FRAME RIGHT -->
                    <div class="content-frame-right">                                           
                        <h4>Groups By TV:</h4>
                        <div class="list-group border-bottom push-down-20">
                             <a href="#" class="list-group-item active">ALL<span class="badge badge-primary"><?=$jum_ALL;?></span></a>
                             <?php $no=0; foreach ($TV->result() as $row) { $no++ ?>
                             <a href="<?php site_url('Mylibrary')?>?TVnya=<?php echo $row->TVnya; ?>" class="list-group-item"><?= $row->TVnya;?> <span class="badge badge-success"><?= $row->jumlahnya;?></span></a>
                             <?php }?>
                        </div>                                                
                    </div>
                    <!-- END CONTENT FRAME RIGHT -->
                
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body content-frame-body-left">
                        <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
                        <div class="pull-left push-up-10">
                                    <div class="form-group">
                                        <div class="col-md-6">                                        
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                                <input type="text" name="search" value="<?=$search?>" class="form-control" placeholder="Default"/>
                                                 
                                            </div>
                                        </div>
                                        <div class="col-md-2"> 
                                        <button type="submit" class="btn btn-primary">Search </button>
                                        </div>
                                    </div>   
                        </div>
                         </form>
                        <div class="gallery" id="links">
                             
                            <?php $no=0; foreach ($query->result() as $row) { $no++ ?> 
                             <?php $download=site_url('Mylibrary/Download?urutan=').$row->urutan; ?>
                            <a href="#myModal" class="gallery-item" data-urutan="<?=$row->urutan?>" role="button" data-toggle="modal" onclick="set_url('<?=base_url().$row->preview; ?>'); set_url2('<?=$row->urutan; ?>'); set_url3('<?=$download ?>')")>
                                <div class="image">                              
                                    <img src="<?php echo $row->thumbnail; ?>" alt="Nature Image 1"/>                                        
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <?php if(strlen($row->Judul)>25) { ?>
                                    <strong><?php echo ucfirst(strtolower(substr($row->Judul, 0, 30))).'...'; ?></strong>
                                    <?php }
                                    else
                                        {
                                            ?>
                                     <strong><?php echo ucfirst(strtolower( $row->Judul)); ?></strong> <BR>      
                                    <?php }?>
                                    <span><?php echo cari_database('users','username',$row->username,'display_name')?> - <?php echo cari_database('users','username',$row->username,'TV')?></span>
                                    <span><?php echo $row->tanggal.' '.$row->jam ;?></span>
                                </div>                                
                            </a>
                            <?php } ?>
                                                     
                             
                        </div>
                             
                        <ul class="pagination pagination-sm pull-right push-down-20 push-up-20">
                            <?php if($pos>0) { ?>
                            <li><a href="<?php site_url('Mylibrary')?>?search=<?php echo $search; ?>&TVnya=<?php echo $TVnya; ?>&pos=<?php echo $pos; ?>">«</a></li>
                            <?php } ?>
                            
                            <?php for($i=1;$i<=$jum_query;$i++) { ?> 
                            <li <?php if($i==$pos+1) echo 'class="active"'; ?>><a href="<?php site_url('Mylibrary')?>?search=<?php echo $search; ?>&TVnya=<?php echo $TVnya; ?>&pos=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php }?>
                            <!--<li><a href="pages-gallery.html#">2</a></li>
                            <li><a href="pages-gallery.html#">3</a></li>
                            <li><a href="pages-gallery.html#">4</a></li> -->     
                            <?php if(($pos+2)<=$jum_query) { ?>                              
                            <li><a href="<?php site_url('Mylibrary')?>?search=<?php echo $search; ?>&TVnya=<?php echo $TVnya; ?>&pos=<?php echo $pos+2; ?>">»</a></li>
                             <?php }?>
                        </ul>
                    </div>       
                    <!-- END CONTENT FRAME BODY -->
                </div>               
                <!-- END CONTENT FRAME -->
                                
                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- BLUEIMP GALLERY -->

  

         <div class="message-box message-box-info animated fadeIn" id="myModal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-footer"><a href=<?php site_url('Mylibrary')?>?search=<?php echo $search; ?>&TVnya=<?php echo $TVnya; ?>&pos=<?php echo $pos+1; ?> class="btn btn-warning"  id="btn-yes" ><span class="fa fa-times-circle"></span> &nbsp;&nbsp;Close</a> <a href="" class="btn btn-danger"  id="btn-download" ><span class="fa fa-download"></span> &nbsp;&nbsp;Download File</a></div>
                    <div class="mb-content">
                        <div class="row">                   
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><span class="fa fa-film"></span>&nbsp;&nbsp;Video Preview</h3>                               
                                        </div>
                                        <div class="panel-body">
                                            <video width="100%" controls id="video-movie">
                                                <source src="movie.mp4" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                            </video>           
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-7">                                
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><span class="fa fa-stack-overflow"></span>&nbsp;&nbsp;Berita</h3>                               
                                        </div>
                                        <div class="panel-body">
                                            <textarea class="summernote" id="textid"> <div id="hasil-output"></div></textarea>
                                                                    
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- END BLUEIMP GALLERY -->
         <script>
     function set_url(url) {
                $('#video-movie').attr('src',url);
                //$('#btn-yes').attr('href',url);
             }
             //ajax untuk menampilkan data isi berita
             function set_url3(url) {
                 $('#btn-download').attr('href',url);
             }
             function set_url2(url) {
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
                xmlhttp.open("GET","<?=site_url('Mylibrary/berita?urutan=');?>" + JsVar,true);   // ini untuk di pass ke script php nya
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