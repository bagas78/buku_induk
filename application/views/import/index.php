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
              <a href="<?php echo base_url('assets/excel/template.xlsx') ?>" title="Template Excel" Download><button class="btn btn-primary"><i class="fa fa-download"></i> Download Template</button></a>
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-album"><i class="fa fa-upload"></i> Upload Excel</button>
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
                <th>Nama Lengkap</th>
                <th>Umur</th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo $key['import_nama'] ?></td>
                  <td><?php echo $key['import_umur'] ?></td>
                  <td><?php echo $key['import_tinggi'] ?></td>
                  <td><?php echo $key['import_berat'] ?></td>
                  <td style="width: 50px;">
                    <div>
                    
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['import_id'] ?>"><i class="fa fa-trash"></i></button>

                    </div>
                  </td>
                </tr>

                <!--modal hapus-->
                <div class="modal fade" id="modalHapus<?php echo $key['import_id'] ?>">
                  <div class="modal-dialog" align="center">
                    <div class="modal-content" style="max-width: 300px;">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4>Confirmed ?</h4>
                        </div>
                      <div class="modal-body" align="center">
                         <a href="<?php echo base_url() ?>import/delete/<?php echo $key['import_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                         <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                      </div>
                    </div>
                  </div>
                </div> 

              <?php endforeach ?>

              </tfoot>
            </table>

        </div>
      </div>
  </div>

  <div class="modal fade" id="modal-album">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload Excel</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('import/add') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Pilih File</label>
                <input required="" type="file" name="uploadFile" class="form-control">
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