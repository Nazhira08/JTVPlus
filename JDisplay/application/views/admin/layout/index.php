<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>JMMC-JTV MONITORING MANAJEMENT CENTER</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?= base_url();?>assets/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme"  href="<?= base_url();?>assets/css/theme-default.css"/>             
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
           <?php $this->load->view('admin/layout/sidebar');?>
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <?php $this->load->view('admin/layout/topheader');?>
                   
               <?php $this->load->view($konten); ?>

            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?=site_url('index.php/logout');?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
       
        

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= base_url();?>assets/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?= base_url();?>assets/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?= base_url();?>assets/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?= base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?= base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='<?= base_url();?>assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/owl/owl.carousel.min.js"></script>                         
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="<?= base_url();?>assets/js/settings.js"></script> -->
        
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins.js"></script>        
        <script type="text/javascript" src="<?= base_url();?>assets/js/actions.js"></script>
        
        <script type="text/javascript" src="<?= base_url();?>assets/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script> 

        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap/bootstrap-datepicker.js"></script>

        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/filetree/jqueryFileTree.js"></script> 

        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/knob/jquery.knob.min.js"></script>
 
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/blueimp/blueimp-gallery-video"></script>
           
        
        <script type='text/javascript' src="<?= base_url();?>assets/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script type='text/javascript' src="<?= base_url();?>assets/js/plugins/codemirror/mode/xml/xml.js"></script>
        <script type='text/javascript' src="<?= base_url();?>assets/js/plugins/codemirror/mode/javascript/javascript.js"></script>
        <script type='text/javascript' src="<?= base_url();?>assets/js/plugins/codemirror/mode/css/css.js"></script>
        <script type='text/javascript' src="<?= base_url();?>assets/js/plugins/codemirror/mode/clike/clike.js"></script>
        <script type='text/javascript' src="<?= base_url();?>assets/js/plugins/codemirror/mode/php/php.js"></script>    

        <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/summernote/summernote.js"></script>
        <!-- END PAGE PLUGINS --> 


        <script type="text/javascript">
    function validateFileType(){
        var file_pendukung = document.getElementById("file_pendukung").value;
        var idxDot = file_pendukung.lastIndexOf(".") + 1;
        var extFile = file_pendukung.substr(idxDot, file_pendukung.length).toLowerCase();
        if (extFile=="jpg" ){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            document.getElementById("file_pendukung").value="";
        }   
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
            editor.setSize('100%','420px');

     
        </script>  
        
    </body>
</html>





