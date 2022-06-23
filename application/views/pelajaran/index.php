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
                <th>Pelajaran</th>
                <th>Kategori</th>
                <th>KKM</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo @$key['pelajaran_nama'] ?></td>
                  <td><?php echo @$key['kategori_nama'] ?></td>
                  <td><?php echo @$key['pelajaran_kkm'] ?></td>
                  <td style="width: 50px;">
                    <div>
                    <button onclick="res()" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo @$key['pelajaran_id'] ?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo @$key['pelajaran_id'] ?>"><i class="fa fa-trash"></i></button>

                    </div>
                  </td>
                </tr>

                 <!--modal hapus-->
                    <div class="modal fade" id="modalHapus<?php echo @$key['pelajaran_id'] ?>">
                      <div class="modal-dialog" align="center">
                        <div class="modal-content" style="max-width: 300px;">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4>Confirmed ?</h4>
                            </div>
                          <div class="modal-body" align="center">
                             <a href="<?php echo base_url() ?>pelajaran/delete/<?php echo @$key['pelajaran_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                             <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                          </div>
                        </div>
                      </div>
                     </div> 


                <div class="modal fade" id="modal-edit<?php echo @$key['pelajaran_id'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url('pelajaran/update/'.@$key['pelajaran_id']) ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group"> 
                              <label>Pelajaran</label>
                              <input required="" type="text" name="pelajaran_nama" class="form-control" placeholder="Pelajaran" value="<?php echo @$key['pelajaran_nama'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Kategori</label>
                              <select id="kategori<?php echo @$key['pelajaran_id'] ?>" onchange="sub(this.value,'view_sub<?php echo @$key["pelajaran_id"] ?>')" class="form-control" required="" name="pelajaran_kategori">
                                <option value="" hidden="">-- Pilih --</option>
                                <?php foreach ($kategori_data as $kat): ?>
                                  <option value="<?php echo $kat['kategori_id'] ?>"><?php echo $kat['kategori_nama'] ?></option>
                                <?php endforeach ?>
                              </select>

                              <script type="text/javascript">
                                $('#kategori<?php echo @$key['pelajaran_id'] ?>').val(<?php echo @$key['pelajaran_kategori'] ?>).change();
                              </script>
                            </div>

                            <div class="form-group"> 
                              <label>KKM</label>
                              <input required="" type="number" name="pelajaran_kkm" class="form-control" placeholder="KKM" value="<?php echo @$key['pelajaran_kkm'] ?>">
                            </div>

                            <div id="view_sub<?php echo @$key['pelajaran_id'] ?>">

                              <?php $sub = json_decode(@$key['kategori_sub']); ?>

                              <?php if (@$sub[0] == '' || @$sub == null): ?>
                                <!--kosong-->
                                <input type="hidden" name="pelajaran_kategori_sub">
                              
                              <?php else: ?>

                                <!-- ada kategori -->
                                <label>Sub Kategori</label>
                                <select id="sub<?php echo @$key['pelajaran_id'] ?>" class="form-control" required="" name="pelajaran_kategori_sub">
                                  <?php foreach ($sub as $i => $value): ?>
                                    <option value="<?php echo $i ?>"><?php echo $value ?></option>
                                  <?php endforeach ?>
                                </select>

                                <script type="text/javascript">
                                  $('#sub<?php echo @$key['pelajaran_id'] ?>').val(<?php echo @$key['pelajaran_kategori_sub'] ?>).change();
                                </script>
                              
                              <?php endif ?>

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
          <form role="form" method="post" action="<?php echo base_url('pelajaran/add') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group"> 
                <label>Pelajaran</label>
                <input required="" type="text" name="pelajaran_nama" class="form-control" placeholder="Pelajaran">
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select onchange="sub(this.value,'view_sub')" class="form-control" required="" name="pelajaran_kategori">
                  <option value="" hidden="">-- Pilih --</option>
                  <?php foreach ($kategori_data as $kat): ?>
                    <option value="<?php echo $kat['kategori_id'] ?>"><?php echo $kat['kategori_nama'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group"> 
                <label>KKM</label>
                <input required="" type="number" name="pelajaran_kkm" class="form-control" placeholder="KKM" value="">
              </div>

              <div id="view_sub">
                <input type="hidden" name="pelajaran_kategori_sub">
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
    function sub(id,target){

      $.ajax({
        url: '<?php echo base_url('pelajaran/get') ?>',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
        var sub = jQuery.parseJSON(data.kategori_sub);

        if (!(sub == '' || sub == null)) {
          //ada
          
          var html = '';

          html += '<span>';
          html += '<div class="form-group">';
          html += '<label>Sub Kategori</label>';
          html += '<select class="form-control" required="" name="pelajaran_kategori_sub">';

          $.each(sub, function(index) {
             
             html += '<option value="'+index+'">'+sub[index]+'</option>';

          });
          
          html += '</select>';
          html += '</div>';

          $('#'+target).empty();
          $('#'+target).append(html);
          
        }else{
          html = '<input type="hidden" name="pelajaran_kategori_sub">';
          $('#'+target).empty();
          $('#'+target).append(html);
        }

      });
      
    }
  </script>