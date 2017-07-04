 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Return log</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th> Item name</th>
                  <th> Date</th>
                  <th> Date receive</th>
                  <th> Unit Cost</th>
          <th> Person? </th>
          <th>User</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($returnlog as $return): ?>
                <tr>
              
                  <td></td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td><?php echo $return['date']; ?></td>
                  <td> 4</td>
                  <td>X</td>
                  <td> <?php echo $return['return_person']; ?></td>
                  <td>X</td>
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
