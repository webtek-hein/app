
<?php
    $username = ($this->session->userdata['logged_in']['username']);
    $firstname = ($this->session->userdata['logged_in']['firstname']);
    $lastname = ($this->session->userdata['logged_in']['lastname']);
    $position = ($this->session->userdata['logged_in']['position']);
    $email = ($this->session->userdata['logged_in']['email']);
    $contact_no = ($this->session->userdata['logged_in']['contact_no']);
    $password = ($this->session->userdata['logged_in']['password']);

?>

<script>
function relocate_home()
{
     location.href = "index.php";
}
</script>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="row">
	  <div class="col-md-3">
          <!-- Profile Image -->
          <?php echo form_open_multipart('profile/upload_image'); ?>
          <div class="box box-primary">

              <div class="box-body box-profile">
                  <?php if($this->session->flashdata('msg')): ?>
                      <br><p><?php echo $this->session->flashdata('msg'); ?></p>
                  <?php endif; ?>

                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>/images/<?php// echo $image->image?>" alt="User profile picture">

                  <h3 class="profile-username text-center"><?php echo $firstname.','.$lastname ?></h3>
                  <div class="col-sm-offset-0 col-sm-5">
                      <input type="file" name="userfile" size="20" />
                      <input type="submit" name="upload" value="Upload" />
                  </div>
              </div>
          </div>
          <!-- /.box -->
		</div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="" data-toggle="tab">Update Profile</a></li>

              <?php if($this->session->flashdata('msg')): ?>
                <br><p><?php echo $this->session->flashdata('msg'); ?></p>
              <?php endif; ?>
            </ul>

             <div class="form-horizontal">
          <div class="tab-pane" id="settings">
              <?php echo validation_errors(); ?>
              <?php echo form_open('profile/profile_update'); ?>

<form>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" required="required" class="form-control" id="inputName" name="first_name" value="<?php echo $firstname ?>">
                    </div>
                  </div>

                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="text" required="required" class="form-control" id="inputName" name="last_name" value="<?php echo $lastname ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" required="required" class="form-control" id="inputEmail" name="email" value="<?php echo $email ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label" >Contact no</label>

                    <div class="col-sm-9">
                      <input type="text" required="required" pattern="^(09|\+639)\d{9}$" class="form-control" id="inputName" name="contact_no" value="<?php echo $contact_no ?>">
                    </div>
                  </div>
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-9">
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
    </div>
</form>
          </div>
             </div>
          </div>
        </div>

    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="" data-toggle="tab">Update Profile</a></li>

                <?php if($this->session->flashdata('msg')): ?>
                    <br><p><?php echo $this->session->flashdata('msg'); ?></p>
                <?php endif; ?>
            </ul>

            <div class="form-horizontal">
                <div class="tab-pane" id="settings">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('profile/changepass'); ?>


				           <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-9">
                      <input type="password" required="required" class="form-control" name="old_password" placeholder="old password">
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="password"  required=required class="form-control" name="new_password" placeholder="password">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Confirm New Password</label>
                    <div class="col-sm-9">
                      <input type="password" required="required" class="form-control" id="inputPasswordAgain" name="con_new_password" placeholder="password">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-9">
                        <button type="submit" class="btn btn-primary" >Save</button>
                    </div>
                  </div>

          </div>
        </div>
      </div>
    </div>
    </section>
  </div>
