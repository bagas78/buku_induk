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
              <button class="btn btn-danger" data-toggle="modal" data-target="#modal-album"><i class="fa fa-plus"></i> Tambah Data</button>

              <a href="<?php echo base_url('assets/excel/siswa.xlsx') ?>" title="Template Excel" Download><button class="btn btn-warning"><i class="fa fa-download"></i> Download Template</button></a>
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-import"><i class="fa fa-upload"></i> Upload Excel</button>

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
                <th>NIS</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo @$key['user_nis'] ?></td>
                  <td><?php echo @$key['user_name'] ?></td>
                  <td><?php echo @$key['user_nisn'] ?></td>
                  <td><?php echo @$key['user_email'] ?></td>
                  <td style="width: 50px;">
                    <div>
                    <button onclick="res()" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo @$key['user_id'] ?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo @$key['user_id'] ?>"><i class="fa fa-trash"></i></button>

                    </div>
                  </td>
                </tr>

                 <!--modal hapus-->
                    <div class="modal fade" id="modalHapus<?php echo @$key['user_id'] ?>">
                      <div class="modal-dialog" align="center">
                        <div class="modal-content" style="max-width: 300px;">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4>Confirmed ?</h4>
                            </div>
                          <div class="modal-body" align="center">
                             <a href="<?php echo base_url() ?>siswa/delete/<?php echo @$key['user_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                             <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                          </div>
                        </div>
                      </div>
                     </div> 


                <div class="modal fade" id="modal-edit<?php echo @$key['user_id'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url('siswa/update/'.@$key['user_id']) ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Nama</label>
                              <input required="" type="text" name="user_name" class="form-control" placeholder="Nama Lengkap" value="<?php echo @$key['user_name'] ?>">
                            </div>
                            <div class="form-group">
                              <label>NIS</label>
                              <input required="" type="number" name="user_nis" class="form-control" placeholder="Nomor Induk Siswa Sekolah" value="<?php echo @$key['user_nis'] ?>">
                            </div>
                            <div class="form-group">
                              <label>NISN</label>
                              <input required="" type="number" name="user_nisn" class="form-control" placeholder="Nomor Induk Siswa Nasional" value="<?php echo @$key['user_nisn'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input required="" type="text" name="user_email" class="form-control" placeholder="Email" value="<?php echo @$key['user_email'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Pasword</label>
                              <input type="password" name="user_password" class="form-control" placeholder="Password" value="">
                              <small class="text-danger">* isi jika ingin mengganti password</small>
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
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('siswa/add') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <input required="" type="text" name="user_name" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>NIS</label>
                <input required="" type="number" name="user_nis" class="form-control" placeholder="Nomor Induk Siswa Sekolah">
              </div>
              <div class="form-group">
                <label>NISN</label>
                <input required="" type="number" name="user_nisn" class="form-control" placeholder="Nomor Induk Siswa Nasional">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input required="" type="text" name="user_email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <label>Pasword</label>
                <input required="" type="password" name="user_password" class="form-control" placeholder="Password" value="">
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


  <div class="modal fade" id="modal-import">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload File</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('siswa/import') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>File Excel ( xls | xlsx )</label>
                <input required="" type="file" name="uploadFile" class="form-control" placeholder="Nama Lengkap">
              </div>

              <small style="background: black;color: white;padding: 1%;">NOTE : untuk password default sama dengan NIS</small>

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
   function res(){
    $('.reset').click();
   }
  </script>