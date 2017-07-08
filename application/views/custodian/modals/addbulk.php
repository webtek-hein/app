
<script src="<?php echo base_url() ?>assets/js/addbulk.js"></script>

        <!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="background-color: rgba(255,255,255, 0.93);position:fixed;
                    overflow-x:auto;overflow-y:scroll;bottom:0;left:0;right:0;top:0;
                    z-index:9999;">

    <!-- Modal content-->
    <div class="container" style="background-color:white; width:1520px; height: 550px; text-align: center; size:50px;">
        <h4 class="modal-title"><b>Add Many Items</b></h4>

<div class="modal-body">
       
       <div id="wrapper">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
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
        <button type="button" class="btn btn-default" data-dismiss="modal" style>Save</button>
      </div>
    </div>
      
    </div>
  </div>
</div>
      