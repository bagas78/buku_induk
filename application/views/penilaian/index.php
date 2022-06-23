<style type="text/css">
  .grouping{
    background: aliceblue;
    padding: 1%;
    text-decoration: underline;
  }
  .mb-1{
    margin-bottom: 1%;
  }
  .mb-3{
    margin-bottom: 3%;
  }
</style>

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
         
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama Siswa</th>
                <th>Semester di nilai</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo $key['user_name'] ?></td>
                  <td>
                    <?php $arr = array(); ?>
                    <?php foreach ($semester_data as $sem): ?>
                      <?php $arr[] =+ $sem['semester']; ?>
                    <?php endforeach ?>
                    <?php echo(implode(',', $arr)); ?>
                  </td>
                  <td style="width: 80px;">
                    <div>

                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#modal-print<?php echo $key['user_id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-print"></i></button>

                    </div>
                  </td>
                </tr>

                <div class="modal fade" id="modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Pilih Semester</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url('penilaian/nilai/'.$key['user_id']) ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Semester</label>
                              <select name="semester" class="form-control" required="">
                                <option value="" hidden="">-- Pilih --</option>
                                <?php for ($i=1; $i < 9; $i++): ?>
                                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php endfor ?>
                              </select>
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

                <!--parse-->
                <?php @$parse = json_decode($key['kelengkapan_data']); ?>

                <div class="modal fade" id="modal-print<?php echo $key['user_id'] ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">KELENGKAPAN DATA</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url('penilaian/print/'.$key['user_id']) ?>" enctype="multipart/form-data">
                          <div class="box-body">

                            <h4 class="grouping">Izin Sakit</h4>

                            <div class="form-group">
                              <label>Sakit (Hari)</label>
                              <input class="form-control" type="number" name="a1" value="<?php echo @$parse->a1 ?>">
                            </div>
                            <div class="form-group">
                              <label>Izin (Hari)</label>
                              <input class="form-control" type="number" name="a2" value="<?php echo @$parse->a2 ?>">
                            </div>
                            <div class="form-group">
                              <label>Tanpa Keterangan (Hari)</label>
                              <input class="form-control" type="number" name="a3" value="<?php echo @$parse->a3 ?>">
                            </div>
                          
                            <h4 class="grouping">A. Kegiatan dunia usaha / dunia industri dan instansi relevan</h4>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Nama industri / Dunia Usaha</label>
                                  <input class="mb-3 form-control" type="text" name="b1" value="<?php echo @$parse->b1 ?>">
                                  <input class="form-control" type="text" name="b2" value="<?php echo @$parse->b2 ?>">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Lokasi</label>
                                  <input class="mb-3 form-control" type="text" name="b3" value="<?php echo @$parse->b3 ?>">
                                  <input class="form-control" type="text" name="b4" value="<?php echo @$parse->b4 ?>">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Jenis Kegiatan</label>
                                  <input class="mb-3 form-control" type="text" name="b5" value="<?php echo @$parse->b5 ?>">
                                  <input class="form-control" type="text" name="b6" value="<?php echo @$parse->b6 ?>">
                                </div>
                              </div>
                            </div>

                            <h4 class="grouping">B. Ekstra kurikuler dan ketidak hadiran</h4>

                            <div class="form-group">
                              <label>Ekstra kulikuler yang di ikuti</label>
                              <input class="mb-1 form-control" type="text" name="c1" value="<?php echo @$parse->c1 ?>">
                              <input class="mb-1 form-control" type="text" name="c2" value="<?php echo @$parse->c2 ?>">
                              <input class="form-control" type="text" name="c3" value="<?php echo @$parse->c3 ?>">
                            </div>

                            <h4 class="grouping">Status Akhir Tahun</h4>

                            <div class="form-group">
                              <label>Naik ke Kelas</label>
                              <input class="form-control" type="number" name="d1" value="<?php echo @$parse->d1 ?>">
                            </div>

                            <div class="form-group">
                              <label>Tinggal di</label>
                              <input class="form-control" type="text" name="d2" value="<?php echo @$parse->d2 ?>">
                            </div>

                            <div class="form-group">
                              <label>Status (Lulus / Tidak lulus)</label>
                              <select id="d3" class="form-control" name="d3">
                                <option value="" hidden="">-- Pilih --</option>
                                <option value="lulus">Lulus</option>
                                <option value="Tidak Lulus">Tidak Lulus</option>
                              </select>
                            </div>

                            <script type="text/javascript">
                              $('#d3').val('<?php echo @$parse->d3 ?>').change();
                            </script>

                            <div class="form-group">
                              <label>Tanggal lulus</label>
                              <input class="form-control" type="date" name="d4" value="<?php echo @$parse->d4 ?>">
                            </div>

                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save & Print <i class="fa fa-print"></i></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endforeach ?>

              </tfoot>
            </table> 

        </div>
      </div>