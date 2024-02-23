
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>JFTP News</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url();?>assets/css/theme-default.css"/>             
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container">
            <div class="col-md-12">
                
            </div>

           
             <div class="col-md-12">
                <div class="login-box">
                    <div class="login-logo"></div>
                    <div class="login-body">
                        <div class="login-title"><strong>Welcome</strong>, Please login</div>
                        <center>
                        <img id="loading" style="display:none;margin-bottom: 10px;" src="<?=base_url();?>assets/loading.gif">
                        <div id="success" class="alert alert-success alert-white rounded" style="display:none;">
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Login Sukses !</strong>
                        <br>Halaman akan dialihkan dalam waktu 3 detik!  -->
                        <br>Anda akan diarahkan otomatis ke <?=anchor(site_url('dashboard'), 'link');?>
                         </div>
                        <div id="failed" class="alert alert-warning alert-white rounded" style="display:none;">
                            <div class="icon"><i class="fa fa-warning"></i></div>
                            <strong>Peringatan !</strong>
                            <br>Nama akun dan/atau password tidak boleh kosong!
                        </div>
                        </center>
                        <form id="login" action="<?=$action;?>"  class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="username" placeholder="Username" id="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a href="frontpage" class="btn btn-link btn-block">Back To Index</a>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-info btn-block" id="btn-login">Log In</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <div class="pull-left">
                            &copy; 2019 JFTP.com
                        </div>
                       
                    </div>
                </div>
             </div>   
        </div>
    </body>
    <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/jquery/jquery.min.js"></script>
     <script type="text/javascript">

$(document).ready(function(){
    $("#btn-login").click(function(){
        var formAction = $("#login").attr('action');
        var datalogin = {
            username: $("#username").val(),
            password: $("#password").val()
        };

        if (!$("#username").val() || !$("#password").val()) {
            $("#warning").show('fast').delay(2000).hide('fast');
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: formAction,
                data: datalogin,
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(result) {
                    if(result.substring(0,1) == 1) {
                        $('#loading').hide('fast');
                        $("#success").show('fast');
                        setTimeout(function() {
                            window.location = '<?=base_url();?>dashboard';
                        }, 1000);
                    } else {
                        $('#loading').hide('fast');
                        $("#failed").show('fast').delay(2000).hide('fast');
                        $('#username').val('');
                        $('#password').val('');
                        return false;
                    }
                }
            });
            return false;
        }
    });    
});
</script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</html>






