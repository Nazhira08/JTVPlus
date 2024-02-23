<style type="text/css">
    .modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

</style>

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
                    <li><a href=<?=site_url('inputSO');?>>Home</a></li>
                    <li class="active">Input SO</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
                <div class="page-title">               
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Input SO  &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-lg" name="kirim" value="finish">&nbsp;&nbsp;<i class="fa fa-check-square"></i> FINISH<BR></h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="block">
                                    <div class="col-md-12">
                                    <h4>No SO</h4>
                                    </div>
                                    <div class="col-md-9">
                                    <input required autofocus placeholder="No SO" type="text" readonly="yes" class="form-control" name="judul" value="<?=$query['no_so']?>">
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#myModal" class="trash list-group-item" data-id="" role="button" data-toggle="modal"  data-target="#viewModalacc2"  onclick=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                             </div>
                        </div>

                        <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">HAK AKSES SO</h3>                               
                                    </div>
                                    <!-- PAGE CONTENT WRAPPER -->
                                    <div class="page-content-wrap">
                                        <div class="col-md-2">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" name="Editor" <?php if($query['editor']=="1") echo "checked"; ?> /> Editor</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" name="Promo" <?php if($query['promo']=="1") echo "checked"; ?>/> Promo</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" name="Library" <?php if($query['library']=="1") echo "checked"; ?>/> Library</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" name="Manager" <?php if($query['manager']=="1") echo "checked"; ?>/> Manager</label>
                                        </div>
                                        <div class="col-md-2">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" name="Direksi" <?php if($query['direksi']=="1") echo "checked"; ?>/> Direksi</label>
                                        </div>
                                    </div>

                                </div>
                            </div>    <!-- END CONTACTS HAK AKSES SO -->

                            <!-- END CONTACTS WITH CONTROLS -->
                            <div class="col-md-4">

                            <!-- CONTACTS WITH CONTROLS -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Attach File</h3>         
                                    </div>
                                    <div class="panel-body list-group list-group-contacts">                                
                                        <?php $no=0; foreach ($video->result() as $row) { $no++ ?>
 
                                                <a href="#myModal" class="trash list-group-item" data-id="<?=$row->uid?>" role="button" data-toggle="modal" onclick="set_url('<?=site_url('InputSO');?>/uploaddelete?uid=<?=$row->uid?>&id=<?php echo $row->id; ?>');">                              
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
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Generated Code</h3>  
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success bg-blue" data-original-title="Cek" data-toggle="modal"  data-target="#viewModalacc" onclick="set_id('');set_hide_delete();set_title('');set_note('')";><i class="fa fa-plus"></i></a>  
                                          &nbsp;&nbsp;&nbsp;<a class="btn btn-primary bg-blue" data-original-title="Cek" data-toggle="modal"  data-target="#viewModalacc3" onclick="set_id('');set_hide_delete();set_title('');set_note('')";><i class="fa fa-search"></i></a>
                                          &nbsp;&nbsp;&nbsp;<a class="btn btn-warning bg-blue" data-original-title="Cek" data-toggle="modal"  data-target="#viewModalacc4" onclick="set_id('');set_hide_delete();set_title('');set_note('')";><i class="fa fa-filter"></i></a>       
                                    </div>
                                    <div class="panel-body list-group list-group-contacts">                                
                                        <?php $no=0; foreach ($generated_code->result() as $row) { $no++ ?>
 
                                                <a href="#myModal" class="trash list-group-item" data-id="<?=$row->id?>" role="button" data-toggle="modal"  data-target="#viewModalacc"  onclick="set_id('<?=$row->id?>');set_tipe('<?=substr($row->kode,0,2)?>');set_delete();set_title('<?=$row->title?>');set_note('<?=$row->note?>'); ">                              
                                                <span class="contacts-title"><?php echo $row->kode; ?></span>
                                                <p><?php echo $row->title; ?></p>                                    
                                                <div class="list-group-controls">
                                                    <BR>
                                                    <button class="btn btn-info btn-sm"><span class="fa fa-pencil-square-o"></span></button>

                                                </div>                                    
                                            </a>                 
                                        <?php } ?>                                                                          
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Attachment SO</h3>                               
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
        <div class="modal fade" id="viewModalacc" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="memberModalLabel">GENERATED CODE</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
                                <div class="form-group">
                                    <input  id="id" type="hidden" class="form-control" name="id" value="">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Jenis</label>
                                    <div class="col-md-2">
                                        <select name="tipe" id="tipe">
                                          <option value="CM">Commercial</option>
                                          <option value="PR">Promo</option>
                                          <option value="PG">Prgram</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Title</label>
                                    <div class="col-md-8">
                                        <input  required autofocus placeholder="title" id="title" type="text" class="form-control" name="title" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Note</label>
                                    <div class="col-md-7">
                                        <textarea id="note" name="note" rows="8" cols="0" style="width: 100%"></textarea>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-offset-1 col-md-1">
                                    <button type="submit" id="submit" class="btn btn-success btn-sm btn-flat" name="kirim" value="simpan"><i class="fa fa-floppy-o"></i> SIMPAN</button> 
                                </div>
                                <div class="col-md-offset-1 col-md-1">
                                    <button type="submit" id="delete" class="btn btn-danger btn-sm btn-flat" name="kirim" value="delete" style="display:none;"><i class="fa fa-trash-o"></i> DELETE</button>
                                </div>
                                 <div class="col-md-offset-1 col-md-1">
                                    <button type="button" class="btn btn-warning btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                                </div>
                            </div>
                            <div class="form-group">
                                
                            </div>
                        </div>
        
                        </div>
                    </form>
                    </div>
                </div>
                <BR></BR>
                </div>
            </div>
        </div>

 <div class="modal fade" id="viewModalacc2" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="memberModalLabel">SO</h4>
                    </div>
                    <div class="row">
                        <div class="panel-body">
                          <table  class="table datatable">
                            <thead>
                            <tr>
                                <th style="width: 50px">NO</th>
                                <th>SO</th>
                                <th>Tanggal even</th>
                                <th>Prog</th>
                                <th style="width:80px;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach ($so->result() as $row) { $no++ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->CHMO; ?></td>
                                <td><?php echo $row->tgl_ent; ?> </td>
                                <td><?php echo $row->prog; ?> </td> 
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Gunakan SO ini"  onclick="set_SO('<?=$row->CHMO?>');""><i class="fa fa-pencil"></i></a>
                                    </div>
                                </td>          
                            </tr>
                            <?php } ?>
                            </tbody>
                            
                          </table>
                       </div>
                    </div>
                <BR></BR>
                </div>
            </div>
        </div>

 <div class="modal fade" id="viewModalacc3" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="memberModalLabel">Generated Code</h4>
                    </div>
                    <div class="row">
                        <div class="panel-body">
                          <table  class="table datatable">
                            <thead>
                            <tr>
                                <th style="width: 50px">NO</th>
                                <th>KODE</th>
                                <th>Title</th>
                                <th>Noted</th>
                                <th style="width:80px;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach ($generated_code2->result() as $row) { $no++ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->kode; ?></td>
                                <td><?php echo $row->title; ?> </td>
                                <td><?php echo $row->note; ?> </td> 
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm bg-teal" data-toggle="tooltip" data-original-title="Gunakan kode ini"  onclick="set_GC('<?=$row->id?>');""><i class="fa fa-pencil"></i></a>
                                    </div>
                                </td>          
                            </tr>
                            <?php } ?>
                            </tbody>
                            
                          </table>
                       </div>
                    </div>
                <BR></BR>
                </div>
            </div>
        </div>
        <div class="modal fade" id="viewModalacc4" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="memberModalLabel">GENERATED CODE LAMA</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>
                                <div class="form-group">
                                    <input  id="id" type="hidden" class="form-control" name="id" value="">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kode</label>
                                    <div class="col-md-3">
                                        <input  required autofocus placeholder="kode" id="kode" type="kode" class="form-control" name="kode" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Jenis</label>
                                    <div class="col-md-2">
                                        <select name="tipe" id="tipe">
                                          <option value="CM">Commercial</option>
                                          <option value="PR">Promo</option>
                                          <option value="PG">Prgram</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Title</label>
                                    <div class="col-md-8">
                                        <input  required autofocus placeholder="title" id="title" type="text" class="form-control" name="title" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Note</label>
                                    <div class="col-md-7">
                                        <textarea id="note" name="note" rows="8" cols="0" style="width: 100%"></textarea>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-offset-1 col-md-1">
                                    <button type="submit" id="submit" class="btn btn-success btn-sm btn-flat" name="kirim" value="simpan_lama"><i class="fa fa-floppy-o"></i> SIMPAN</button> 
                                </div>
                                 <div class="col-md-offset-1 col-md-1">
                                    <button type="button" class="btn btn-warning btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                                </div>
                            </div>
                            <div class="form-group">
                                
                            </div>
                        </div>
        
                        </div>
                    </form>
                    </div>
                </div>
                <BR></BR>
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
                endpoint: '<?= base_url();?>assets/fine-uploader/view/fine-uploader/endpoint.php?so_id='+<?=$_SESSION["so_id"]?>
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
                itemLimit: 2,
                //sizeLimit: 270000000,
                acceptFiles: 'image/*,application/pdf',
                allowedExtensions: ['jpeg', 'jpg', 'gif', 'png', 'pdf'],
                //acceptFiles: "jpeg/jpg",
                //allowedExtensions: ["jpg"],
            }
        });

        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
    </script>

 <script>
            
            function set_SO(url) {
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
                xmlhttp.open("GET","<?=site_url('inputSO/simpan_so?so=');?>" + JsVar,true);   // ini untuk di pass ke script php nya
                 xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {   
                  }
                 } 
                 xmlhttp.send(null);
             }
             function set_GC(url) {
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
                xmlhttp.open("GET","<?=site_url('inputSO/simpan_gc?gc=');?>" + JsVar,true);   // ini untuk di pass ke script php nya
                 xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {   
                  }
                 } 
                 xmlhttp.send(null);
             }
            function set_id(url) {
                $('#id').attr('value',url);
                
                //$('#btn-yes').attr('href',url);
             }
             function set_tipe(url) {
                $('#tipe').attr('value',url);
                
                //$('#btn-yes').attr('href',url);
             }
             function set_hide_delete() {
                document.getElementById("delete").style.display = "none";
                //$('#btn-yes').attr('href',url);
             }
             function set_delete() {
                document.getElementById("delete").style.display = "block";
                //$('#btn-yes').attr('href',url);
             }
              function set_note(url) {
                document.getElementById("note").value=url;
                //hasil.innerHTML =url;    
                //$('#title').attr('value',url);
                //$('#btn-yes').attr('href',url);
             }
             function set_title(url) {
                $('#title').attr('value',url);
                //$('#btn-yes').attr('href',url);
             }
    </script>