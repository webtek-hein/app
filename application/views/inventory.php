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
                <tr>
                  <td> </td>
                  <td> </td>
                  <td></td>
                  <td> </td>
                  <td></td>
                  <td> </td>
                  <td></td>
				          <td></td>
                  <td> </td>

                
                  <td> <button type="button" class="fa fa-plus" data-toggle="modal" data-target="#addqty"></button>
                                        <!-- Insert modal code here for ADD QUANTITY in ACTION-->
                        
                      <button class="fa fa-minus" data-toggle="modal" data-target="#subqty"></button>
                                          <!-- Insert modal code here for SUBTRACT QUANTITY in ACTION-->

                      <button class="fa fa-pencil" data-toggle="modal" data-target="#edit"></button>
                               <!-- Insert modal code here for EDIT in ACTION-->

                      <button class="fa fa-info" data-toggle="modal" data-target="#view"></button>
                       <!-- Insert modal code here for VIEW in ACTION-->
                        
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>
                </tr>
                </tbody>
                <tfoot>
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
