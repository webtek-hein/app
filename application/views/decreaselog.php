    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Distribution</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>Serial</th>
                  <th> Item name</th>
                  <th> Date</th>
                  <th> Date Received</th>
                  <th> Unit Cost</th>
					        <th>User</th>
                  <th>Department</th>
                  
                </tr>
                </thead>
                <?php foreach ($decreaselog as $decrease): ?>
                <tbody>
                <tr>
                  <td><?php echo $decrease['serial']; ?></td>
                  <td><?php echo $decrease['item_name']; ?>
                  </td>
                  <td><?php echo $decrease['date']; ?></td>
                  <td><?php echo $decrease['date_rec']; ?></td>
                  <td><?php echo $decrease['unit_cost']; ?></td>
                  <td><?php echo $decrease['user']; ?></td>
                  <td><?php echo $decrease['department']; ?></td>
                  
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
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
