    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-x:auto; width:auto;">
            <div class="box-header">
              <h3 class="box-title">Increase</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="increase_log" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th> Item name</th>
                  <th> Date</th>
                  <th> Date Received</th>
                  <th> Unit Cost</th>
					<th> Supplier </th>
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if($position === 'admin'){
                        echo '<th>User</th>';
                    }
                    ?>

                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <th>Serial</th>
                <th> Item name</th>
                <th> Date</th>
                <th> Date Received</th>
                <th> Unit Cost</th>
                <th> Supplier </th>
                <?php $position = $this->session->userdata['logged_in']['position'];
                if($position === 'admin'){
                    echo '<th>User</th>';
                }
                ?>

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
  </div>
