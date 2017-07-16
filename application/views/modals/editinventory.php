                               <!-- Modal-->
                        <div class="modal fade" id="edit" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" align="center"><b>Edit Inventory<b></h4>
                        </div>
                        <div class="modal-body" align="center">
                          <input id="item-id" type="hidden" name="item_id" value="">
                          
                         <form name="additem" method="post" action="">
                          <table border="0" width="500" align="center" class="table">
                          <tr>
                              <td>Item Name</td>
                              <td><input type="text" class="InputBox" name="Supplier" value=""></td>
                            </tr>
                            <tr>
                              <td>Description</td>
                              <td><input type="text" class="InputBox" name="Supplier" value=""></td>
                            </tr>
                          <tr>
                              <td>Account Code</td>
                              <td>
                              <select class="accountcode">
                                <?php foreach ($accountcodes as $ac_record): ?>
                                  <option value="<?php echo $ac_record['ac_id']; ?>"><?php echo $ac_record['account_code']," ", $ac_record['description']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                              </td>
                            </tr>
                              <tr>
                                  <td>Quantity</td>
                                  <td><input type="text" min = 0 class="unit" name="Supplier" value=""></td>
                              </tr>
                            <tr>
                              <td>Unit</td>
                              <td><input type="text" class="unit" name="Supplier" value=""></td>
                            </tr>
                          </table>
                        </form>
                            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" id="save1" data-dismiss="modal">Save</button>
                          <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
