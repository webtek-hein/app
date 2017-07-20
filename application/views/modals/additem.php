<?php $position = ($this->session->userdata['logged_in']['position']); ?>
         <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <?php echo validation_errors(); ?>
      <?php echo form_open('inventory/additem'); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center"><b>Add Item<b></h4>
        </div>
         <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
        <div class="modal-body">
      <table border="0" width="500" align="center" class="table">
        <tr>
          <td>Item Name</td>
          <td><input type="text"  class="InputBox" name="Item_Name" value="" required="required"></td>
        </tr>
        <tr>
          <td>Item Description</td>
          <td><input type="text" class="InputBox" name="Description" value="" required="required"></td>
        </tr>


        <tr>
          <td>Official Receipt</td>
          <td><input type="text" class="InputBox" name="OfficialReceipt" value="" required="required"></td>
        </tr>
	<tr>
          <td>Received By</td>
          <td><input type="text" class="InputBox" name="ReceivedBy" value="" required="required"></td>
        </tr>

        <tr>
          <td>Quantity</td>
          <td><input type="number" class="InputBox" min = 0 name="Item_Quantity" value="" required="required"></td>
        </tr>


      <tr>
          <td>Supplier</td>
          <td><input type="text" class="InputBox" name="Supplier_Name" value="" required="required"></td>
        </tr>

        <tr>
           <td>Type</td>
          <td>
           <select name="Type" class="unit" required="required">
              <option value="CO">CO</option>
              <option value="MOOE">MOOE</option>
          </select>
        </td>
        </tr>

        <tr>
          <td>Delivery Date</td>
          <td><input type="date" class="datereceived" name="datedelivered" value="" required="required"></td>
        </tr>
        <tr>
          <td>Date Received</td>
          <td><input type="date" class="datereceived" name="datereceived" value="" required="required"></td>
        </tr>
        <tr>
          <td>Unit</td>
          <td>
            <select name="Unit" class="unit" required="required">
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
        </tr>
        <tr>
          <td>Unit Cost</td>
          <td><input type="number" min='0' step='0.01' class="InputBox" name="Cost" value="" required="required"></td>
        </tr>
        <tr>
          <td>Expiration Date</td>
          <td><input type="date" class="expdate" name="ExpirationDate" value="" required="required"></td>
        </tr>
      </table> 
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" id="save1">Save</button>
         <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
             </div>
      </div>
       <?php echo form_close(); ?>
    </div>
  </div>
  
