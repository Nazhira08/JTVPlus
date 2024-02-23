<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <ul class="breadcrumb">
                    <li class="active">Reset Pasword Admin</li>
                </ul>
    <div class="page-title">                    
        <h2><span class="fa fa-key"></span> Reset Password</h2>
    </div>
    <div class="page-content-wrap">            
    <div class="row">
        <div class="col-xs-12">
            <?=$alert;?> 
            <?=form_open_multipart($action, array('role' => 'form', 'class'=>'form-horizontal form-bordered'));?>

                    <div class="form-group">
                                 <label class="col-md-3 control-label">User</label>
                                <div class="col-md-2">
                                  <input id="NIP" readonly="yes" style="width: 150px" required autofocus placeholder="NIP" type="text" class="form-control" name="NIP" value="<?=(set_value('NIP')) ? set_value('NIP') : $NIP?>">
                                </div>
                                <div class="col-md-2">
                                 <a class="btn btn-info" data-toggle="modal" data-target="#nip"><i class="fa fa-search-plus"> </i>&nbsp;&nbsp;User</a>
                                 </div>
                                               
                    </div>
                        <div class="form-group">
                        <label class="col-md-3 control-label">PASSWORD BARU</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Password Baru" type="password" class="form-control" name="password1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">ULANGI PASSWORD BARU</label>
                        <div class="col-md-9">
                            <input style="width: 400px" required autofocus placeholder="Ulangi Password Baru" type="password" class="form-control" name="password2">
                        </div>
                    </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-share"></i> <?=$tombol;?></button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-body">

                    <div id="form_detail" name="form_detail"></div>


                </div>
            </div>
       </form>
    </div>
</div>
</div>

<div class="modal fade myModal" id="nip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PILIH KARYAWAN</h4>
      </div>
      <div class="modal-body">
        <table id="datatables3" class="table table-bordered table-hover table-striped table-condensed data-tabel">
                                    <thead>
                                    <tr>
                                        <th>user</th>
                                        <th>Display Name </th>
                                        <th>TV</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; foreach ($query_karyawan->result() as $row) { $no++ ?>
                                    <tr>
                                        <td><?php echo $row->username; ?><a href="#" class="close btn btn-sm bg-blue" data-dismiss="modal" data-toggle="tooltip" data-original-title="Edit User ini"><i class="glyphicon glyphicon-ok-sign"></i></a></td>
                                        <td><?php echo $row->display_name; ?> </td>
                                        <td><?php echo $row->TV; ?> </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                    
                                  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <script type="text/javascript">


   var table = document.getElementById("datatables3");
    if (table != null) {
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].cells[0].onclick = function () {
                document.getElementById("NIP").value=this.innerHTML.substr(0,this.innerHTML.indexOf("<"));//.substr(0,8);
                // /tableText(this);
                //alert(i);
                //alert(document.getElementById("datatables").rows[1].cells.item(0).innerHTML)

            }
        }
    }
   
</script>