<button type="button" class="fa fa-plus" data-toggle="modal" data-target="#addqty"></button>
                                        <!-- Modal-->
                        <div class="modal fade" id="addqty" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" align="center"><b>Add Quantity<b></h4>
                        </div>
                        <div class="modal-body" align="center">

                         <form name="additem" method="post" action="">
                          <table border="0" width="500" align="center" class="table">
                            <tr>
                              <td>Quantity</td>
                              <td><input type="int" class="InputBox" name="Quantity" value=""></td>
                            </tr>
                            <tr>
                              <td>Supplier</td>
                              <td><input type="text" class="InputBox" name="Supplier" value=""></td>
                            </tr>
                            <tr>
                              <td>Unit</td>
                              <td>
                              <select class="unit">
                                <option value="">...............</option>
                                <option value="">...............</option>
                                <option value="">...............</option>
                                <option value="">...............</option>
                              </select>
                              </td>
                            </tr>
                            <tr>
                              <td>Expiration Date</td>
                              <td><input type="date" class="expdate" name="ItemName" value=""></td>
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
