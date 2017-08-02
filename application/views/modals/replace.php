<!-- Modal-->
<?php $position = ($this->session->userdata['logged_in']['position']); ?>
<div class="modal fade" id="replacemodal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <?php echo validation_errors(); ?>
        <?php
            $attributes = array('id' => 'replaceform'); 
            echo form_open('/returned/replace', $attributes); 
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Replace Item<b></h4>
            </div>
            <div class="modal-body" align="center">
                <input id="return-id" type="hidden" name="return_id" value="">

                 <table border="0" width="500" align="center" class="table">
                    <tr>
                        <p> Current stock of this item is <span id="stock"></span></p>
                    </tr>
                    <tr>
                        <td>Account Code</td>
                        <td>
                            <!-- Display description, option value is account id eg. 1-07-01-010 for land -->
                            <select name="AccountCode" class="accountcode" required="required">
                                <?php foreach ($accountcodes as $ac_record): ?>
                                    <option value="<?php echo $ac_record['ac_id']; ?>"><?php echo $ac_record['account_code']," ", $ac_record['description']; ?></option>
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
                <button type="button" class="btn btn-default" id="save1" >Yes</button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
