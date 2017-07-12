    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Increase</h3>
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
					        <th> Supplier </th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($increaselog as $increase): ?>
                <tr>
                  <td><?php echo $increase['serial']; ?></td>
                  <td><?php echo $increase['item_name']; ?>
                  </td>
                  <td><?php echo $increase['date']; ?></td>
                  <td><?php echo $increase['date_rec']; ?></td>
                  <td><?php echo $increase['unit_cost']; ?></td>
                  <td><?php echo $increase['supplier']; ?></td>
                  
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
