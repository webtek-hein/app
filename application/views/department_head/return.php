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
                  <th>Date</th>
                  <th>Supplier</th>
                  <th>Department</th>
                  <th>Reason</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach ($return as $ret): ?>
                <tr>
                  <td>1234</td>
                  <td><<?php echo $ret['item_name']; ?>/td>
                  <td>23456</td>
                  <td><?php echo $ret['date']; ?></td>
                  <td><?php echo $ret['supplier']; ?></td>
                  <td><?php echo $ret['department']; ?></td>
                  <td>IGNORE</td>
                  <td>
                      
                      <input type="submit" name="Replace" value="Replace" class="Replace">
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
   