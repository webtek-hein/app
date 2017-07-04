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
          <td><input type="text" class="InputBox" name="Item_Name" value=""></td>
        </tr>
        <tr>
          <td>Item Description</td>
          <td><input type="text" class="Description" name="Description" value=""></td>
        </tr>
        <tr>
          <td>Account Code</td>
          <td>
          <!-- Display description, option value is account id eg. 1-07-01-010 for land -->
          <select name="AccountCode" class="accountcode">
            <?php foreach ($accountcodes as $ac_record): ?>
              <option value="<?php echo $ac_record['ac_id']; ?>"><?php echo $ac_record['account_code']," ", $ac_record['description']; ?></option>
            <?php endforeach; ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>Official Receipt</td>
          <td><input type="int" class="InputBox" name="OfficialReceipt" value=""></td>
        </tr>

        <tr>
          <td>Quantity</td>
          <td><input type="int" class="InputBox" name="Item_Quantity" value=""></td>
        </tr>

        <tr>
          <td>Supplier</td>
          <td><input type="text" class="InputBox" name="Supplier" value="">
          </td>
        </tr>

        <tr>
          <td>Delivery Date</td>
          <td><input type="date" class="datereceived" name="datedelivered" value=""></td>
        </tr>
        <tr>
          <td>Date Received</td>
          <td><input type="date" class="datereceived" name="datereceived" value=""></td>
        </tr>
        <tr>
          <td>Unit</td>
          <td>
            <select name="Unit" class="unit">
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
          <td>Cost</td>
          <td><input type="int" class="InputBox" name="Cost" value=""></td>
        </tr>
        <tr>
          <td>Expiration Date</td>
          <td><input type="date" class="expdate" name="ExpirationDate" value=""></td>
        </tr>
      </table> 
        </div>
        <div class="modal-footer">
         <button type="submit" formaction="inventory/additem" class="btn btn-default" id="save1">Save</button>
         <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  
