                       <!-- Modal-->
                        <div class="modal fade" id="view" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" align="center"><b>Item Details<b></h4>
                        </div>
                        <div class="modal-body" align="center">

                        <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item name.</th>
                  <th>Serial no.</th>
                  <th>Account Code</th>
                  <th>Expiration Date</th>
                  <th>Description</th>
                  
                </tr>
                </thead>
                <tbody>
              <?php foreach ($item_detail as $details): ?>
                <tr>
                  <td><?php echo $details['item_name']; ?></td>
                  <td contenteditable='true'><?php echo $details['serial']; ?></td>
                  <td><?php echo $details['account_code']; ?></td>
                  <td><?php echo $details['exp_date']; ?></td>
                  <td><?php echo $details['description']; ?></td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
</div>
</div>
</div>
