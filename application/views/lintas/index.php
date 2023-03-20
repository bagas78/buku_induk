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

          <?php if ($this->session->userdata('level') == 3): ?>
            
            <div align="left">
              <button class="btn btn-danger" data-toggle="modal" data-target="#modal-album"><i class="fa fa-plus"></i> Tambah File</button>
            </div>

          <?php endif ?>

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
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Semester</th>
                <th>Deskripsi</th>
                <th>Download</th>

                <?php if ($this->session->userdata('level') == 3): ?>
                  <th>Action</th>
                <?php endif ?>
                
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo $key['user_nis'] ?></td>
                  <td><?php echo $key['user_name'] ?></td>
                  <td><?php echo $key['lintas_semester'] ?></td>
                  <td><?php echo $key['lintas_deskripsi'] ?></td>
                  <td>
                    <a href="<?php echo base_url('assets/gambar/lintas/'.$key['lintas_file']) ?>" target="_BLANK"><button class="btn btn-warning btn-xs">View <i class="fa fa-eye"></i></button></a>
                    <a href="<?php echo base_url('assets/gambar/lintas/'.$key['lintas_file']) ?>" download=""><button class="btn btn-success btn-xs">Download <i class="fa fa-download"></i></button></a>
                  </td>

                  <?php if ($this->session->userdata('level') == 3): ?>
                    
                    <td style="width: 80px;">
                      <div>
                      
                      <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $key['lintas_id'] ?>"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['lintas_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>

                  <?php endif ?>
                  
                </tr>

                 <!--modal hapus-->
                    <div class="modal fade" id="modalHapus<?php echo $key['lintas_id'] ?>">
                      <div class="modal-dialog" align="center">
                        <div class="modal-content" style="max-width: 300px;">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4>Confirmed ?</h4>
                            </div>
                          <div class="modal-body" align="center">
                             <a href="<?php echo base_url() ?>lintas/delete/<?php echo $key['lintas_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                             <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                          </div>
                        </div>
                      </div>
                     </div> 


                <div class="modal fade" id="modal-edit<?php echo $key['lintas_id'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit File</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url('lintas/update/'.$key['lintas_id']) ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Pilih File</label> <small>( jpg | png | jpeg )</small>
                              <input type="file" name="file" class="form-control">
                              <small class="text-danger">Isi file untuk mengganti file</small>
                            </div>
                            <div class="form-group">
                              <select id="semester<?php echo $key['lintas_id'] ?>" name="lintas_semester" class="form-control" required="">
                                <option value="" hidden="">-- Semester --</option>
                                <?php for ($i=1; $i < 9; $i++): ?>
                                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php endfor ?>
                              </select>

                              <script type="text/javascript">
                                $('#semester<?php echo $key['lintas_id'] ?>').val(<?php echo $key['lintas_semester'] ?>).change();
                              </script>

                            </div>
                            <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea class="form-control" name="lintas_deskripsi" required="" placeholder="Deskripsi"><?php echo $key['lintas_deskripsi'] ?></textarea>
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

              <?php endforeach ?>

              </tfoot>
            </table> 

        </div>
      </div>


  <div class="modal fade" id="modal-album">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah File</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('lintas/add') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Pilih File</label> <small>( jpg | png | jpeg )</small>
                <input required="" type="file" name="file" class="form-control">
              </div>
              <div class="form-group">
                <select name="lintas_semester" class="form-control" required="">
                  <option value="" hidden="">-- Semester --</option>
                  <?php for ($i=1; $i < 9; $i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php endfor ?>
                </select>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="lintas_deskripsi" required="" placeholder="Deskripsi"></textarea>
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