<style type="text/css">
.selectdept{
  background-color:#008CBA;
  color:white;
  height: 34px;
  border-radius: 4px;
  }

  .option{
    background-color:white;
    color:black;
  }
</style> 


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="dropdown">
    		<select class="selectdept">
                <option class="option">DEPARTMENT</option>
                <option class="option">.....</option>
                <option class="option">.....</option>
              </select>

        <button type= "button" class="btn btn-success">Summary of Items</button>        
            </div>
              </div>

                 <div class="container">
          <div class="row">
              <div class="span12">
                  <form id="custom-search-form" class="form-search form-horizontal pull-right">                 
                      <input type="text" class="search-query" placeholder="search">
                  </form>
              </div>
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
