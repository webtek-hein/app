
<script src="<?php echo base_url() ?>assets/js/addbulk.js"></script>

        <!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">

    <!-- Modal content-->
    <div class="container" style="background-color:white; width:1530px; height: auto; size:50px;">
        <h4 class="modal-title" align="center"><b>Add Many Items<b></h4>

<div class="modal-body">
       
       <div id="wrapper">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" >
<tr>
<th >Item Name</th>
<th>Account Code</th>
<th>Quantity</th>
<th>Supplier</th>
<th>Date Received</th>
<th>Unit</th>
<th>Cost</th>
<th>Expiration Date</th>
</tr>

<tr>
<td><input type="text" id="new_itemname"></td>
<td><input type="text" id="new_accountcode"></td>
<td><input type="text" id="new_qty"></td>
<td><input type="text" id="new_supplier"></td>
<td><input type="text" id="new_datereceived"></td>
<td><input type="text" id="new_unit"></td>
<td><input type="text" id="new_cost"></td>
<td><input type="text" id="new_expdate"></td>
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
      
