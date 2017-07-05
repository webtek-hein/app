 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="dropdown">
    <button class="btn btn-primary" type="button" data-toggle="dropdown">Departments
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <?php foreach ($departments as $depts): ?>
        <li><a href="#"><?php echo $depts['res_center_code']," ", $depts['department']; ?></a></li>
      <?php endforeach; ?>
    </ul>

        <button type= "button" class="btn btn-success">Summary of Items</button>        
            </div>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item name</th>
                  <th> Account Code</th>
                  <th> Official Receipt</th>
				  <th> Delivery Date</th>
                  <th> Date received</th>
                  <th> Quantity</th>
					<th> Received by </th>
					<th>Cost</th>
					<th> Unit</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
				  <td> </td>
                  <td> </td>
                </tr>
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
