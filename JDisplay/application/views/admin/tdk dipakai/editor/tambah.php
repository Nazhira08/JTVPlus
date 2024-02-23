<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
    <link href="<?= base_url();?>assets/fine-uploader/fine-uploader-new.css" rel="stylesheet">

    <!-- Fine Uploader JS file
    ====================================================================== -->
    <script src="<?= base_url();?>assets/fine-uploader/fine-uploader.js"></script>

                                            <script type="text/template" id="qq-template-manual-trigger">
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button">
                    <div>Select files</div>
                </div>
                <button type="button" id="trigger-upload" class="btn btn-primary">
                    <i class="icon-upload icon-white"></i> Upload
                </button>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

    <style>
        #trigger-upload {
            color: white;
            background-color: #00ABC7;
            font-size: 14px;
            padding: 7px 20px;
            background-image: none;
        }

        #fine-uploader-manual-trigger .qq-upload-button {
            margin-right: 15px;
        }

        #fine-uploader-manual-trigger .buttons {
            width: 36%;
        }

        #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
            width: 60%;
        }
    </style>


    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
 <ul class="breadcrumb">
                    <li><a href=<?=site_url('kirimberita');?>>Home</a></li>
                    <li class="active">Kirim berita</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Berita  &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-lg" name="finish" value="1">&nbsp;&nbsp;<i class="fa fa-save"></i> <?=$tombol;?> Finish<BR> </button>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning btn-lg" name="finish" value="0">&nbsp;&nbsp;<i class="fa fa-save"></i> Save Sementara</button></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h4>Judul Berita</h4>
                                <input required autofocus placeholder="judul berita" type="text" class="form-control" name="judul" value="<?=$query['Judul']?>">
                            </div>

                            <div class="col-md-12">
                                <h4>Berita</h4>

                                    <p>Isikan berita lengkap anda.</p>
                                <textarea class="summernote" name="isi_berita">
                                    <?php if(strlen($query['Isi'])>0) echo $query['Isi'];
                                    else //default textarea
                                    { ?>
                                        <B>
                                        SLUG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;[isi slug]<BR> 
                                        JUDUL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;[isi judul]<BR>
                                        TANGGAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;[isi tanggal]<BR>
                                        PROGRAM&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;[isi program]<BR>
                                        DIKIRIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;[isi dikirim]<BR>
                                        </B>
                                        <BR>
                                        <H5><B>PRESENTER:</B></H5>
                                        [Isi untuk di baca presenter]
                                        <BR><H5><B>
                                        --------------------------------------------------PKG--------------------------------------------------</B></H5>
                                        [Isi untuk insert materi dan VO serta wawancara]
                                        <BR><BR>
                                        [Kontributor]
                                    <?php 
                                    }
                                    ?>
                                    
                                </textarea>
                            </div>
                            

                        </div>
                             <div class="col-md-4">

                            <!-- CONTACTS WITH CONTROLS -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Attach Video</h3>         
                                    </div>
                                    <div class="panel-body list-group list-group-contacts">                                
                                        <?php $no=0; foreach ($video->result() as $row) { $no++ ?>
 
                                                <a href="#myModal" class="trash list-group-item" data-id="<?=$row->uid?>" role="button" data-toggle="modal" onclick="set_url('<?=site_url('kirimberita');?>/uploaddelete?uid=<?=$row->uid?>&No_berita=<?php echo $row->No_berita; ?>');">                              
                                                <span class="contacts-title"><?php echo $row->nama; ?></span>
                                                <p><?php echo $row->uid; ?></p>                                    
                                                <div class="list-group-controls">
                                                    <BR>
                                                    <button class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span></button>

                                                </div>                                    
                                            </a>                 
                                        <?php } ?>                                                                          
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTACTS WITH CONTROLS -->
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Attachment Video Berita Baru</h3>                               
                                    </div>
                                    <!-- PAGE CONTENT WRAPPER -->
                                    <div class="page-content-wrap">
                                           <div id="fine-uploader-manual-trigger"></div>
                                    </div>

                                </div>
                             </div>   

                        </div>                   
                    </div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
         </form>
         <div class="message-box message-box-danger animated fadeIn" id="myModal" tabindex="-1" role="dialog">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-trash-o"></span>Delete Confirmation</div>
                    <div class="mb-content">
                        Apakah anda ingin menghapus video ini?
                            <br>Jika dihapus harus send ulang.</p>
                    </div>
                    <div class="mb-footer">
                       <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Cancel</button> <a href="#" class="btn btn-warning"  id="btn-yes" >Delete</a>
                    </div>
                </div>
            </div>
        </div>

    <script>
     function set_url(url) {
                $('#btn-yes').attr('href',url);
             }
    </script>
    <script>
        var manualUploader = new qq.FineUploader({
            element: document.getElementById('fine-uploader-manual-trigger'),
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: '<?= base_url();?>assets/fine-uploader/view/fine-uploader/endpoint.php?No_berita='+<?=$_SESSION["No_berita"]?>
            },
            deleteFile: {
                enabled: true,
                forceConfirm: true,
                endpoint: '<?= base_url();?>assets/fine-uploader/view/fine-uploader/endpoint.php'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '<?= base_url();?>assets/fine-uploader/placeholders/waiting-generic2.png',
                    notAvailablePath: '<?= base_url();?>assets/fine-uploader/placeholders/not_available-generic2.png'
                }
            },
            autoUpload: false,
            debug: true,
            validation: {
                itemLimit: 5,
                sizeLimit: 270000000,
                acceptFiles: "video/mp4, video/quicktime, video/flv, video/x-ms-wmv, video/jpg",
                allowedExtensions: ["mp4", "mov", "flv", "wmv", "jpg"],
            }
        });

        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
    </script>
