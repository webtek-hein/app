
<script src="<?php echo base_url() ?>assets/js/addbulk.js"></script>
<?php $position = ($this->session->userdata['logged_in']['position']); ?>
<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
        <?php echo validation_errors(); ?>
        <?php echo form_open('inventory/addbulk'); ?>
        <!-- Modal content-->
        <div class="container" style="background-color:white; width:1530px; height: auto; size:50px;">
            <h4 class="modal-title" align="center"><b>Add Many Items<b></h4>

            <div class="modal-body">

                <div id="wrapper">
                    <table align='center' cellspacing=2 cellpadding=5 id="data_table" >
                        <tr>
                            <th >Item Name</th>
                            <th>Quantity</th>
                        </tr>

                        <tr>
                            <td><input type="text" id="new_itemname" name="Item_Name[]"></td>
                            <td><input type="text" id="new_qty" name="Item_Quantity[]"></td>
                            <td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="new_itemname" name="Item_Name[]"></td>
                            <td><input type="text" id="new_qty" name="Item_Quantity[]"></td>
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
      
