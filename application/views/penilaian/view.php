<style type="text/css">
  .next{
    border: 1px solid #ccc;
    width: 50px;
    margin-left: 20px;
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

    <div class="print-body">

      <table class="table table-bordered table-responssive table-striped">
        <tr>
          <td>Nama Peserta Didik</td>
          <td><?php echo @$user_data['user_name'] ?></td>
        </tr>
        <tr>
          <td>Nomor Induk Siswa Nasional</td>
          <td><?php echo @$user_data['user_nisn'] ?></td>
        </tr>
        <tr>
          <td>Nomor Induk Siswa Sekolah</td>
          <td><?php echo @$user_data['user_nis'] ?></td>
        </tr>
        <tr>
          <td>Tahun Pelajaran</td>
          <td><?php echo @$tahun_data['tahun_text'] ?></td>
        </tr>
        <tr>
          <td>Semester</td>
          <td><?php echo @$semester ?></td>
        </tr>
      </table>

      <img class="file" hidden="" style="width: 100%;" src="<?php echo base_url('assets/gambar/penilaian/'.@$data['penilaian_file']) ?>">

      <br/>

      <table id="table" class="table table-bordered table-responssive">
        
        <tr>
          <td rowspan="3" style="vertical-align: middle;">NO</td>
          <td rowspan="3" style="vertical-align: middle;">Mata Pelajaran</td>
          <td rowspan="3" style="vertical-align: middle;">KKM</td>
          <td colspan="2" align="center">NP</td>
          <td colspan="2" align="center">NK</td>
          <td>NSS</td>
        </tr>
        <tr>
          <td>ANGKA</td>
          <td>PREDIKAT</td>
          <td>ANGKA</td>
          <td>PREDIKAT</td>
          <td>DALAM MAPEL</td>
        </tr>
        <tr>
          <td>1 - 100</td>
          <td>A/B/C/D</td>
          <td>1 - 100</td>
          <td>A/B/C/D</td>
          <td>SB/B/C/K</td>
        </tr>

      <?php foreach ($kategori_data as $kat): ?>
        
        <tr style="font-weight: bold; background: #f4f4f4;">
          <td><?php echo $kat['kategori_alpha'] ?></td>
          <td colspan="7"><?php echo $kat['kategori_nama'] ?></td>
        </tr>

        <?php if ($kat['kategori_sub'] == ''): ?>
        <!-- tanpa sub -->

          <?php foreach ($pelajaran_data as $pel): ?>

            <?php if ($pel['pelajaran_kategori'] == $kat['kategori_id']): ?>

              <tr>
                <td class="no"></td>
                <td><?php echo $pel['pelajaran_nama'] ?></td>
                <td><?php echo $pel['pelajaran_kkm'] ?></td>
                <td id="<?php echo $pel['pelajaran_id'] ?>_np_angka"></td>
                <td id="<?php echo $pel['pelajaran_id'] ?>_np_predikat"></td>
                <td id="<?php echo $pel['pelajaran_id'] ?>_nk_angka"></td>
                <td id="<?php echo $pel['pelajaran_id'] ?>_nk_predikat"></td>
                <td id="<?php echo $pel['pelajaran_id'] ?>_nss_mapel"></td>
              </tr>

              <?php endif ?>

          <?php endforeach ?>

        <?php else: ?>
        <!-- dengan sub -->

            <?php $arr = json_decode($kat['kategori_sub'], true); ?>

            <?php foreach ($arr as $key => $value): ?>
              
              <tr style="font-weight: bold; background: #faebd778;">
                <td><?php echo $kat['kategori_alpha'].''.($key+1) ?></td>
                <td colspan="7"><?php echo $value ?></td>
              </tr>

              <?php $no = 1 ?>
              <?php foreach ($pelajaran_data as $pel): ?>

                <?php if ($pel['pelajaran_kategori'] == $kat['kategori_id'] && $pel['pelajaran_kategori_sub'] == $key): ?>
                  
                  <tr>
                    <td class="no"></td>
                    <td><?php echo $pel['pelajaran_nama'] ?></td>
                    <td><?php echo $pel['pelajaran_kkm'] ?></td>
                    <td id="<?php echo $pel['pelajaran_id'].'_'.$pel['pelajaran_kategori_sub'] ?>_np_angka"></td>
                    <td id="<?php echo $pel['pelajaran_id'].'_'.$pel['pelajaran_kategori_sub'] ?>_np_predikat"></td>
                    <td id="<?php echo $pel['pelajaran_id'].'_'.$pel['pelajaran_kategori_sub'] ?>_nk_angka"></td>
                    <td id="<?php echo $pel['pelajaran_id'].'_'.$pel['pelajaran_kategori_sub'] ?>_nk_predikat"></td>
                    <td id="<?php echo $pel['pelajaran_id'].'_'.$pel['pelajaran_kategori_sub'] ?>_nss_mapel"></td>
                  </tr>

                <?php endif ?>

              <?php $no++ ?>
              <?php endforeach ?>

            <?php endforeach ?>

        <?php endif ?>

      <?php endforeach ?>

      <tr>
        <td colspan="8" style="font-weight: bold; background: aliceblue;">JUMLAH NILAI</td>
      </tr>
      <tr>
        <td colspan="2">RATA-RATA</td>
        <td></td>
        <td id="np_rata"></td>
        <td></td>
        <td id="nk_rata"></td>
        <td></td>
        <td></td>
      </tr>

    </table>

    </div>

      <hr/>
      
      <button type="button" class="btn btn-success" onclick="(preview())">Print <i class="fa fa-print"></i></button>

    </div>
  </div>

<script type="text/javascript">

  <?php if ($data['penilaian_type'] == 'file'): ?>
      
    //hidden
    $('.file').removeAttr('hidden', true);
    $('#table').attr('hidden', true);
  
  <?php else: ?>

    //hidden
    $('#table').removeAttr('hidden', true);
    $('.file').attr('hidden', true);

  <?php endif ?>

  //no urut
  $('.no').each(function(index, el) {
    
    var i = index + 1;
    $(this).html(index + 1);

  });

  <?php $parse = json_decode($data['penilaian_data'], true) ?>

  <?php $np_rata = 0; ?>
  <?php $np_rata_sub = 0; ?>
  <?php $nk_rata = 0; ?>
  <?php $nk_rata_sub = 0; ?>
  <?php $i = 0; ?>

  <?php foreach ($pelajaran_data as $pel): ?>

    <?php 
    
      $pel_id = $pel['pelajaran_id']; 
      $pel_kategori_sub = $pel['pelajaran_kategori_sub'];

    ?>

    //// non sub ////

    //np_nilai
    $('#<?php echo $pel_id ?>_np_angka').html('<?php echo @$parse[$pel_id.'_np_angka'] ?>');

    //np_predikat
    $('#<?php echo $pel_id ?>_np_predikat').html('<?php echo @$parse[$pel_id.'_np_predikat'] ?>');

    //nk_nilai
    $('#<?php echo $pel_id ?>_nk_angka').html('<?php echo @$parse[$pel_id.'_nk_angka'] ?>');

    //nk_predikat
    $('#<?php echo $pel_id ?>_nk_predikat').html('<?php echo @$parse[$pel_id.'_nk_predikat'] ?>');

    //nss_mapel
    $('#<?php echo $pel_id ?>_nss_mapel').html('<?php echo @$parse[$pel_id.'_nss_mapel'] ?>');


    //// sub ////

    //np_nilai
    $('#<?php echo $pel_id.'_'.$pel_kategori_sub ?>_np_angka').html('<?php echo @$parse[$pel_id.'_'.$pel_kategori_sub.'_np_angka'] ?>');

    //np_predikat
    $('#<?php echo $pel_id.'_'.$pel_kategori_sub ?>_np_predikat').html('<?php echo @$parse[$pel_id.'_'.$pel_kategori_sub.'_np_predikat'] ?>');

    //nk_nilai
    $('#<?php echo $pel_id.'_'.$pel_kategori_sub ?>_nk_angka').html('<?php echo @$parse[$pel_id.'_'.$pel_kategori_sub.'_nk_angka'] ?>');

    //nk_predikat
    $('#<?php echo $pel_id.'_'.$pel_kategori_sub ?>_nk_predikat').html('<?php echo @$parse[$pel_id.'_'.$pel_kategori_sub.'_nk_predikat'] ?>');

    //nss_mapel
    $('#<?php echo $pel_id.'_'.$pel_kategori_sub ?>_nss_mapel').html('<?php echo @$parse[$pel_id.'_'.$pel_kategori_sub.'_nss_mapel'] ?>');

    //rata - rata
    <?php $np_rata += @$parse[$pel_id.'_np_angka']; ?>
    <?php $np_rata_sub += @$parse[$pel_id.'_'.$pel_kategori_sub.'_np_angka']; ?>

    <?php $nk_rata += @$parse[$pel_id.'_nk_angka']; ?>
    <?php $nk_rata_sub += @$parse[$pel_id.'_'.$pel_kategori_sub.'_nk_angka']; ?>

    <?php $i++; ?>

  <?php endforeach ?>

  $('#np_rata').html('<?php echo round(($np_rata + $np_rata_sub) / $i) ?>');
  $('#nk_rata').html('<?php echo round(($nk_rata + $nk_rata_sub) / $i) ?>');

  //print
  function preview(){
    $('.print-body').printThis();
  }

</script>