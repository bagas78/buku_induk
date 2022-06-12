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

            <div align="left">
              <button class="btn btn-danger" data-toggle="modal" data-target="#modal-album"><i class="fa fa-plus"></i> Upload Dokumen</button>
            </div>

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
                <th>Dokumen</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo $key['dokumen_name'] ?></td>
                  <td><?php echo $key['dokumen_type'] ?></td>
                  <td style="width: 80px;">
                    <div>
                    <a href="<?php echo base_url('assets/gambar/dokumen/'.$key['dokumen_file']) ?>" download><button class="btn btn-xs btn-success" type="button"><i class="fa fa-download"></i></button></a>
                    <button onclick="res()" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $key['dokumen_id'] ?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['dokumen_id'] ?>"><i class="fa fa-trash"></i></button>

                    </div>
                  </td>
                </tr>

                 <!--modal hapus-->
                    <div class="modal fade" id="modalHapus<?php echo $key['dokumen_id'] ?>">
                      <div class="modal-dialog" align="center">
                        <div class="modal-content" style="max-width: 300px;">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4>Confirmed ?</h4>
                            </div>
                          <div class="modal-body" align="center">
                             <a href="<?php echo base_url() ?>dokumen/delete/<?php echo $key['dokumen_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                             <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                          </div>
                        </div>
                      </div>
                     </div> 


                <div class="modal fade" id="modal-edit<?php echo $key['dokumen_id'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url('dokumen/update/'.$key['dokumen_id']) ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Nama Dokumen</label>
                              <input required="" type="text" name="dokumen_name" class="form-control" placeholder="Nama Dokumen" value="<?php echo $key['dokumen_name'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi Dokumen</label>
                              <textarea class="form-control" name="dokumen_deskripsi" required="" placeholder="Deskripsi"><?php echo $key['dokumen_deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Pilih File</label>
                              <input type="file" name="file" class="form-control">
                              <small class="text-danger">* isi file untuk mengganti file</small>
                            </div>
                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="reset btn btn-danger">Reset</button>
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
          <h4 class="modal-title">Upload Dokumen</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('dokumen/add') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Nama Dokumen</label>
                <input required="" type="text" name="dokumen_name" class="form-control" placeholder="Nama Dokumen">
              </div>
              <div class="form-group">
                <label>Deskripsi Dokumen</label>
                <textarea class="form-control" name="dokumen_deskripsi" required="" placeholder="Deskripsi"></textarea>
              </div>
              <div class="form-group">
                <label>Pilih File</label>
                <input required="" type="file" name="file" class="form-control">
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