<section class="content-header">
      <h1> 
        <?php echo $title; ?>
        <small>Control panel</small>
      </h1> 
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> 
    </section>
 
    <!-- Main content -->  
    <section class="content"> 

      <?php if ($this->session->flashdata('gagal')): ?>
        <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-close"></i>
          <?php echo $this->session->flashdata('gagal'); ?>
        </div>
      <?php endif ?>
   
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-check"></i>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php endif ?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
           <a href="#">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo @$siswa_num ?></h3>

                <p>SISWA</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
         <a href="#">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo @$kategori_num ?></h3>

              <p>KATEGORI PELAJARAN</p>
            </div>
            <div class="icon">
              <i class="fa fa-th-large"></i>
            </div>
          </div>
        </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="#">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo @$pelajaran_num ?></h3>

                <p>PELAJARAN</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-text-o"></i>
              </div>
            </div>
          </a>
        </div>
      </div>

      <!-- AREA CHART -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">DATA SEKOLAH</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
        <form method="POST" action="<?= ($this->session->userdata('level') < 3)? base_url('sekolah/save'):'#' ?>" enctype="multipart/form-data">

          <div style="background: aliceblue; padding: 2%; border-radius: 20px;">
          
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>NAMA SEKOLAH</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_nama" class="form-control" value="<?php echo @$data['sekolah_nama'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>NSS / NPSN</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_nss" class="form-control" value="<?php echo @$data['sekolah_nss'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>ALAMAT SEKOLAH</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_alamat" class="form-control" value="<?php echo @$data['sekolah_alamat'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>DESA / KELURAHAN</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_desa" class="form-control" value="<?php echo @$data['sekolah_desa'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>KECAMATAN</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_kecamatan" class="form-control" value="<?php echo @$data['sekolah_kecamatan'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>KABUPATEN / KOTA</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_kabupaten" class="form-control" value="<?php echo @$data['sekolah_kabupaten'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>PROVINSI</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_provinsi" class="form-control" value="<?php echo @$data['sekolah_provinsi'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>NAMA KEPALA SEKOLAH</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_nama_kepala" class="form-control" value="<?php echo @$data['sekolah_nama_kepala'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>NIP KEPALA SEKOLAH</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_nip_kepala" class="form-control" value="<?php echo @$data['sekolah_nip_kepala'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>TAHUN PELAJARAN</label>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sekolah_tahun_pelajaran" class="form-control" value="<?php echo @$data['sekolah_tahun_pelajaran'] ?>">
                </div>  
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label>LOGO SEKOLAH</label>
                </div>
                <div class="col-md-6">
                  <input id="logo" type="file" name="logo" class="form-control">

                  <!-- logo -->
                  <a href="<?=base_url('assets/gambar/logo/'.@$data['sekolah_logo'])?>" target="_BLANK"><img style="margin-top: 10px; background: white;" src="<?=base_url('assets/gambar/logo/'.@$data['sekolah_logo'])?>" width="150" class="img-thumbnail"></a>

                </div>  
              </div>
            </div>

            <?php if ($this->session->userdata('level') < 3): ?>

          </div>

            <hr>

            <button class="btn btn-success" type="submit">Simpan <i class="fa fa-check"></i></button>
            <button class="btn btn-danger" type="reset">Reset <i class="fa fa-times"></i></button>

            <?php endif ?>

          </form>

        </div>
      </div>