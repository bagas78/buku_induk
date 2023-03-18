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
                <th>Nama</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Status</th>
                <th>Alasan</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo @$key['user_name'] ?></td>
                  <td><?php echo @$key['user_nis'] ?></td>
                  <td><?php echo @$key['user_nisn'] ?></td>
                  <td><?php echo @$key['user_status'] ?></td>
                  <td><?php echo @$key['user_alasan'] ?></td>
                  <td style="width: 110px;">
                    <div>

                    <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-status<?php echo $key['user_id'] ?>"><i class="fa fa-edit"></i></button>

                    <a href="<?php echo base_url('pribadi/print/'.$key['user_id']) ?>"><button class="btn btn-xs btn-success"><i class="fa fa-print"></i></button></a>

                    <a href="<?php echo base_url('pribadi/view/'.$key['user_id']) ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button></a>

                    <a href="<?php echo base_url('pribadi/penilaian/'.$key['user_id']) ?>"><button type="button" class="btn btn-xs btn-warning"><i class="fa fa-file-text"></i></button></a>

                    </div>
                  </td>
                </tr>

                <div class="modal fade" id="modal-status<?php echo @$key['user_id'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Ubah Status</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url('pribadi/status/'.@$key['user_id']) ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Status</label>
                              <select onchange="status(this.value,'<?php echo $key['user_id'] ?>')" id="status<?php echo $key['user_id'] ?>" name="user_status" required="" class="form-control">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="aktif">Aktif</option>
                                <option value="keluar">Keluar</option>
                                <option value="mengundurkan">Mengundurkan Diri</option>
                                <option value="meninggal">Meninggal</option>
                              </select>
                              <script type="text/javascript">
                                $('#status<?php echo $key['user_id'] ?>').val('<?php echo $key['user_status'] ?>').change();
                              </script>
                            </div>
                            <div class="form-group">
                              <label>Alasan</label>
                              <textarea <?=($key['user_status'] == 'aktif')?'readonly=""':''?> id="alasan<?php echo $key['user_id'] ?>" required="" class="form-control" name="user_alasan"><?php echo $key['user_alasan'] ?></textarea>
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

<script type="text/javascript">
  function status(val,id){

    if (val == 'aktif') {
      $('#alasan'+id).attr('readonly', '');
      $('#alasan'+id).val('-');
    }else{
      $('#alasan'+id).removeAttr('readonly', '');
      $('#alasan'+id).val('');
    }
  }
</script>