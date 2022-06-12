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

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <br/>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
          <div class="container" style="width: 100%;">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-1" type="button" class="btn btn-success btn-circle">A</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">B</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">C</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">D</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">E</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">F</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">G</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">H</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled">I</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-10" type="button" class="btn btn-default btn-circle" disabled="disabled">J</a>
                        <p><small></small></p>
                    </div>
                    <div class="stepwizard-step col-xs-1"> 
                        <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">K</a>
                        <p><small></small></p>
                    </div>
                </div>
            </div>
            
            <form role="form" action="<?php echo base_url('pribadi/save') ?>" method="POST" enctype="multipart/form-data">
                <div class="panel panel-danger setup-content" id="step-1">
                    <div class="panel-heading">
                         <h3 class="panel-title">A. KETERANGAN TENTANG PESERTA DIDIK</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Nama lengkap peserta didik</label>
                            <input name="a1" type="text" class="form-control" value="<?php echo @$data['a1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Panggilan</label>
                            <input name="a2" type="text" class="form-control" value="<?php echo @$data['a2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">jenis Kelamin</label>
                            <select id="a3" name="a3" class="form-control" />
                              <option hidden="" value="">-- Pilih --</option>
                              <option value="laki-laki">Laki-laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>

                            <script type="text/javascript">
                                $('#a3').val('<?php echo @$data['a3'] ?>').change();
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat dan tanggal lahir</label>
                            <input name="a4" type="text" class="form-control" value="<?php echo @$data['a4'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <input name="a5" type="text" class="form-control" value="<?php echo @$data['a5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <input name="a6" type="text" class="form-control" value="<?php echo @$data['a6'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Anak ke berapa</label>
                            <input name="a7" type="text" class="form-control" value="<?php echo @$data['a7'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah saudara kandung</label>
                            <input name="a8" type="text" class="form-control" value="<?php echo @$data['a8'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah saudara tiri</label>
                            <input name="a9" type="text" class="form-control" value="<?php echo @$data['a9'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah saudara singkat</label>
                            <input name="a10" type="text" class="form-control" value="<?php echo @$data['a10'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Anak yatim / piatu / yatim piatu</label>
                            <input name="a11" type="text" class="form-control" value="<?php echo @$data['a11'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bahasa sehari-hari di rumah</label>
                            <input name="a12" type="text" class="form-control" value="<?php echo @$data['a12'] ?>" />
                        </div>
                        
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>
                
                <div class="panel panel-danger setup-content" id="step-2">
                    <div class="panel-heading">
                         <h3 class="panel-title">B. KETERANGAN TEMPAT TINGGAL</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input name="b1" type="text" class="form-control" value="<?php echo @$data['b1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor telepon/HP</label>
                            <input name="b2" type="text" class="form-control" value="<?php echo @$data['b2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tinggal dengan orang tua/saudara/di asmara/kost</label>
                            <select id="b3" name="b3" class="form-control">
                                <option value="" hidden="">-- Pilih --</option>
                                <option value="orang_tua">Orang tua</option>
                                <option value="saudara">Saudara</option>
                                <option value="asrama">Asrama</option>
                                <option value="kost">Kost</option>
                            </select>

                            <script type="text/javascript">
                                $('#b3').val('<?php echo @$data['b3'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Jarak tempat tinggal ke sekolah (Km)</label>
                            <input name="b4" type="text" class="form-control" value="<?php echo @$data['b4'] ?>" />
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>
                
                <div class="panel panel-danger setup-content" id="step-3">
                    <div class="panel-heading">
                         <h3 class="panel-title">C. KETERANGAN KESEHATAN</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Golongan darah</label>
                            <select id="c1" name="c1" class="form-control">
                                <option value="" hidden="">-- Pilih --</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="ab">AB</option>
                                <option value="o">O</option>
                            </select>     

                            <script type="text/javascript">
                                $('#c1').val('<?php echo @$data['c1'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Penyakit yang pernah di derita</label>
                            <input name="c2" type="text" class="form-control" value="<?php echo @$data['c2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kelainan jasmani</label>
                            <input name="c3" type="text" class="form-control" value="<?php echo @$data['c3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tinggi (cm)</label>
                            <input name="c4" type="text" class="form-control" value="<?php echo @$data['c4'] ?>" />
                            <small class="text-danger">* Saat diterima di sekolah ini</small>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Berat (kg)</label>
                            <input name="c5" type="text" class="form-control" value="<?php echo @$data['c5'] ?>" />
                            <small class="text-danger">* Saat diterima di sekolah ini</small>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>
                
                <div class="panel panel-danger setup-content" id="step-4">
                    <div class="panel-heading">
                         <h3 class="panel-title">D. KETERANGAN PENDIDIKAN</h3>
                    </div>
                    <div class="panel-body">
                        <h4 style="background: #ddd; padding: 0.5%;">Pendidikan sebelumnya</h4>
                        <div class="form-group">
                            <label class="control-label">Tamatan dari</label>
                            <input name="d1" type="text" class="form-control" value="<?php echo @$data['d1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal dan nomor ijazah</label>
                            <input name="d2" type="text" class="form-control" value="<?php echo @$data['d2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal dan nomor STL/SKHUN</label>
                            <input name="d3" type="text" class="form-control" value="<?php echo @$data['d3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lama belajar (Tahun)</label>
                            <input name="d4" type="text" class="form-control" value="<?php echo @$data['d4'] ?>" />
                        </div>

                        <h4 style="background: #ddd; padding: 0.5%;">Pindahan</h4>
                        <div class="form-group">
                            <label class="control-label">Dari sekolah</label>
                            <input name="d5" type="text" class="form-control" value="<?php echo @$data['d5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alasan</label>
                            <input name="d6" type="text" class="form-control" value="<?php echo @$data['d6'] ?>" />
                        </div>

                        <h4 style="background: #ddd; padding: 0.5%;">Diterima di sekolah ini</h4>
                        <div class="form-group">
                            <label class="control-label">Di kelas</label>
                            <input name="d7" type="text" class="form-control" value="<?php echo @$data['d7'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bidang keahlian</label>
                            <input name="d8" type="text" class="form-control" value="<?php echo @$data['d8'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Program keahlian</label>
                            <input name="d9" type="text" class="form-control" value="<?php echo @$data['d9'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keahlian</label>
                            <input name="d10" type="text" class="form-control" value="<?php echo @$data['d10'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal/bulan/tahun</label>
                            <input name="d11" type="date" class="form-control" value="<?php echo @$data['d11'] ?>" />
                        </div>

                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-danger setup-content" id="step-5">
                    <div class="panel-heading">
                         <h3 class="panel-title">E. KETERANGAN TENTANG AYAH KANDUNG</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input name="e1" type="text" class="form-control" value="<?php echo @$data['e1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat dan tanggal lahir</label>
                            <input name="e2" type="text" class="form-control" value="<?php echo @$data['e2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <input name="e3" type="text" class="form-control" value="<?php echo @$data['e3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewajiban</label>
                            <input name="e4" type="text" class="form-control" value="<?php echo @$data['e4'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pendidikan</label>
                            <input name="e5" type="text" class="form-control" value="<?php echo @$data['e5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <input name="e6" type="text" class="form-control" value="<?php echo @$data['e6'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengeluaran perbulan</label>
                            <input name="e7" type="text" class="form-control" value="<?php echo @$data['e7'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat/rumah/nomor telp/HP</label>
                            <input name="e8" type="text" class="form-control" value="<?php echo @$data['e8'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Masih hidup/meninggal dunia</label>
                            <input name="e9" type="text" class="form-control" value="<?php echo @$data['e9'] ?>" />
                        </div>
                       
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-danger setup-content" id="step-6">
                    <div class="panel-heading">
                         <h3 class="panel-title">F. KETERANGAN TENTANG IBU KANDUNG</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input name="f1" type="text" class="form-control" value="<?php echo @$data['f1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat dan tanggal lahir</label>
                            <input name="f2" type="text" class="form-control" value="<?php echo @$data['f2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <input name="f3" type="text" class="form-control" value="<?php echo @$data['f3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewajiban</label>
                            <input name="f4" type="text" class="form-control" value="<?php echo @$data['f4'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pendidikan</label>
                            <input name="f5" type="text" class="form-control" value="<?php echo @$data['f5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <input name="f6" type="text" class="form-control" value="<?php echo @$data['f6'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengeluaran perbulan</label>
                            <input name="f7" type="text" class="form-control" value="<?php echo @$data['f7'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat/rumah/nomor telp/HP</label>
                            <input name="f8" type="text" class="form-control" value="<?php echo @$data['f8'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Masih hidup/meninggal dunia</label>
                            <input name="f9" type="text" class="form-control" value="<?php echo @$data['f9'] ?>" />
                        </div>
                       
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-danger setup-content" id="step-7">
                    <div class="panel-heading">
                         <h3 class="panel-title">G. KETERANGAN TENTANG WALI</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input name="g1" type="text" class="form-control" value="<?php echo @$data['g1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat dan tanggal lahir</label>
                            <input name="g2" type="text" class="form-control" value="<?php echo @$data['g2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <input name="g3" type="text" class="form-control" value="<?php echo @$data['g3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewajiban</label>
                            <input name="g4" type="text" class="form-control" value="<?php echo @$data['g4'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pendidikan</label>
                            <input name="g5" type="text" class="form-control" value="<?php echo @$data['g5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <input name="g6" type="text" class="form-control" value="<?php echo @$data['g6'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengeluaran perbulan</label>
                            <input name="g7" type="text" class="form-control" value="<?php echo @$data['g7'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat/rumah/nomor telp/HP</label>
                            <input name="g8" type="text" class="form-control" value="<?php echo @$data['g8'] ?>" />
                        </div>
                       
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-danger setup-content" id="step-8">
                    <div class="panel-heading">
                         <h3 class="panel-title">H. KEGEMARAN PESERTA DIDIK</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Kesenian</label>
                            <input name="h1" type="text" class="form-control" value="<?php echo @$data['h1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Olah raga</label>
                            <input name="h2" type="text" class="form-control" value="<?php echo @$data['h2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kemasyarakatan/organisasi</label>
                            <input name="h3" type="text" class="form-control" value="<?php echo @$data['h3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lain-lain</label>
                            <input name="h4" type="text" class="form-control" value="<?php echo @$data['h4'] ?>" />
                        </div>
                       
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-danger setup-content" id="step-9">
                    <div class="panel-heading">
                         <h3 class="panel-title">I. KETERANGAN PERKEMBANGAN PESERTA DIDIK</h3>
                    </div>
                    <div class="panel-body">
                        <h4 style="background: #ddd; padding: 0.5%;">Menerima bea siswa</h4>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Tahun</label>
                            <input name="i1" type="text" class="form-control" value="<?php echo @$data['i1'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Kelas</label>
                            <input name="i2" type="text" class="form-control" value="<?php echo @$data['i2'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Dari</label>
                            <input name="i3" type="text" class="form-control" value="<?php echo @$data['i3'] ?>" />
                        </div>

                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Tahun</label>
                            <input name="i4" type="text" class="form-control" value="<?php echo @$data['i4'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Kelas</label>
                            <input name="i5" type="text" class="form-control" value="<?php echo @$data['i5'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Dari</label>
                            <input name="i6" type="text" class="form-control" value="<?php echo @$data['i6'] ?>" />
                        </div>

                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Tahun</label>
                            <input name="i7" type="text" class="form-control" value="<?php echo @$data['i7'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Kelas</label>
                            <input name="i8" type="text" class="form-control" value="<?php echo @$data['i8'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Dari</label>
                            <input name="i9" type="text" class="form-control" value="<?php echo @$data['i9'] ?>" />
                        </div>

                        <div class="clearfix"></div>

                        <h4 style="background: #ddd; padding: 0.5%;">Meninggalkan sekolah ini</h4>
                        <div class="form-group">
                            <label class="control-label">Tanggal meninggal sekolah</label>
                            <input name="i10" type="date" class="form-control" value="<?php echo @$data['i10'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alasan</label>
                            <textarea name="i11" class="form-control"><?php echo @$data['i11'] ?></textarea>
                        </div>

                        <div class="clearfix"></div>

                        <h4 style="background: #ddd; padding: 0.5%;">Akhir pendidikan</h4>
                        <div class="form-group">
                            <label class="control-label">Lulus (tahun)</label>
                            <input name="i12" type="text" class="form-control" value="<?php echo @$data['i12'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor/tanggal ijazah</label>
                            <input name="i13" type="text" class="form-control" value="<?php echo @$data['i13'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor/tanggal SKHUN</label>
                            <input name="i14" type="text" class="form-control" value="<?php echo @$data['i14'] ?>" />
                        </div>
                       
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-danger setup-content" id="step-10">
                    <div class="panel-heading">
                         <h3 class="panel-title">J. KETERANGAN SETELAH SELESAI PENDIDIKAN</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Melanjutkan ke</label>
                            <input name="j1" type="text" class="form-control" value="<?php echo @$data['j1'] ?>" />
                        </div>

                        <div class="clearfix"></div>

                        <h4 style="background: #ddd; padding: 0.5%;">Bekerja di</h4>
                        <div class="form-group">
                            <label class="control-label">Tanggal mulai bekerja</label>
                            <input name="j2" type="date" class="form-control" value="<?php echo @$data['j2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama perusahaan/lembaga</label>
                            <input name="j3" type="text" class="form-control" value="<?php echo @$data['j3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Penghasilan</label>
                            <input name="j4" type="text" class="form-control" value="<?php echo @$data['j4'] ?>" />
                        </div>
                       
                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                    </div>
                </div>

                <div class="panel panel-danger setup-content" id="step-11">
                    <div class="panel-heading">
                         <h3 class="panel-title">K. UPLOAD FOTO</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Upload foto 3 x 4 (waktu di terima sekolah ini)</label>
                            <input name="file1" type="file" class="form-control" accept="image/*" />
                            <input type="hidden" name="k1" value="<?php echo @$data['k1'] ?>">

                            <?php if (@GetImageSize(base_url('assets/gambar/pribadi/').@$data['k1'])): ?>
                            
                            <a href="<?php echo base_url('assets/gambar/pribadi/').@$data['k1'] ?>" target="_blank"><button type="button" class="btn btn-xs btn-success">Lihat <i class="fa fa-eye"></i></button></a>
                            
                            <a href="<?php echo base_url('pribadi/delete_foto/'.@$data['k1']) ?>"><button type="button" class="btn btn-xs btn-danger">Hapus <i class="fa fa-trash"></i></button></a>

                            <?php endif ?>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Upload foto 3 x 4 (waktu meninggalkan sekolah ini)</label>
                            <input name="file2" type="file" class="form-control" accept="image/*" />
                            <input type="hidden" name="k2" value="<?php echo @$data['k2'] ?>">

                            <?php if (@GetImageSize(base_url('assets/gambar/pribadi/').@$data['k2'])): ?>
                            
                            <a href="<?php echo base_url('assets/gambar/pribadi/').@$data['k2'] ?>" target="_blank"><button type="button" class="btn btn-xs btn-success">Lihat <i class="fa fa-eye"></i></button></a>

                            <a href="<?php echo base_url('pribadi/delete_foto/'.@$data['k2']) ?>"><button type="button" class="btn btn-xs btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                            
                            <?php endif ?>

                            
                        </div>

                        <button class="btn btn-success pull-right" type="submit">Finish!</button>
                    </div>
                </div>

            </form>
        </div>

        </div>
      </div>