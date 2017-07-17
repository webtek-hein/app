
<script src="<?php echo base_url() ?>assets/js/addbulk.js"></script>
<?php $position = ($this->session->userdata['logged_in']['position']); ?>
<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
        <?php echo validation_errors(); ?>
        <?php echo form_open('inventory/addbulk'); ?>
        <!-- Modal content-->
        <div class="container" style="background-color:white; width:2150px; height: auto; size:50px;">
            <h4 class="modal-title" align="center"><b>Add Items<b></h4>

            <div class="modal-body">

                <div id="wrapper">
                    <table align='center' id="data_table" class="table table-bordered table-striped">
                        <tr>

                            <th style="width:150px;">Item Name</th>
                            <th style="width:150px;">Description</th>
                            <th style="width:150px;">Official Receipt</th>
                            <th style="width:150px;">Received By</th>
                            <th style="width:150px;">Quantity</th>
                            <th style="width:150px;">Supplier</th>
                            <th style="width:150px;">Type</th>
                            <th style="width:150px;">Delivery Date</th>
                            <th style="width:150px;">Date Received</th>
                            <th style="width:150px;">Unit</th>
                            <th style="width:150px;">Cost</th>
                            <th style="width:150px;">Expiration Date</th>
                        </tr>

                        <tr>
                            <td><input type="text" id="new_itemname" name="Item_Name[]" required="required" style="width:150px;"></td>
                            <td><input type="text" id="new_description" name="Item_Description[]" required="required" style="width:150px;"></td>
                            <td><input type="text" id="new_or" name="Item_OfficialReceipt[]" required="required" style="width:150px;"></td>
                            <td><input type="text" id="new_receivedby" name="Item_Receivedby[]" required="required" style="width:150px;"></td>
                            <td><input type="number" min=0 id="new_qty" name="Item_Quantity[]" required="required" style="width:150px;"></td>
                            <td><input type="text" id="new_supplier" name="Item_Supplier[]" required="required" style="width:150px;"></td>
                            <td>

                                <select type="text" id="new_type" name="Item_Type[]" required="required" style="width:150px; height: 25px;">
                                    <option></option >
                                    <option value="CO">CO</option>
                                    <option value="MOOE">MOOE</option>
                                </select>
                            </td>
                            <td><input type="date" id="new_deldate" name="Item_Deliverydate[]" required="required" style="width:150px;"></td>
                            <td><input type="date" id="new_datereceived" name="Item_Datereceived[]" required="required" style="width:150px;"></td>
                            <td>
                                <select type="text" id="new_unit" name="Item_Unit[]" required="required" style="width:150px; height: 25px;">
                                    <option></option >
                                    <option value="piece">piece</option>
                                    <option value="box">box</option>
                                    <option value="set">set</option>
                                    <option value="ream">ream</option>
                                    <option value="dozen">dozen</option>
                                    <option value="bundle">bundle</option>
                                    <option value="sack">sack</option>
                                    <option value="others">others</option>
                                </select>
                            </td>
                            <td><input type="number" id="new_cost" name="Item_Cost[]" required="required" style="width:150px;"></td>
                            <td><input type="date" id="new_expdate" name="Item_Expirationdate[]" required="required" style="width:150px;"></td>
                            <td><input type="button" class="btn btn-success" onclick="add_row();" value="Add Row"></td>
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
      
