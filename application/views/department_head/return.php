<script src="<?php echo base_url() ?>assets/js/sort.js"></script>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
          <div class="box">
          <div class="box-header">
              <h3 class="box-title">Return</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th onclick="sortTable(0)">Serial no.</th>
                  <th onclick="sortTable(1)">Item Name</th>
                  <th onclick="sortTable(2)">Account Code</th>
                  <th onclick="sortTable(3)">Date</th>
                  <th onclick="sortTable(4)">Supplier</th>
                  <th onclick="sortTable(5)">Department</th>
                  <th onclick="sortTable(6)">Reason</th>
                  <th onclick="sortTable(7)">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                      
                      <input type="submit" name="Replace" value="Replace" class="Replace">
                      <input type="submit" name="Ignore" value="Ignore" class="Ignore">
                  </td>
                </tr>
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
   