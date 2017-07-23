 <?php
    $username = ($this->session->userdata['logged_in']['username']);
    $firstname = ($this->session->userdata['logged_in']['firstname']);
    $lastname = ($this->session->userdata['logged_in']['lastname']);
    $position = ($this->session->userdata['logged_in']['position']);
    $email = ($this->session->userdata['logged_in']['email']);
    $contact_no = ($this->session->userdata['logged_in']['contact_no']);

?>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="row">
	  <div class="col-md-3">
	            <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Admin</h3>
			  <div class="col-sm-offset-2 col-sm-3">
					  <button type="submit" class="btn btn-default">Choose picture</button>
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
            </ul>
             <form action="#" id="form" class="form-horizontal">
          <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputName" name="first_name" placeholder="<?php echo $firstname ?>">
                    </div>
                  </div>

                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputName" name="last_name" placeholder="<?php echo $lastname ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="<?php echo $email ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Contact no</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputName" name="contact_no" placeholder="<?php echo $contact_no ?>">
                    </div>
                  </div>

				           <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="password">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="inputPasswordAgain" name="con_password" placeholder="password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-9">
					  <button type="button" class="btn btn-success">Cancel</button>
                      <button type="submit" id="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              </form>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
	</section>
</div>