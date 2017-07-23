<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
          <div class="box" style="overflow-x:auto; width:auto;">
          <div class="box-header">
              <h3 class="box-title">Return</h3>
            </div>
            <div class="box-body" style="overflow-x:auto; width:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial no.</th>
                  <th>Item Name</th>
                  <th>Account Code</th>
                  <th>Date Returned</th>
                  <th>Supplier</th>
                  <th>Department</th>
                  <th>Reason</th>
                  <th>Status</th>
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if($position === 'admin' || $position === 'custodian') {
                        echo '<th> Action</th >';
                    }
                    ?>
                </tr>
                </thead>
                <tbody>

                </tbody>
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
   