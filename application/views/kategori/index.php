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
              <button onclick="add()" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data</button>
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
                <th width="1">Urutan</th>
                <th>Kategori Mata Pelajaran</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo $key['kategori_alpha'] ?></td>
                  <td><?php echo $key['kategori_nama'] ?></td>
                  <td style="width: 80px;">
                    <div>
                    <button onclick="edit(<?php echo $key['kategori_id'] ?>)" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['kategori_id'] ?>"><i class="fa fa-trash"></i></button>

                    </div>
                  </td>
                </tr>

                 <!--modal hapus-->
                    <div class="modal fade" id="modalHapus<?php echo $key['kategori_id'] ?>">
                      <div class="modal-dialog" align="center">
                        <div class="modal-content" style="max-width: 300px;">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4>Confirmed ?</h4>
                            </div>
                          <div class="modal-body" align="center">
                             <a href="<?php echo base_url() ?>kategori/delete/<?php echo $key['kategori_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
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

<!--trigger modal-->
<button id="modal-click" hidden="" data-toggle="modal" data-target="#modal">test</button>

  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Kategori</h4>
        </div>
        <div class="modal-body">
          <form id="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Urutan</label>
                <select required="" class="form-control" name="kategori_alpha">
                  <option id="urutan" value="" hidden="">-- Pilih --</option>
                  <?php foreach ($alpha as $a => $value): ?>
                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Kategori Mata Pelajaran</label>
                <input id="mata" required="" type="text" name="kategori_nama" class="form-control" placeholder="Kategori">
              </div>
              <div class="form-group">

                <div id="first">
                  <div class="col-md-3 col-xs-4">
                    <button type="button" onclick="clone()" class="btn btn-danger"><i class="fa fa-plus"></i></button>
                    <button type="button" onclick="remove(this,'copy')" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                  </div>
                  <div class="col-md-9 col-xs-8" style="margin-bottom: 1%;">
                    <input type="text" name="sub[]" class="form-control" placeholder="Sub Kategori">
                  </div>
                </div>

                <div id="paste"></div>

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

<!-- copy -->
  <div hidden="" id="copy">
    <div class="col-md-3 col-xs-4">
      <button type="button" onclick="clone()" class="btn btn-danger"><i class="fa fa-plus"></i></button>
      <button type="button" onclick="remove(this,'copy')" class="btn btn-danger"><i class="fa fa-minus"></i></button>
    </div>
    <div class="col-md-9 col-xs-8" style="margin-bottom: 1%;">
      <input type="text" name="sub[]" class="form-control" placeholder="Sub Kategori">
    </div>
  </div>

  <script type="text/javascript">

    // clone
    function clone() {
      var copy = $('#copy').clone().removeAttr('hidden',true);
      var value = copy.find('input').val('');
      $('#paste').append(copy);
    }
    
    //remove
    function remove(id,target){
      $(id).parents('#'+target).remove();
    }

    function add(){

      //reset value
      if ($("#form").load(location.href + " #form>*", "")) {
        
        //action
        $('#form').attr('action', '<?php echo base_url('kategori/add') ?>');

        //modal
        $('#modal-click').click();
      }

    }

    function edit(id){
      
      //reset value
      $("#form").load(location.href + " #form>*", "", function(){

          $.ajax({
            url: '<?php echo base_url('kategori/get') ?>',
            type: 'POST',
            dataType: 'json',
            data: {id: id},
          })
          .done(function(data) {

            $('#urutan').val(data.kategori_alpha).text(data.kategori_alpha);
            $('#mata').val(data.kategori_nama);

            var sub = jQuery.parseJSON(data.kategori_sub);

            var num = 0;
            for (var i = 0; i < sub.length; i++) {

              //copy and insert value
              var copy = $('#copy').clone().removeAttr('hidden',true);
              var value = copy.find('input').val(sub[i]);
              $('#paste').append(copy);
              
              num ++;
            }

            if (num == sub.length) {
              
              //hapus element copy sesudah loop            
              $('#first').empty();

              //action
              $('#form').attr('action', '<?php echo base_url('kategori/update/') ?>'+id);

              //modal
              $('#modal-click').click();
            }

          });

      });

    }
  </script>