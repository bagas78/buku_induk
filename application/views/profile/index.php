
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

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if (@$data[0]['user_foto'] == ''): ?>
                <img class="profile-user-img img-responsive" src="<?php echo base_url() ?>assets/gambar/user/no.jpg" alt="User profile picture" style="margin-bottom: 5%;">
              <?php else: ?>
                <img class="profile-user-img img-responsive" src="<?php echo base_url() ?>assets/gambar/user/<?php echo @$data[0]['user_foto']; ?>" alt="User profile picture" style="margin-bottom: 5%;">
              <?php endif ?>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>User Name</b> 
                  <br/>
                  <a><?php echo @$data[0]['user_name']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> 
                  </br>
                  <a><?php echo @$data[0]['user_email']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Position</b> 
                  </br>
                  <a><?php echo @$data[0]['detail_jabatan']; ?></a>
                </li>
              </ul>

            </div>
          </div>

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
               <?php echo @$data[0]['detail_pendidikan']; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted"><?php echo @$data[0]['detail_alamat']; ?></p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Biodata</strong>

              <p><?php echo @$data[0]['detail_biodata']; ?></p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
              <li><a href="#security" data-toggle="tab">Security</a></li>
            </ul>
            <div class="tab-content">
               <!-- /.tab-pane -->

              <div class="active  tab-pane" id="settings">
                <form method="post" action="<?php echo base_url('profile/update/'.$this->session->userdata('id')) ?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">User Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" value="<?php echo @$data[0]['user_name']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" value="<?php echo @$data[0]['user_email']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Position</label>

                    <div class="col-sm-10">
                      <input type="text" name="position" class="form-control" value="<?php echo @$data[0]['detail_jabatan']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Education</label>
                    <div class="col-sm-10">
                      <input type="text" name="education" class="form-control" value="<?php echo @$data[0]['detail_pendidikan']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" name="address" class="form-control" value="<?php echo @$data[0]['detail_alamat']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Biodata</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="biodata"><?php echo @$data[0]['detail_biodata']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Foto profile</label>
                    <div class="col-sm-10">
                     <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required=""> I agree to the <a>terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="security">
               
                <form id="form" method="post" action="<?php echo base_url('profile/update_password/'.$this->session->userdata('id')) ?>" class="form-horizontal">

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Old Password</label>

                    <div class="col-sm-9">
                      <input type="password" id="oldpass" class="form-control" value="<?php echo @$data[0]['user_password']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">New Password</label>

                    <div class="col-sm-9">
                      <input type="password" id="newpass" name="newpass" class="pass form-control" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="password" id="confpass" name="confpass" class="pass form-control" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <div class="checkbox">
                        <label>
                          <input id="view" type="checkbox" value="1" onclick="pass()"> View password
                        </label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <a onclick="submit()" class="btn btn-success">Submit</a>
                      <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                  </div>
                </form>
                
                <script type="text/javascript">
                    function submit(){
                      var oldpass = $('#oldpass').val();
                      var newpass = $('#newpass').val();
                      var confpass = $('#confpass').val();

                      if (newpass == confpass) {
                         if (oldpass == newpass) {
                            alert('"password lama" dan "password baru" tidak boleh sama');
                         }
                         else{
                            $('#form').trigger('submit');
                         }
                      }
                      else{
                        alert('Periksa kembali inputan "password"');
                      }

                    }
                    function pass(){

                      if ($('#view').val() == 1) {
                        $('.pass').attr('type','text');
                        $('#view').val('0');
                      }
                      else{
                        $('.pass').attr('type','password');
                        $('#view').val('1');
                      }
                      
                    }
                  </script>

              </div>

            </div>
          </div>
        </div>
      </div>
      
    </section>