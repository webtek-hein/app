                                        <!-- Modal-->
                        <div class="modal fade" id="returnmodal" role="dialog">
                    <div class="modal-dialog">  

                      <!-- Modal content-->
                      <?php echo validation_errors(); ?>
                      <form>
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" align="center"><b>Return Items<b></h4>
                        </div>
                        <div class="modal-body" align="center">
                            <input id="dist-id" type="hidden" name="item" value="">
                         <?php if($this->session->flashdata('msg')): ?>
                         <p><?php echo $this->session->flashdata('msg'); ?></p>
                        <?php endif; ?>
                        
                          <table border="0" width="500" align="center" class="table">
                            <tr>
                              <td>Reason</td>
                              <td><textarea rows="4" cols="50" type="text" class="InputBox" id="reason" name="reason"
                                            required ></textarea></td>
                            </tr>
                            <tr>
                              <td>Return Person</td>
                              <td><input type="text" class="InputBox" name="person" value="" required></td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-default" id="save1">Save</button>
                          <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                         <?php echo form_close(); ?>
                    </div>
                  </div>
