<script src="<?php echo base_url() ?>assets/js/sort.js"></script>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Decrease</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th onclick="sortTable(0)">Serial</th>
                  <th onclick="sortTable(1)"> Item name</th>
                  <th onclick="sortTable(2)"> Date</th>
                  <th onclick="sortTable(3)"> Date receive</th>
                  <th onclick="sortTable(4)"> Unit Cost</th>
					<th>User</th>
          <th>Employee name</th>
                </tr>
                </thead>
                <?php foreach ($decreaselog as $decrease): ?>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td><?php echo $decrease['date']; ?></td>
                  <td> 4</td>
                  <td>q</td>
                  <td>X</td>
                  <td>Glo</td>
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
