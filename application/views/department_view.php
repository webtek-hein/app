<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url() ?>assets/css/dept.css"/>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="dropdown">

    		<select class="selectdept" name="department" id="depts">
          <option class="option" value="NULL">Departments</option>
          <?php foreach ($departments as $dept): ?>
                <option class="option" value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['res_center_code'] . ' ' . $dept['department'] ?></option>
          <?php endforeach; ?>
        </select>

            </div>
              </div>

          <div class="container">
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="department" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item name</th>
                  <th> Account Code</th>
                  <th> Official Receipt</th>
				          <th> Delivery Date</th>
                  <th> Date received</th>
				          <th> Received by </th>
				          <th>Cost</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                    <th>Item name</th>
                    <th> Account Code</th>
                    <th> Official Receipt</th>
                    <th> Delivery Date</th>
                    <th> Date received</th>
                    <th> Received by </th>
                    <th>Cost</th>
                </tr>
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

