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
              <a href="<?php echo base_url('assets/excel/penilaian.xlsx') ?>" title="Template Excel" Download><button class="btn btn-warning"><i class="fa fa-download"></i> Download Template</button></a>
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-import"><i class="fa fa-upload"></i> Upload Excel</button>
            </div>

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
              <th>Nama</th>
              <th>Semester</th>
              <th>Tahun</th>
              <th width="30">Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
          </table>

        </div>

        
      </div>
      <!-- /.box -->

  <div class="modal fade" id="modal-import">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('penilaian/import') ?>" enctype="multipart/form-data">
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
                        { "data": "user_name"},
                        { "data": "penilaian_semester"},
                        { "data": "tahun_text"},
                        { "data": "penilaian_id",
                        "render": 
                        function( data, type, row, meta ) {
                            return "<a href='<?php echo base_url('penilaian/view/')?>"+data+"'><button class='btn btn-xs btn-success'><i class='fa fa-file-text'></i></button></a> "+
                            "<a <?=($this->session->userdata('level') == 3)?'hidden':''?> href='<?php echo base_url('penilaian/nilai/')?>"+data+"'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil'></i></button></a> ";
                          }
                        },
                       
                    ],
        });

    });

</script>