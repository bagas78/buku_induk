<style type="text/css">
  .x{
    background: whitesmoke;
    padding: 1%;
  }
  .title{
    font-weight: 600;
    background: darkgray;
    width: fit-content;
    padding: 0.8%;
    border-radius: 20px;
    color: white;
    margin-bottom: 2%;
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

          <div align="center"><h4 class="title">SEMESTER <?php echo @$semester ?></h4></div>
         
          <form method="POST" action="<?php echo base_url('penilaian/save') ?>" enctype="multipart/form-data">

            <!--hidden-->
            <input type="hidden" name="semester" value="<?php echo @$semester ?>">
            <input type="hidden" name="user" value="<?php echo @$user ?>">
            <input type="hidden" name="status" value="<?php echo @$status ?>">

            <div class="col-md-4 row">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label id="label-text" onclick="set('text')" class="btn btn-default active">
                <input id="input-text" class="switch" type="radio" name="type" value="text" autocomplete="off" checked=""> 
                  Text
                </label>
                <label id="label-file" onclick="set('file')" class="btn btn-default">
                <input id="input-file" class="switch" type="radio" name="type" value="file" autocomplete="off"> 
                  File
                </label>
              </div>
            </div>

            <div class="clearfix"></div><br/>

            <div id="file" hidden="">

              <h4 class="x">Masukan file Scan nilai semester</h4>

              <div class="form-group col-md-12 row">
                <label>( jpg, jpeg, png, gif )</label>
                <input class="form-control" type="file" name="file">

                <br/>

                <?php if (@GetImageSize(base_url('assets/gambar/penilaian/').@$data['penilaian_file'])): ?>
                  
                  <a href="<?php echo base_url('assets/gambar/penilaian/'.@$data['penilaian_file']) ?>" target="_BLANK"><button type="button" class="btn btn-xs btn-success">view <i class="fa fa-eye"></i></button></a>
                  <button onclick="del('<?php echo @$data['penilaian_file'] ?>')" type="button" class="btn btn-xs btn-danger">hapus <i class="fa fa-trash"></i></button>

                <?php endif ?>

              </div>
            </div>

            <div class="clearfix"></div>

            <div id="text">

              <h4 class="x">NP : Nilai Pengetahuan</h4>

              <div class="form-group col-md-5 row">
                <label>ANGKA 1 - 100</label>
                <input class="form-control" type="number" name="np_nilai" value="<?php echo @$data['penilaian_np_nilai'] ?>">
              </div>

              <div class="clearfix"></div>
              
              <div class="form-group col-md-5 row">
                <label>PREDIKAT A/B/C/D</label>
                <select id="np_predikat" class="form-control" name="np_predikat">
                  <option value="" hidden="">-- Pilih --</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>

                <script type="text/javascript">
                  $('#np_predikat').val('<?php echo $data['penilaian_np_predikat'] ?>').change();
                </script>

              </div>

              <div class="clearfix"></div>

              <h4 class="x">NK : Nilai Keterampilan</h4>

              <div class="form-group col-md-5 row">
                <label>ANGKA 1 - 100</label>
                <input class="form-control" type="number" name="nk_nilai" value="<?php echo $data['penilaian_nk_nilai'] ?>">
              </div>

              <div class="clearfix"></div>
              
              <div class="form-group col-md-5 row">
                <label>PREDIKAT A/B/C/D</label>
                <select id="nk_predikat" class="form-control" name="nk_predikat">
                  <option value="" hidden="">-- Pilih --</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>

                <script type="text/javascript">
                  $('#nk_predikat').val('<?php echo $data['penilaian_nk_predikat'] ?>').change();
                </script>

              </div>

              <div class="clearfix"></div>

              <h4 class="x">NSSS : Nilai Sikap Spiritual dan Sosial</h4>
              
              <div class="form-group col-md-5 row">
                <label>DALAM MAPEL SB/B/C/K</label>
                <select id="nsss_mapel" class="form-control" name="nsss_mapel">
                  <option value="" hidden="">-- Pilih --</option>
                  <option value="SB">SB</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="K">K</option>
                </select>

                <script type="text/javascript">
                  $('#nsss_mapel').val('<?php echo $data['penilaian_nss_mapel'] ?>').change();
                </script>

              </div>

            </div>

            <div class="clearfix"></div><br/>

            <div class="form-group col-md-12 row">
              <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-check"></i></button>
              <a href="<?php echo base_url('penilaian') ?>"><button type="button" class="btn btn-danger">Batal <i class="fa fa-times"></i></button></a>
            </div>
            
          </form>

        </div>
      </div>

<script type="text/javascript">

  <?php if ($data['penilaian_type'] == 'file'): ?>
      
    //hidden
    $('#file').removeAttr('hidden', true);
    $('#text').attr('hidden', true);

    //active
    $('#label-text').removeClass('active');
    $('#label-file').addClass('active');

    //cheked
    $('#input-text').removeAttr('checked',true);
    $('#input-file').attr('checked',true);
  
  <?php else: ?>

    //hidden
    $('#text').removeAttr('hidden', true);
    $('#file').attr('hidden', true);

    //active
    $('#label-file').removeClass('active');
    $('#label-text').addClass('active');

    //cheked
    $('#input-file').removeAttr('checked',true);
    $('#input-text').attr('checked',true);
    
  <?php endif ?>

  function set(val){

    if (val == 'file') {
      $('#file').removeAttr('hidden', true);
      $('#text').attr('hidden', true);
    }else{
      $('#text').removeAttr('hidden', true);
      $('#file').attr('hidden', true);
    }

  }

  //delete file 
  function del(name){
    
    var confirmText = "Yakin hapus, file yang di hapus tidak dapat di kembalikan?";

    if(confirm(confirmText)) {
      $.ajax({
        url: '<?php echo base_url('penilaian/delete') ?>',
        type: 'POST',
        dataType: 'json',
        data: {name: name},
      })
      .done(function(response) {
        
        if (response == 1) {
          
          $("#file").load(location.href+" #file>*","");

        }

      });
  
    }
  return false;
    
  }
</script>