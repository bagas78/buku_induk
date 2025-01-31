<?php $level = $this->session->userdata('level'); ?>
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
 
            <div <?=($level != 3)?'':'hidden'?> align="left">
              <button title="Download template penilaian & peminatan" data-toggle="modal" data-target="#modal-template" class="btn btn-info"><i class="fa fa-chevron-down"></i> Download Template</button>
              <button title="Import excel penilaian" class="btn btn-success" onclick="modal('penilaian')"><i class="fa fa-upload"></i> Import Penilaian</button>
              <button title="Import excel peminatan" class="btn btn-success" onclick="modal('peminatan')"><i class="fa fa-upload"></i> Import Peminatan</button>
            </div>

            <?php if ($level != 3): ?>

            <form action="" method="POST">
              
              <div class="row" style="margin-top: 20px;">
                <div class="col-md-3">
                   <select class="form-control" name="nama" required id="nama">
                     <option value="" hidden>-- Nama --</option>
                     <?php foreach ($user_data as $val): ?>
                       <option value="<?=$val['user_id']?>"><?=$val['user_name']?></option>
                     <?php endforeach ?>
                   </select>
                </div>
                <div class="col-md-3">
                   <select class="form-control" name="tahun" required id="tahun">
                     <option value="" hidden>-- Tahun --</option>
                     <?php foreach ($tahun_data as $val): ?>
                       <option value="<?=$val['tahun_id']?>"><?=$val['tahun_text']?></option>
                     <?php endforeach ?>
                   </select>
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                </div>
              </div>  
              
            </form>

            <?php endif ?>
            
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <table id="example" class="table table-bordered table-hover" style="width: 100%;">
            <thead>
            <tr>
              <th>NIS</th>
              <th>Nama</th>
              <th>Semester</th>
              <th>Tahun</th>
              <th>Peminatan</th>
              <th width="60">Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
          </table>

        </div>

        
      </div>
      <!-- /.box -->

  <div class="modal fade" id="modal-template">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">DOWNLOAD TEMPLATE</h4>
        </div>
        <div class="modal-body" style="background: aliceblue;">
          
          <a href="<?php echo base_url('assets/excel/penilaian.xlsx') ?>" title="Template Excel" Download><button class="btn bg-navy"><i class="fa fa-download"></i> Download Template Penilaian</button></a>

          <a style="float: right;" href="<?php echo base_url('assets/excel/peminatan.xlsx') ?>" title="Template Excel" Download><button class="btn bg-navy"><i class="fa fa-download"></i> Download Template Peminatan</button></a>

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
          <h4 class="modal-title" id="title"></h4>
        </div>
        <div class="modal-body">
          <form id="url" role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>File Excel ( xls | xlsx )</label>
                <input required="" type="file" name="uploadFile" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Tahun</label>
                <select class="form-control" name="penilaian_tahun" required id="tahun">
                   <option value="" hidden>-- Tahun --</option>
                   <?php foreach ($tahun_data as $val): ?>
                     <option value="<?=$val['tahun_id']?>"><?=$val['tahun_text']?></option>
                   <?php endforeach ?>
                 </select>
               </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer" style="background: aliceblue;">
              <button type="submit" class="btn btn-primary">Submit</button>
               <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--modal hapus-->
  <div class="modal fade" id="modal-delete">
    <div class="modal-dialog" align="center">
      <div class="modal-content" style="max-width: 300px;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4>Confirmed ?</h4>
          </div>
        <div class="modal-body" align="center">
           <a id="modal-delete-url"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
           <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
        </div>
      </div>
    </div>
   </div> 

  <!--modal upload-->
  <div class="modal fade" id="modal-upload">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">File Raport</h4>
        </div>
        <div class="modal-body">
          <form id="url-upload" role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">

              <?php if ($level != 3): ?>
                
                 <div class="form-group">
                  <label>Scan ( jpg | jpeg | png )</label>
                  <input required="" type="file" name="file" class="form-control" placeholder="Nama Lengkap">
                </div>

                <small style="background: black;color: white;padding: 1%;">Maksimal ukuran 2MB</small>
                <div class="clearfix"></div><br/>

              <span id="img-upload"></span>

            </div>
            <!-- /.box-body -->

              <div class="box-footer" style="background: aliceblue;">
                <button type="submit" class="btn btn-primary">Submit</button>
                 <button type="reset" class="btn btn-danger">Reset</button>
              </div>

            <?php endif ?>

          </form>
        </div>
      </div>
    </div>

