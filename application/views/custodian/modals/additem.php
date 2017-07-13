         <!-- Modal --> 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <?php echo validation_errors(); ?>
      <?php echo form_open('custodian/inventory/additem'); ?>
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
          <td><input type="text" class="InputBox" name="Item_Name" value="" required="required"></td>
        </tr>
        <tr>
          <td>Item Description</td>
          <td><input type="text" class="InputBox" name="Description" value="" required="required"></td>
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
          <td>Official Receipt</td>
          <td><input type="text" class="InputBox" name="OfficialReceipt" value="" required="required"></td>
        </tr>
	<tr>
          <td>Received By</td>
          <td><input type="text" class="InputBox" name="ReceivedBy" value="" required="required"></td>
        </tr>

        <tr>
          <td>Quantity</td>
          <td><input type="number" class="InputBox" name="Item_Quantity" value="" required="required"></td>
        </tr>


      <tr>
          <td>Supplier</td>
          <td><input type="text" class="InputBox" name="Supplier_Name" value="" required="required"></td>
        </tr>

        <tr>
          <td>Type</td>
          <td><input type="text" class="InputBox" name="Type" value="" required="required"></td>
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
          <td>Unit Cost</td>
          <td><input type="number" class="InputBox" name="Cost" value="" required="required"></td>
        </tr>
        <tr>
          <td>Expiration Date</td>
          <td><input type="date" class="expdate" name="ExpirationDate" value="" required="required"></td>
        </tr>
      </table> 
        </div>
        <div class="modal-footer">
         <button type="submit" formaction="inventory/additem" class="btn btn-default" id="save1" >Save</button>
         <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
             </div>
      </div>
       <?php echo form_close(); ?>
    </div>
  </div>
<script>
    $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
            $("form").validate({
              rules: {
                Item_Name: "required",
                Description: "requuired",
                OfficialReceipt: {
                  required: true,
                  minilength: 5
                },
                ReceivedBy: "required",
                Item_Quantity: "required",
                Supplier_Name: "required",s
                datedelivered: "required",
                datereceive: "required",
                Cost:"required",
                ExpirationDate: "required",
              
                messages: {
                  Item_Name: "Please input the Item Name",
                  Description: "Please input Description",
                  OfficialReceipt:"Please input the Official Reciept",
                  ReceivedBy:"Please Input the Reciever of the Item",
                  Item_Quantity: "Please input the quantity of the Item",
                  Supplier_Name: "Please input the supplier of the item",
                  datedelivered:"Please provide the the Delivered date",
                  datereceive: "Please provide the the date recieved",
                  Cost:"Please input the Cost of the item",
                  ExpirationDate: "Expiration date is needed"
                }
              },


          submitHandler: function(form) {
      form.submit();
  }
});
                
            });
            $("#additem").validate();
  </script>
  
