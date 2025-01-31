<?php $level = $this->session->userdata('level'); ?>

<?php $val = json_decode(@$data['pribadi_data'], true); ?>

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

          <!-- <div <?=($level != 3)?'':'hidden'?> align="left">
            <a href="<?php echo base_url('assets/excel/pribadi.xlsx') ?>" title="Template Excel" Download><button class="btn btn-primary"><i class="fa fa-download"></i> Download Template</button></a>
            <button class="btn btn-success" data-toggle="modal" data-target="#modal-import"><i class="fa fa-upload"></i> Upload Excel</button>
          </div> -->

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
                            <input readonly name="a1" type="text" class="form-control" value="<?php echo @$data['user_name'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Panggilan</label>
                            <input name="a2" type="text" class="form-control" value="<?php echo @$val['a2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">jenis Kelamin</label>
                            <select id="a3" name="a3" class="form-control" />
                              <option hidden="" value="">-- Pilih --</option>
                              <option value="laki-laki">Laki-laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>

                            <script type="text/javascript">
                                $('#a3').val('<?php echo @$val['a3'] ?>').change();
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat ( Lahir )</label>
                            <input name="a4" type="text" class="form-control" value="<?php echo @$val['a4'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Bulan Tahun ( Lahir )</label>
                            <input name="a5" type="date" class="form-control" value="<?php echo @$val['a5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" name="a6" id="a6">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($agama_data as $key): ?>
                                    <option value="<?=$key['agama_nama']?>"><?=$key['agama_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#a6').val('<?php echo @$val['a6'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <input name="a7" type="text" class="form-control" value="<?php echo @$val['a7'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Anak ke berapa</label>
                            <input name="a8" type="text" class="form-control" value="<?php echo @$val['a8'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah saudara kandung</label>
                            <input name="a9" type="text" class="form-control" value="<?php echo @$val['a9'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah saudara tiri</label>
                            <input name="a10" type="text" class="form-control" value="<?php echo @$val['a10'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah saudara singkat</label>
                            <input name="a11" type="text" class="form-control" value="<?php echo @$val['a11'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Yatim / Piatu / Yatim Piatu</label>
                            <select id="a12" name="a12" class="form-control">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="yatim">Yatim</option>
                                <option value="piatu">Piatu</option>
                                <option value="yatim piatu">Yatim Piatu</option>
                            </select>

                            <script type="text/javascript">
                                $('#a12').val('<?php echo @$val['a12'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Bahasa sehari-hari di rumah</label>
                            <input name="a13" type="text" class="form-control" value="<?php echo @$val['a13'] ?>" />
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
                            <input name="b1" type="text" class="form-control" value="<?php echo @$val['b1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor telepon/HP</label>
                            <input name="b2" type="text" class="form-control" value="<?php echo @$val['b2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tinggal dengan orang tua/saudara/di asmara/kost</label>

                            <select class="form-control" name="b3" id="b3">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($tinggal_data as $key): ?>
                                    <option value="<?=$key['tinggal_nama']?>"><?=$key['tinggal_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#b3').val('<?php echo @$val['b3'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Jarak tempat tinggal ke sekolah (Km)</label>
                            <input name="b4" type="text" class="form-control" value="<?php echo @$val['b4'] ?>" />
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
                                $('#c1').val('<?php echo @$val['c1'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Penyakit yang pernah di derita</label>
                            <input name="c2" type="text" class="form-control" value="<?php echo @$val['c2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kelainan jasmani</label>
                            <input name="c3" type="text" class="form-control" value="<?php echo @$val['c3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tinggi (cm)</label>
                            <input name="c4" type="text" class="form-control" value="<?php echo @$val['c4'] ?>" />
                            <small class="text-danger">* Saat diterima di sekolah ini</small>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Berat (kg)</label>
                            <input name="c5" type="text" class="form-control" value="<?php echo @$val['c5'] ?>" />
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
                            <input name="d1" type="text" class="form-control" value="<?php echo @$val['d1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal dan nomor ijazah</label>
                            <input name="d2" type="text" class="form-control" value="<?php echo @$val['d2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal dan nomor STL/SKHUN</label>
                            <input name="d3" type="text" class="form-control" value="<?php echo @$val['d3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lama belajar (Tahun)</label>
                            <input name="d4" type="text" class="form-control" value="<?php echo @$val['d4'] ?>" />
                        </div>

                        <h4 style="background: #ddd; padding: 0.5%;">Pindahan</h4>
                        <div class="form-group">
                            <label class="control-label">Dari sekolah</label>
                            <input name="d5" type="text" class="form-control" value="<?php echo @$val['d5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alasan</label>
                            <input name="d6" type="text" class="form-control" value="<?php echo @$val['d6'] ?>" />
                        </div>

                        <h4 style="background: #ddd; padding: 0.5%;">Diterima di sekolah ini</h4>
                        <div class="form-group">
                            <label class="control-label">Di kelas</label>
                            <input name="d7" type="text" class="form-control" value="<?php echo @$val['d7'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bidang keahlian</label>
                            <select id="d8" name="d8" class="form-control">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach (@$jurusan_data as $value): ?>
                                    <option value="<?=@$value['jurusan_nama']?>"><?=@$value['jurusan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#d8').val('<?php echo @$val['d8'] ?>').change();
                            </script>

                            <!-- <input name="d8" type="text" class="form-control" value="" /> -->
                        </div>
                        <div class="form-group">
                            <label class="control-label">Program keahlian</label>
                            <input name="d9" type="text" class="form-control" value="<?php echo @$val['d9'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keahlian</label>
                            <input name="d10" type="text" class="form-control" value="<?php echo @$val['d10'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal/bulan/tahun</label>
                            <input name="d11" type="date" class="form-control" value="<?php echo @$val['d11'] ?>" />
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
                            <input name="e1" type="text" class="form-control" value="<?php echo @$val['e1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat ( Lahir )</label>
                            <input name="e2" type="text" class="form-control" value="<?php echo @$val['e2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Bulan Tahun ( Lahir )</label>
                            <input name="e3" type="date" class="form-control" value="<?php echo @$val['e3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" name="e4" id="e4">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($agama_data as $key): ?>
                                    <option value="<?=$key['agama_nama']?>"><?=$key['agama_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#e4').val('<?php echo @$val['e4'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <input name="e5" type="text" class="form-control" value="<?php echo @$val['e5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pendidikan</label>
                            <select id="e6" class="form-control" name="e6">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pendidikan_data as $value): ?>
                                    <option value="<?=$value['pendidikan_nama']?>"><?=$value['pendidikan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#e6').val('<?php echo @$val['e6'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            <select class="form-control" name="e7" id="e7">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pekerjaan_data as $key): ?>
                                    <option value="<?=$key['pekerjaan_nama']?>"><?=$key['pekerjaan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#e7').val('<?php echo @$val['e7'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengeluaran perbulan</label>

                            <select class="form-control" name="e8" id="e8">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pengeluaran_data as $key): ?>
                                    <option value="<?=$key['pengeluaran_nama']?>"><?=$key['pengeluaran_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#e8').val('<?php echo @$val['e8'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat/rumah/nomor telp/HP</label>
                            <input name="e9" type="text" class="form-control" value="<?php echo @$val['e9'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Masih hidup/meninggal dunia</label>
                            <select id="e10" class="form-control" name="e10">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="masih hidup">masih hidup</option>
                                <option value="meninggal dunia">meninggal dunia</option>
                            </select>

                            <script type="text/javascript">
                                $('#e10').val('<?php echo @$val['e10'] ?>').change();
                            </script>

                            <!-- <input name="e9" type="text" class="form-control" value="" /> -->
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
                            <input name="f1" type="text" class="form-control" value="<?php echo @$val['f1'] ?>" />
                        </div>
                         <div class="form-group">
                            <label class="control-label">Tempat ( Lahir )</label>
                            <input name="f2" type="text" class="form-control" value="<?php echo @$val['f2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Bulan Tahun ( Lahir )</label>
                            <input name="f3" type="date" class="form-control" value="<?php echo @$val['f3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" name="f4" id="f4">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($agama_data as $key): ?>
                                    <option value="<?=$key['agama_nama']?>"><?=$key['agama_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#f4').val('<?php echo @$val['f4'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <input name="f5" type="text" class="form-control" value="<?php echo @$val['f5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pendidikan</label>
                            <select id="f6" class="form-control" name="f6">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pendidikan_data as $value): ?>
                                    <option value="<?=$value['pendidikan_nama']?>"><?=$value['pendidikan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#f6').val('<?php echo @$val['f6'] ?>').change();
                            </script>

                            <!-- <input name="f5" type="text" class="form-control" value="" /> -->
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>

                            <select class="form-control" name="f7" id="f7">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pekerjaan_data as $key): ?>
                                    <option value="<?=$key['pekerjaan_nama']?>"><?=$key['pekerjaan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#f7').val('<?php echo @$val['f7'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengeluaran perbulan</label>

                            <select class="form-control" name="f8" id="f8">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pengeluaran_data as $key): ?>
                                    <option value="<?=$key['pengeluaran_nama']?>"><?=$key['pengeluaran_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#f8').val('<?php echo @$val['f8'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat/rumah/nomor telp/HP</label>
                            <input name="f9" type="text" class="form-control" value="<?php echo @$val['f9'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Masih hidup/meninggal dunia</label>
                            <select id="f10" class="form-control" name="f10">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="masih hidup">masih hidup</option>
                                <option value="meninggal dunia">meninggal dunia</option>
                            </select>

                            <script type="text/javascript">
                                $('#f10').val('<?php echo @$val['f10'] ?>').change();
                            </script>

                            <!-- <input name="f9" type="text" class="form-control" value="" /> -->
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
                            <input name="g1" type="text" class="form-control" value="<?php echo @$val['g1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat ( Lahir )</label>
                            <input name="g2" type="text" class="form-control" value="<?php echo @$val['g2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Bulan Tahun ( Lahir )</label>
                            <input name="g3" type="date" class="form-control" value="<?php echo @$val['g3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" name="g4" id="g4">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($agama_data as $key): ?>
                                    <option value="<?=$key['agama_nama']?>"><?=$key['agama_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#g4').val('<?php echo @$val['g4'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan</label>
                            <input name="g5" type="text" class="form-control" value="<?php echo @$val['g5'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pendidikan</label>
                            <select id="g6" class="form-control" name="g6">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pendidikan_data as $value): ?>
                                    <option value="<?=$value['pendidikan_nama']?>"><?=$value['pendidikan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#g6').val('<?php echo @$val['g6'] ?>').change();
                            </script>

                            <!-- <input name="g5" type="text" class="form-control" value="" /> -->
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>

                            <select class="form-control" name="g7" id="g7">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pekerjaan_data as $key): ?>
                                    <option value="<?=$key['pekerjaan_nama']?>"><?=$key['pekerjaan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#g7').val('<?php echo @$val['g7'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengeluaran perbulan</label>

                            <select class="form-control" name="g8" id="g8">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($pengeluaran_data as $key): ?>
                                    <option value="<?=$key['pengeluaran_nama']?>"><?=$key['pengeluaran_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#g8').val('<?php echo @$val['g8'] ?>').change();
                            </script>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat/rumah/nomor telp/HP</label>
                            <input name="g9" type="text" class="form-control" value="<?php echo @$val['g9'] ?>" />
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
                            <input name="h1" type="text" class="form-control" value="<?php echo @$val['h1'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Olah raga</label>
                            <input name="h2" type="text" class="form-control" value="<?php echo @$val['h2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kemasyarakatan/organisasi</label>
                            <input name="h3" type="text" class="form-control" value="<?php echo @$val['h3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lain-lain</label>
                            <input name="h4" type="text" class="form-control" value="<?php echo @$val['h4'] ?>" />
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
                            <input name="i1" type="text" class="form-control" value="<?php echo @$val['i1'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Kelas</label>
                            <input name="i2" type="text" class="form-control" value="<?php echo @$val['i2'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Dari</label>
                            <input name="i3" type="text" class="form-control" value="<?php echo @$val['i3'] ?>" />
                        </div>

                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Tahun</label>
                            <input name="i4" type="text" class="form-control" value="<?php echo @$val['i4'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Kelas</label>
                            <input name="i5" type="text" class="form-control" value="<?php echo @$val['i5'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Dari</label>
                            <input name="i6" type="text" class="form-control" value="<?php echo @$val['i6'] ?>" />
                        </div>

                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Tahun</label>
                            <input name="i7" type="text" class="form-control" value="<?php echo @$val['i7'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Kelas</label>
                            <input name="i8" type="text" class="form-control" value="<?php echo @$val['i8'] ?>" />
                        </div>
                        <div class="form-group col-md-4 col-xs-4">
                            <label class="control-label">Dari</label>
                            <input name="i9" type="text" class="form-control" value="<?php echo @$val['i9'] ?>" />
                        </div>

                        <div class="clearfix"></div>

                        <h4 style="background: #ddd; padding: 0.5%;">Meninggalkan sekolah ini</h4>
                        <div class="form-group">
                            <label class="control-label">Tanggal meninggal sekolah</label>
                            <input name="i10" type="date" class="form-control" value="<?php echo @$val['i10'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alasan</label>
                            <textarea name="i11" class="form-control"><?php echo @$val['i11'] ?></textarea>
                        </div>

                        <div class="clearfix"></div>

                        <h4 style="background: #ddd; padding: 0.5%;">Akhir pendidikan</h4>
                        <div class="form-group">
                            <label class="control-label">Lulus (tahun)</label>
                            <input name="i12" type="text" class="form-control" value="<?php echo @$val['i12'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor/tanggal ijazah</label>
                            <input name="i13" type="text" class="form-control" value="<?php echo @$val['i13'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor/tanggal SKHUN</label>
                            <input name="i14" type="text" class="form-control" value="<?php echo @$val['i14'] ?>" />
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
                            <input name="j1" type="text" class="form-control" value="<?php echo @$val['j1'] ?>" />
                        </div>

                        <div class="clearfix"></div>

                        <h4 style="background: #ddd; padding: 0.5%;">Bekerja di</h4>
                        <div class="form-group">
                            <label class="control-label">Tanggal mulai bekerja</label>
                            <input name="j2" type="date" class="form-control" value="<?php echo @$val['j2'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama perusahaan/lembaga</label>
                            <input name="j3" type="text" class="form-control" value="<?php echo @$val['j3'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Penghasilan</label>

                            <select class="form-control" name="j4" id="j4">
                                <option value="" hidden>-- Pilih --</option>
                                <?php foreach ($penghasilan_data as $key): ?>
                                    <option value="<?=$key['penghasilan_nama']?>"><?=$key['penghasilan_nama']?></option>
                                <?php endforeach ?>
                            </select>

                            <script type="text/javascript">
                                $('#j4').val('<?php echo @$val['j4'] ?>').change();
                            </script>

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
                            <input type="hidden" name="k1" value="<?php echo @$val['k1'] ?>">

                            <?php if (@GetImageSize(base_url('assets/gambar/pribadi/').@$val['k1'])): ?>
                            
                            <a href="<?php echo base_url('assets/gambar/pribadi/').@$val['k1'] ?>" target="_blank"><button type="button" class="btn btn-xs btn-success">Lihat <i class="fa fa-eye"></i></button></a>
                            
                            <a href="<?php echo base_url('pribadi/delete_foto/'.@$val['k1']) ?>"><button type="button" class="btn btn-xs btn-danger">Hapus <i class="fa fa-trash"></i></button></a>

                            <?php endif ?>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Upload foto 3 x 4 (waktu meninggalkan sekolah ini)</label>
                            <input name="file2" type="file" class="form-control" accept="image/*" />
                            <input type="hidden" name="k2" value="<?php echo @$val['k2'] ?>">

                            <?php if (@GetImageSize(base_url('assets/gambar/pribadi/').@$val['k2'])): ?>
                            
                            <a href="<?php echo base_url('assets/gambar/pribadi/').@$val['k2'] ?>" target="_blank"><button type="button" class="btn btn-xs btn-success">Lihat <i class="fa fa-eye"></i></button></a>

                            <a href="<?php echo base_url('pribadi/delete_foto/'.@$val['k2']) ?>"><button type="button" class="btn btn-xs btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                            
                            <?php endif ?>

                            
                        </div>

                        <input type="hidden" name="id" value="<?= ($this->session->userdata('level') == 2)? $user : $this->session->userdata('id') ?>">

                        <button class="btn btn-success pull-right" type="submit">Finish!</button>
                    </div>
                </div>

            </form>
        </div>

        </div>
      </div>


<div class="modal fade" id="modal-import">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload Excel</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('pribadi/import') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Pilih File</label>
                <input required="" type="file" name="uploadFile" class="form-control">
                <input type="hidden" name="id" value="<?php echo $user; ?>">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
               <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
      // var level = '<?= $this->session->userdata('level'); ?>';

      // if (level == 3) {

      //   $('.btn-danger').remove();
      //   $('input[type="file"]').remove();

      //   $('input').css({
      //       'pointer-events': 'none',
      //       'border': 'none',
      //   });

      //   $('select').css({
      //       'pointer-events': 'none',
      //       'border': 'none',
      //   });

      //   for (var i = 1; i <= 4; i++) {
            
      //        $('input[name="j'+i+'"]').css({
      //           'pointer-events': '',
      //           'border': '',
      //       });
      //   }
       
      // }

  </script>