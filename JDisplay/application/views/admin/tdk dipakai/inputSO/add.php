<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <ul class="breadcrumb">
                    <li><a href=<?=site_url('kirimberita');?>>Home</a></li>
                    <li class="active">Kirim berita</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Berita</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="block">
                                <h4>Judul Berita</h4>
                                <input required autofocus placeholder="alasan" type="text" class="form-control" name="alasan" value="">
                            </div>

                            <div class="block">
                                <h4>Berita</h4>

                                    <p>Isikan berita lengkap anda.</p>
                                <textarea class="summernote"></textarea>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Attachment Video Berita</h3>                               
                                </div>
                                <!-- PAGE CONTENT WRAPPER -->
                                <div class="page-content-wrap">
                                
                                    <a href="index.html#" class="mb-control btn btn-success" data-box="#mb-video"><span class="fa fa-sign-out"></span></a>   
                                    
                                </div>

                            </div>

                        </div>                   
                    </div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>

         <div class="message-box message-box-success animated fadeIn" id="mb-video">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> Tambah File Video</div>
                    <div class="mb-content">
                        <p><iframe src="<?php echo base_url()."assets/Ftp"; ?>" scrolling="auto" width="700px" height="300px" frameborder="0"></iframe></p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>