<script type="text/javascript">

    //post to serverside
    $('#nama').val('<?=@$post_nama?>').change();
    $('#tahun').val('<?=@$post_tahun?>').change();


    $(document).ready(function() {

      var table;
      
      <?php if($level == 3):?>
        var nama = '<?=$this->session->userdata('id')?>';
      <?php else:?>
        var nama = $('#nama').val();
      <?php endif?>
      
      var tahun = $('#tahun').val();

        //datatables
        table = $('#example').DataTable({ 

            "responsive"  : true,
            "scrollX"     : true,
            "processing"  : true, 
            "serverSide"  : true,
            "order"       :[],  
            
            "ajax": {
                "url": '<?= base_url('penilaian/get_data/'); ?>'+nama+'/'+tahun,
                "type": "GET"
            },
            "columns": [    
                        { "data": "user_nis"},                           
                        { "data": "user_name"},
                        { "data": "penilaian_semester"},
                        { "data": "tahun_text"},
                        { "data": "penilaian_id",
                        "render": 
                        function( data ) {
                            return "<span hidden class='peminatan_id'>"+data+"</span><span class='peminatan'></span>";
                          }
                        },
                        { "data": "penilaian_id",
                        "render": 
                        function( data, type, row, meta ) {
                            return "<a href='<?php echo base_url('penilaian/view/')?>"+data+"'><button class='btn btn-xs btn-success' title='Lihat Hasil Penilaian'><i class='fa fa-file-text'></i></button></a> "+
                            "<a <?=($this->session->userdata('level') == 3)?'hidden':''?> href='<?php echo base_url('penilaian/nilai/')?>"+data+"'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' title='Edit Penilaian'></i></button></a> "+
                            "<button title='Upload File Raport' onclick='modal_upload("+data+")' class='btn btn-xs btn-info'><i class='fa fa-upload' title='Upload File Raport'></i></button>";
                          }
                        },
                       
                    ],
        });

    });

function modal(jenis){

  //popup modal
  $('#modal-import').modal('toggle');

  if (jenis == 'penilaian') {

    $('#title').text('Import Penilaian');
    $('#url').attr('action', '<?php echo base_url('penilaian/import') ?>');

  }else{

    $('#title').text('Import Peminatan');
    $('#url').attr('action', '<?php echo base_url('penilaian/peminatan') ?>');

  }

}

$('#example').on( 'init.dt', function () { 

  $.each($('.peminatan'), function(index, val) {
     var id = $(this).closest('tr').find('.peminatan_id').text();
     var cek = $(this).closest('tr').find('.peminatan').html();
     var target = $(this);

     $.get('<?=base_url('penilaian/peminatan_get/')?>'+id, function(data) {
       
        if (data == 1) {

           var btn = '<button title="Hapus Data Peminatan" onclick="del_peminatan('+id+')" class="btn-hps btn btn-danger btn-xs">Hapus <i class="fa fa-times"></i></button>';

           if (cek == '') {

              target.html(btn);
           }
        }else{

          target.text('Kosong');
        }

     });

  });

});

//delete peminatan
function del_peminatan(id){
  
  $('#modal-delete-url').attr('href', '<?php echo base_url() ?>penilaian/peminatan_delete/'+id);
  $('#modal-delete').modal('toggle');
}

//upload scan
function modal_upload(id){

  var target = $('#img-upload');
  target.empty();

  $.get('<?=base_url('penilaian/get_upload/')?>'+id, function(data) {

    var val = jQuery.parseJSON(data);
    var file = val.penilaian_file;
    var url = '<?=base_url('assets/gambar/penilaian/')?>'+file;

    if (file != '') {

      var img = '';
      img += '<a href="'+url+'" target="_BLANK"><img title="Klik untuk memperbesar" class="img img-thumbnail" src="'+url+'" width="150"></a>';

      <?php if($level != 3): ?>

        img += '<br/><a href="<?=base_url('penilaian/delete/')?>'+id+'/'+file+'"><button title="Hapus File Raport" type="button" style="margin-top: 5px" class="btn btn-danger btn-xs">Hapus file <i class="fa fa-times"></i></button></a>';
      
      <?php else: ?>

        img += '<br/><a href="'+url+'" download><button title="Hapus File Raport" type="button" style="margin-top: 5px" class="btn btn-success btn-xs">Download file <i class="fa fa-download"></i></button></a>';

      <?php endif ?>

      target.html(img);

    }

  });
  
  $('#url-upload').attr('action', '<?php echo base_url() ?>penilaian/upload_raport/'+id);
  $('#modal-upload').modal('toggle');
}

</script>