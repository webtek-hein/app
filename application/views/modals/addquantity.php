                                        <!-- Modal-->
                        <div class="modal fade" id="addqty" role="dialog">
                    <div class="modal-dialog">  

                      <!-- Modal content-->
                      <?php echo validation_errors(); ?>
                      <?php echo form_open('custodian/inventory/addquantity'); ?>
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" align="center"><b>Add Quantity<b></h4>
                        </div>
                        <div class="modal-body" align="center">
                            <input id="item-id" type="hidden" name="item_id" value="">
                         <?php if($this->session->flashdata('msg')): ?>
                         <p><?php echo $this->session->flashdata('msg'); ?></p>
                        <?php endif; ?>
                        
                          <table border="0" width="500" align="center" class="table">
                            <tr>
                              <td>Official Receipt</td>
                              <td><input type="number" class="InputBox" name="Official_Receipt1" value="" required="required"></td>
                            </tr>
                            <tr>
                              <td>Received By</td>
                              <td><input type="text" class="InputBox" name="Received_By1" value="" required="required"></td>
                            </tr>

                            <tr>
                              <td>Quantity</td>
                              <td><input type="number" class="InputBox" name="Item_Quantity1" value="" required="required"></td>
                            </tr>
                            <tr>
                              <td>Supplier</td>
                              <td><input type="text" class="InputBox" name="Supplier_Name1" value="" required="required"></td>
                            </tr>
                            <tr>
                              <td>Delivery Date</td>
                              <td><input type="date" class="datereceived" name="datedelivered1" value=""></td>
                            </tr>
                            <tr>
                              <td>Date Received</td>
                              <td><input type="date" class="datereceived" name="datereceived1" value="" required="required"></td>
                            </tr>
                            <tr>
                              <td>Expiration Date</td>
                              <td><input type="date" class="expdate" name="Expiration_Date1" value="" required="required"></td>
                            </tr>
                               <tr>
                                <td>Cost</td>
                                <td><input type="number" class="InputBox" name="Unit_Cost1" value="" required="required"></td>
                              </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-default" id="save1">Save</button>
                          <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                         <?php echo form_close(); ?>
                    </div>
                  </div>
