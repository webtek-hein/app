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


                 <div class="container">
          <div class="row">
              <div class="span12">
                  <form id="custom-search-form" class="form-search form-horizontal pull-right">                 
                      <input type="search" id="search-query" placeholder="search">
                  </form>
              </div>
          </div>
        </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item name</th>
                  <th>Description</th>
                  <th> Account Code</th>
                  <th> Quantity</th>
        					<th> Unit</th>
        					<th> Action</th>
                </tr>
                </thead>
                <tbody>
              <?php foreach ($item as $item_record): ?>
                <tr>
                  <td><?php echo $item_record['item_name']; ?></td>
                  <td><?php echo $item_record['item_description']; ?></td>
                  <td><?php echo $item_record['account_code']; ?></td>
                  <td><?php echo $item_record['quantity']; ?></td>
                  <td><?php echo $item_record['unit']; ?></td>
                  <td> 
                      <button type="button" class="open-modal-action fa fa-plus" data-id="<?php echo $item_record['item_id']; ?>" data-toggle="modal" data-target="#addqty"></button>
                        
                      <button type="button" class="open-modal-action fa fa-minus" data-id="<?php echo $item_record['item_id']; ?>" data-toggle="modal" data-target="#subqty"></button>


                      <button class="open-modal-action fa fa-info" onclick = 'item_detail(<?php echo $item_record['item_id']; ?>)' data-toggle="modal" data-target="#view"></button>
                      <script type="text/javascript">
                          function item_detail(id)
                          {
                              $('.modal-body').empty();

                              //Ajax Load data from ajax
                              $.ajax({
                                  url : "<?php echo site_url('inventory/itemdetail/')?>",
                                  type: "GET",
                                  data: id;
                                  dataType: "JSON",
                                  success: function(data)
                                  {

                                      console.log(data);

                                  },
                                  error: function (jqXHR, textStatus, errorThrown)
                                  {
                                      alert('Error get data from ajax');
                                  }
                              });
                          }
                      </script>
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


<script type="text/javascript">
function myFunction() {
    var searchText = document.getElementById("search").value;
    var targetTable = document.getElementById("example1").value;
    var targetTableColCount;
}
</script>


