<?php $get_ = $this->db->query("SELECT * FROM t_sekolah")->row_array(); $logo_ = $get_['sekolah_logo']; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BUKU INDUK | LOG IN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" href="<?=base_url('assets/gambar/logo/'.$logo_)?>"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/Ionicons/css/ionicons.min.css"> 
  <!-- Theme style --> 
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    .logo{

      font: normal normal normal 14px/1 FontAwesome;
      font-weight: bold;
      font-size: 100%;      
      padding: 3%;
      color: #d73925;
      background-color: #ffffff9e;

    }
  </style>

</head>
<body class="hold-transition login-page" style="background: url('<?=base_url('assets/gambar/tile.jpg')?>'); background-repeat: repeat;">
<div class="login-box">
  <div class="login-logo">

    <img src="<?=base_url('assets/gambar/logo/'.$logo_)?>" width="80">
    <span class="logo">BUKU INDUK</span>

    <!-- <div style="font-size: 115%;color: #ffffff;padding: 3%;" class="fa fa-book"> <span style="font-weight: bold;">BUKU INDUK</span></div> -->
    <br/>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.2), 0 3px 17px 0 rgba(0, 0, 0, 0.19);">

    <?php if ($this->session->flashdata('gagal')): ?>
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('gagal'); ?>
      </div>
    <?php endif ?>

    <p class="login-box-msg">Login Aplikasi</p>

    <form action="<?php echo base_url() ?>login/auth" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="user_email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="user_password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>adminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
