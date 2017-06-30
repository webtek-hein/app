<button class="fa fa-minus" data-toggle="modal" data-target="#subqty"></button>
                                          <!-- Modal-->
                        <div class="modal fade" id="subqty" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" align="center"><b>Subtract Quantity<b></h4>
                        </div>
                        <div class="modal-body" align="center">

                         <form name="additem" method="post" action="">
                          <table border="0" width="500" align="center" class="table">
                          <tr>
                              <td>Quantity</td>
                              <td>
                              <select class="qty">
                                <option value="">...............</option>
                                <option value="">...............</option>
                                <option value="">...............</option>
                                <option value="">...............</option>
                              </select>
                              </td>
                            </tr>
                            <tr>
                              <td>Department</td>
                              <td>
                              <select class="dept">
                                  <?php foreach ($department as $dp_record): ?>
                                  <option value="<?php echo $dp_record['dept_id']; ?>"><?php echo $dp_record['res_center_code']," ", $dp_record['department']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                              </td>
                            </tr>
                         <tr>
                              <td>Date</td>
                              <td><input type="date" class="date" name="ItemName" value=""></td>
                            </tr>
                            <tr>
                              <td>Usage</td>
                              <td><input type="text" class="usage" name="Supplier" value=""></td>
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
