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
                  <th>Item name</th>
                  <th>Date</th>
                  <th>Supplier</th>
                  <th>Status</th>
                  <th>Unit Cost</th>
                  <th>Returned by</th>
                  <th>Replaced Item</th>
                  <th>Reason</th>
                  <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($returnlog as $return): ?>
                <tr>
              
                  <td>312</td>
                  <td>ballpen</td>
                  <td><?php echo $return['date']; ?></td>
                  <td>Joy</td>
                  <td> 4</td>
                  <td>X</td>
                  <td> <?php echo $return['return_person']; ?></td>
                  <td>X</td>
                  <td><?php echo $return['reason']; ?></td>
                  <td>5</td>
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
