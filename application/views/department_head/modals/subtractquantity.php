                                          <!-- Modal-->
                        <div class="modal fade" id="subqty" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <?php echo validation_errors(); ?>
                      <?php echo form_open('inventory/subtractquantity'); ?>
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" align="center"><b>Subtract Quantity<b></h4>
                        </div>
                        <div class="modal-body" align="center">
                          <input id="item-id" type="hidden" name="item_id" value="">
                        
                          <table border="0" width="500" align="center" class="table">
                          <tr>
                              <td>Quantity <?php echo $quantitycount; ?></td>
                              <td>
                                  <input type="number" min = "1" max="10" class="Input" name="Quantity" value="">
                              </td>
                            </tr>
                            <tr>
                              <td>Department</td>
                              <td>
                              <select class="dept" name="department">
                                  <?php foreach ($department as $dp_record): ?>
                                  <option value="<?php echo $dp_record['dept_id']; ?>"><?php echo $dp_record['res_center_code']," ", $dp_record['department']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                              </td>
                            </tr>
                         <tr>
                              <td>Date of Distribution</td>
                              <td><input type="date" class="date" name="date" value=""></td>
                            </tr>
                            <tr>
                              <td>Usage</td>
                              <td><input type="text" class="usage" name="usage" value=""></td>
                            </tr>
                             <tr>
                              <td>Received By</td>
                              <td><input type="text" class="usage" name="receivedby" value=""></td>
                            </tr>
                          </table>
                            
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-default" id="save1" >Save</button>
                          <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>