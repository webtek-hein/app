<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory</h3><br>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add item</button>
         <!-- Insert modal code here for ADD ITEM --> 
 
			  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Add Bulk Items</button>
         <!-- Insert modal code here for ADD BULK ITEMS-->

			  
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
        					<th> Action</th>
                </tr>
                </thead>
                <tbody>
              <?php foreach ($item as $item_record): ?>
                <tr>
                  <td><?php echo $item_record['item_name']; ?></td>
                  <td><?php echo $item_record['account_code']; ?></td>
                  <td><?php echo $item_record['official_receipt']; ?></td>
                  <td><?php echo $item_record['del_date']; ?></td>
                  <td><?php echo $item_record['date_rec']; ?></td>
                  <td><?php echo $item_record['quantity']; ?></td>
                  <td><?php echo $item_record['receivedby']; ?></td>
				          <td><?php echo $item_record['cost']; ?></td>
                  <td><?php echo $item_record['unit']; ?></td>

                
                  <td> <button type="button" class="fa fa-plus" data-toggle="modal" data-target="#addqty"></button>
                        
                      <button class="fa fa-minus" data-toggle="modal" data-target="#subqty"></button>

                      <button class="fa fa-pencil" data-toggle="modal" data-target="#edit"></button>

                      <button class="fa fa-info" data-toggle="modal" data-target="#view"></button>
                        
                        </div>
                      </div>
                    </div>
                  </div>
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
    <!-- /.content -->
  </div>
