
<script src="<?php echo base_url() ?>assets/js/addbulk.js"></script>
<?php $position = ($this->session->userdata['logged_in']['position']); ?>
<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
        <?php echo validation_errors(); ?>
        <?php echo form_open('inventory/addbulk'); ?>
        <!-- Modal content-->
        <div class="container" style="background-color:white; width:1850px; height: auto; size:50px;">
            <h4 class="modal-title" align="center"><b>Add Items<b></h4>

            <div class="modal-body">

                <div id="wrapper">
                    <table align='center' id="data_table" class="table table-bordered table-striped">
                        <tr>
                            <th style="width:150px;"></th>
                            <th style="width:150px;">Item Name</th>
                            <th style="width:150px;">Description</th>
                            <th style="width:150px;">Official Receipt</th>
                            <th style="width:150px;">Received By</th>
                            <th style="width:80px;">Quantity</th>
                            <th style="width:150px;">Supplier</th>
                            <th style="width:80px;">Type</th>
                            <th style="width:140px;">Delivery Date</th>
                            <th style="width:140px;">Date Received</th>
                            <th style="width:80px;">Unit</th>
                            <th style="width:80px;">Cost per Unit</th>
                            <th style="width:140px;">Expiration Date</th>
                        </tr>

                        <tr>
                            <td><input type="button" class="btn btn-success" onclick="add_row();" value="Add Row"></td>
                            <td><input type="text" id="new_itemname" name="Item_Name[]" required style="width:150px;"></td>
                            <td><input id="new_description" name="Item_Description[]" required style="width:150px;"></td>
                            <td><input id="new_or" name="Item_OfficialReceipt[]" required style="width:150px;"></td>
                            <td><input type="text" id="new_receivedby" name="Item_Receivedby[]" required style="width:150px;"></td>
                            <td><input type="number" min=0 id="new_qty" name="Item_Quantity[]" required style="width:80px;"></td>
                            <td><input type="text" id="new_supplier" name="Item_Supplier[]" required style="width:150px;"></td>
                            <td><input type="text" id="new_type"  list="typelist" name="Item_Type[]" required style="width:80px;" pattern="CO|MOOE" title="Type must Be 'CO' or 'MOOE'">
                                <span id="error"></span>
                                <datalist id="typelist" >
                                    <option value="CO">CO</option>
                                    <option value="MOOE">MOOE</option>
                                </datalist>
                            </td>
                            <td><input type="date"  id="new_deldate" value="" name="Item_Deliverydate[]" required style="width:140px;"></td>
                            <td><input type="date"  id="new_datereceived" value="" name="Item_Datereceived[]" required style="width:140px;"></td>
                            <td>

                                <input type="text" id="new_unit" name="Item_Unit[]" list="list" required style="width:80px; height: 25px;">
                                <datalist id="list">
                                    <option value="piece">piece</option>
                                    <option value="box">box</option>
                                    <option value="set">set</option>
                                    <option value="ream">ream</option>
                                    <option value="dozen">dozen</option>
                                    <option value="bundle">bundle</option>
                                    <option value="sack">sack</option>
                                    <option value="others">others</option>
                                </datalist>
                            </td>
                            <td><input type="number" min="0" step='any' id="new_cost" name="Item_Cost[]" required style="width:80px;"></td>
                            <td><input type="date"  id="new_expdate" value="" name="Item_Expirationdate[]" required style="width:140px;"></td>
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
