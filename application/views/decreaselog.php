    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-x:auto; width:auto;">
            <div class="box-header">
              <h3 class="box-title">Distribution</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="decrease_log" class="table table-bordered table-striped" width="100%">
                <thead>

                <tr>
                  <th>Department</th>
                  <th> Item name</th>
                    <th>Description</th>
                    <th> Quantity</th>
                    <th>Unit</th>
                    <th>Type</th>
                    <th> Date</th>
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if($position === 'admin'){
                        echo '<th>User</th>';
                    }
                    ?>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th>Department</th>
                    <th> Item name</th>
                    <th>Description</th>
                    <th> Quantity</th>
                    <th>Unit</th>
                    <th>Type</th>
                    <th> Date</th>
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if($position === 'admin'){
                        echo '<th>User</th>';
                    }
                    ?>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

