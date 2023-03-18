<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Buku Induk | <?php echo $title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/gambar/icon.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons --> 
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/Ionicons/css/ionicons.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Data Table -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/dist/css/skins/_all-skins.min.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>adminLTE/bower_components/jquery/dist/jquery.min.js"></script>


<style type="text/css">
  /*timer*/
  .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }
 .stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

</style>

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper"> 

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-pagelines"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-book"></i> <b>BUKU INDUK</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if (@$this->session->userdata('foto') == ''): ?>
                <img src="<?php echo base_url() ?>assets/gambar/user/no.jpg" class="user-image" alt="User Image">
              <?php else: ?>
                <img src="<?php echo base_url() ?>assets/gambar/user/<?php echo $this->session->userdata('foto'); ?>" class="user-image" alt="User Image">
              <?php endif ?>

              <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <?php if (@$this->session->userdata('foto') == ''): ?>
                  <img src="<?php echo base_url() ?>assets/gambar/user/no.jpg" class="img-circle" alt="User Image">
                <?php else: ?>
                  <img src="<?php echo base_url() ?>assets/gambar/user/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">
                <?php endif ?>

                <p>
                  <span id="date"></span>
                  <small id="clock" style="color: #23427F; background-color: white; margin-top: 4%;"></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url() ?>profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

          <?php if ($this->session->userdata('foto') == ''): ?>
            <img src="<?php echo base_url() ?>assets/gambar/user/no.jpg" class="img-circle" alt="User Image"  style="height: 45px;">
          <?php else: ?>
            <img src="<?php echo base_url() ?>assets/gambar/user/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image"  style="height: 45px;">
          <?php endif ?>
          
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('name'); ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

           <li <?php echo @$dashboard; ?>>
            <a href="<?php echo base_url() ?>dashboard">
              <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
          </li>

          <?php if ($this->session->userdata('level') == 2): ?>

            <li <?php echo @$tahun; ?>>
              <a href="<?php echo base_url() ?>tahun">
                <i class="fa fa-calendar"></i> <span>Tahun Pelajaran</span>
              </a>
            </li>

          <?php endif ?>

          <?php if ($this->session->userdata('level') == 1): ?>
            
            <li <?php echo @$petugas; ?>>
              <a href="<?php echo base_url() ?>petugas">
                <i class="fa fa-user-plus"></i> <span>Petugas</span>
              </a>
            </li>

            <li <?php echo @$siswa; ?>>
              <a href="<?php echo base_url() ?>siswa">
                <i class="fa fa-users"></i> <span>Siswa</span>
              </a>
            </li>

          <?php endif ?>

          <?php if ($this->session->userdata('level') == 1): ?>

            <!-- <li class="treeview <?php echo @$pelajaran_active ?>">
              <a href="#">
                <i class="fa fa-bookmark"></i>
                <span>Mata Pelajaran</span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo @$kategori ?>"><a href="<?php echo base_url() ?>kategori"><i class="fa fa-circle-o"></i> Kategori</a></li>
                <li class="<?php echo @$pelajaran ?>"><a href="<?php echo base_url() ?>pelajaran"><i class="fa fa-circle-o"></i> Pelajaran</a></li>
              </ul>
            </li> -->

          <?php endif ?>

          <?php if ($this->session->userdata('level') > 1): ?>

            <li <?php echo @$pribadi; ?>>
              <a href="<?php echo base_url() ?>pribadi">
                <i class="fa fa-drivers-license"></i> <span>Data <?= ($this->session->userdata('level') == 2)?'Siswa':'Pribadi' ?></span>
              </a>
            </li>

            <li <?php echo @$penilaian; ?>>
              <a href="<?php echo base_url() ?>penilaian">
                <i class="fa fa-pencil"></i> <span><?= ($this->session->userdata('level') == 2)?'Penilaian':'Nilai' ?> Semester</span>
              </a>
            </li>

            <li <?php echo @$lintas; ?>>
              <a href="<?php echo base_url() ?>lintas">
                <i class="fa fa-files-o"></i> <span>Lintas Minat / Pendalaman</span>
              </a>
            </li>

          <?php endif ?>
          
          <?php if ($this->session->userdata('level') >= 2): ?>

            <li <?php echo @$dokumen; ?>>
              <a href="<?php echo base_url() ?>dokumen">
                <i class="fa fa-upload"></i> <span>Upload Dokumen</span>
              </a>
            </li>

          <?php endif ?>
                    
        <li <?php echo @$profile; ?>>
          <a href="<?php echo base_url() ?>profile">
            <i class="fa fa-user-circle-o"></i> <span>Profile</span>
          </a>
        </li>

        <!-- <li <?php echo @$import; ?>>
          <a href="<?php echo base_url() ?>import">
            <i class="fa fa-file-excel-o"></i> <span>Import Excel</span>
          </a>
        </li> -->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    
        
  
  