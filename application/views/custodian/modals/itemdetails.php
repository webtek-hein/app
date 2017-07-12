
                       <!-- Modal-->
                        <div class="modal fade" id="view" role="dialog">
                    <div class="modal-dialog modal-lg" style="background-color: rgba(255,255,255, 0.93);position:fixed;
                    overflow-x:auto;overflow-y:scroll;bottom:0;left:0;right:0;top:0;
                    z-index:9999;">
                    
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
                   <input type="hidden" id="itdet"></input>
                  <th>No.</th>
                  <th>Serial No.</th>
                  <th>Account Code</th>
                  <th>Expiration Date</th>
                  <th>Supplier</th>
                  <th>Description</th>
                  <th>Official Receipt No.</th>
                  <th>Date Delivered</th>
                  <th>Date Received</th>
                  <th>Received By</th>
                  <th>Unit Cost</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 0; ?>
              <?php foreach ($item_detail as $details): ?>

                <tr>
                  <td><?php
                        echo $counter = $counter+1;
                    ?></td>
                  <td contenteditable='true'><?php echo $details['serial']; ?></td>
                  <td><?php echo $details['account_code']; ?></td>
                  <td><?php echo $details['exp_date']; ?></td>
                  <td><?php echo $details['supplier']; ?></td>
                  <td><?php echo $details['description']; ?></td>
                  <td><?php echo $details['official_receipt_no']; ?></td>
                  <td><?php echo $details['del_date']; ?></td>
                  <td><?php echo $details['date_rec']; ?></td>
                  <td><?php echo $details['receivedby']; ?></td>
                  <td><?php echo $details['unit_cost']; ?></td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
</div>
</div>
</div>
