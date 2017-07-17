
<script src="<?php echo base_url() ?>assets/js/addbulk.js"></script>
<?php $position = ($this->session->userdata['logged_in']['position']); ?>
<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
        <?php echo validation_errors(); ?>
        <?php echo form_open('inventory/addbulk'); ?>
        <!-- Modal content-->
        <div class="container" style="background-color:white; width:2400px; height: auto; size:50px;">
            <h4 class="modal-title" align="center"><b>Add Many Items<b></h4>

            <div class="modal-body">

                <div id="wrapper">
                    <table align='center' cellspacing=2 cellpadding=5 id="data_table" >
                        <tr>
                            <th >Item Name</th>
                            <th>Description</th>
                            <th>Account Code</th>
                            <th>Official Receipt</th>
                            <th>Received By</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Type</th>
                            <th>Delivery Date</th>
                            <th>Date Received</th>
                            <th>Unit</th>
                            <th>Cost</th>
                            <th>Expiration Date</th>
                        </tr>

                        <tr>
                            <td><input type="text" id="new_itemname" name="Item_Name[]"></td>
                            <td><input type="text" id="new_description" name="Item_Description[]"></td>
                            <td><input type="text" id="new_accountcode" name="Item_Accountcode[]"></td>
                            <td><input type="text" id="new_or" name="Item_OfficialReceipt[]"></td>
                            <td><input type="text" id="new_receivedby" name="Item_Receivedby[]"></td>
                            <td><input type="text" id="new_qty" name="Item_Quantity[]"></td>
                            <td><input type="text" id="new_supplier" name="Item_Supplier[]"></td>
                            <td><input type="text" id="new_type" name="Item_Type[]"></td>
                            <td><input type="text" id="new_deldate" name="Item_Deliverydate[]"></td>
                            <td><input type="text" id="new_datereceived" name="Item_Datereceived[]"></td>
                            <td><input type="text" id="new_unit" name="Item_Unit[]"></td>
                            <td><input type="text" id="new_cost" name="Item_Cost[]"></td>
                            <td><input type="text" id="new_expdate" name="Item_Expirationdate[]"></td>
                            <td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
                        </tr>




                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" id="save1">Save</button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>
</div>
      
