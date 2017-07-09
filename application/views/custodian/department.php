<?php if(isset($dept_id)) { echo $dept_id; } ?>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url() ?>assets/css/dept.css"/>

<script src="<?php echo base_url() ?>assets/js/sort.js"></script>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="dropdown">

        <form action="department" method="POST">

    		<select class="selectdept" name="department" id="depts">
        <option value="1">Departments</option>
          <?php foreach ($departments as $dept): ?>
                <option class="option" value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['res_center_code'] . ' ' . $dept['department'] ?></option>
          <?php endforeach; ?>
        </select>
        <button type= "button" class="btn btn-success">Summary of Items</button>        

            </div>
              </div>

          <div class="container">
          <div class="row">
              <div class="span12">
                  <form id="custom-search-form" class="form-search form-horizontal pull-right">                 
                      <input type="text" id="search-query" placeholder="search">

                  </form>
              </div>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th onclick="sortTable(0)">Item name</th>
                  <th onclick="sortTable(1)"> Account Code</th>
                  <th onclick="sortTable(2)"> Official Receipt</th>
				  <th onclick="sortTable(3)"> Delivery Date</th>
                  <th onclick="sortTable(4)"> Date received</th>
                  <th onclick="sortTable(5)"> Quantity</th>
				  <th onclick="sortTable(6)"> Received by </th>
				  <th onclick="sortTable(7)">Cost</th>
				  <th onclick="sortTable(8)"> Unit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($distribute as $row): ?>
                <tr>
                  <td><?php echo $row['item_name'] ?></td>
                  <td><?php echo $row['account_code'] ?></td>
                  <td><?php echo $row['official_receipt_no'] ?></td>
                  <td><?php echo $row['del_date'] ?></td>
                  <td><?php echo $row['distrib_date'] ?></td>
                  <td><?php echo $row['quantity'] ?></td>
                  <td><?php echo $row['receivedby'] ?></td>
				          <td><?php echo $row['unit_cost'] ?></td>
                  <td><?php echo $row['unit'] ?></td>
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
