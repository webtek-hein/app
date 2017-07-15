<?php $position = ($this->session->userdata['logged_in']['position']); ?>


<?php echo validation_errors(); ?>
      <?php echo form_open($position.'/inventory/addbulk'); ?>
        <!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
<<<<<<< HEAD
    <div class="modal-dialog">
    <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
        <div class="modal-body">
=======
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
>>>>>>> a4b05b50f24937ef13418ab4954e37f29984f215

    <!-- Modal content-->
    <div class="container" style="background-color:white; width:1700px; height: auto; size:50px;">
        <h4 class="modal-title" align="center"><b>Add Many Items<b></h4>

<div class="modal-body">
       
       <div id="wrapper">
<<<<<<< HEAD
<table align='center'  cellspacing=2 cellpadding=5 id="data_table" border=1>
=======
<table align='center' cellspacing=2 cellpadding=5 id="data_table" >
>>>>>>> a4b05b50f24937ef13418ab4954e37f29984f215
<tr>
<th>Item Name</th>
<th>Item Description</th>
<th>Account Code</th>
<th>Official Receipt</th>
<th>Received By</th>
<th>Quantity</th>
<th>Supplier Name</th>
<th>Date Delivered</th>
<th>Date Received</th>
<th>Unit</th>
<th>Cost</th>
<th>Expiration Date</th>
</tr>

<tr>
<td><input type="text" class="InputBox" name="Item_Name2"  required="required"></td>
<td><input type="text" class="InputBox" name="Description2"  required="required"></td>
<td>
<select name="AccountCode" class="accountcode" required="required">
            <?php foreach ($accountcodes as $ac_record): ?>
              <option value="<?php echo $ac_record['ac_id']; ?>"><?php echo $ac_record['account_code']," ", $ac_record['description']; ?></option>
            <?php endforeach; ?></td>
<td><input type="text" class="InputBox" name="OfficialReceipt2"  required="required"></td>
<td><input type="text" class="InputBox" name="ReceivedBy2"  required="required"></td>
<td><input type="text" class="InputBox" name="Item_Quantity2"  required="required"></td>
<td><input type="text" class="InputBox" name="Supplier_Name2"  required="required"></td>
<td><input type="text" class="InputBox" name="datedelivered2"  required="required"></td>
<td><input type="text" class="InputBox" name="datereceived2"  required="required"></td>
<td><select name="Unit" class="unit2" required="required">
              <option value="piece">piece</option>
              <option value="box">box</option>
              <option value="set">set</option>
              <option value="ream">ream</option>
              <option value="dozen">dozen</option>
              <option value="bundle">bundle</option>
              <option value="sack">sack</option>
              <option value="others">others</option>
            </select></td>
<td><input type="text" class="InputBox" name="Cost2" required="required"></td>
<td><input type="text" class="InputBox" name="ExpirationDate2" required="required"></td>
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
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
      
