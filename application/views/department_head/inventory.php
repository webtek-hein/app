<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory</h3><br>

        <div class="container">
          <div class="row">
              <div class="span12">
                  <form id="custom-search-form" class="form-search form-horizontal pull-right">                 
                      <input type="text" class="search-query" placeholder="search">
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
        					<th> More Details</th>
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

                      <button type="button" data-toggle="modal" data-target="#view">View Details</button>
                        
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