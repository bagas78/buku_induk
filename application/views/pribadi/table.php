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
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($data as $key): ?>
                                
                <tr>
                  <td><?php echo @$key['user_name'] ?></td>
                  <td><?php echo @$key['user_nis'] ?></td>
                  <td><?php echo @$key['user_nisn'] ?></td>
                  <td style="width: 50px;">
                    <div>

                    <a href="<?php echo base_url('pribadi/view/'.$key['user_id']) ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button></a>

                    <a href="<?php echo base_url('pribadi/print/'.$key['user_id']) ?>"><button class="btn btn-xs btn-success"><i class="fa fa-print"></i></button></a>

                    </div>
                  </td>
                </tr>

              <?php endforeach ?>

              </tfoot>
            </table> 

        </div>
      </div>