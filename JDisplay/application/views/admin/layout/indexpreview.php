<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $backend_aplikasi; ?> | <?= $versi_aplikasi; ?></title>
  <script src="<?= base_url(); ?>assets/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
         tinymce.init({
          selector: "textarea"
          });
   </script>
</head>
<body>

<div class="col-md-12" style="background-color: white; ">

              <?php $this->load->view($konten); ?>

</div>

</body>
</html>



