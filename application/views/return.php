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
                  <th>Serial no.</th>
                  <th>Item Name</th>
                  <th>Account Code</th>
                  <th>Date Returned</th>
                  <th>Supplier</th>
                  <th>Department</th>
                  <th>Reason</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($return as $return): ?>
                <tr>
                  <td><?php echo $return['serial_no']; ?></td>
                  <td><?php echo $return['item_name']; ?></td>
                  <td><?php echo $return['account_code']; ?></td>
                  <td><?php echo $return['date']; ?></td>
                  <td><?php echo $return['supplier']; ?></td>
                  <td><?php echo $return['department']; ?></td>
                  <td><?php echo $return['reason']; ?></td>
                  <td><input type="submit" name="Replace" value="Replace" class="Replace">
                      <input type="submit" name="Ignore" value="Ignore" class="Ignore">
                  </td>
                </tr>
                <?php endforeach; ?>
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
   