<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add item</button>
         <!-- Modal --> 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center"><b>Add Item<b></h4>
        </div>
        <div class="modal-body">

             <form name="additem" method="post" action="">
      <table border="0" width="500" align="center" class="table">
        <tr>
          <td>Item Name</td>
          <td><input type="text" class="InputBox" name="ItemName" value=""></td>
        </tr>
        <tr>
          <td>Account Code</td>
          <td>
          <!-- Display description, option value is account id eg. 1-07-01-010 for land -->
          <select class="accountcode">
            <?php foreach ($accountcodes as $ac_record): ?>
              <option value="<?php echo $ac_record['ac_id']; ?>"><?php echo $ac_record['account_code']," ", $ac_record['description']; ?></option>
            <?php endforeach; ?>
          </select>
          </td>
        </tr>
        <tr>
          <td>Quantity</td>
          <td><input type="int" class="InputBox" name="Quantity" value=""></td>
        </tr>
        <tr>
          <td>Supplier</td>
          <td>
            <input type="text" class="InputBox" name="Supplier" value="">
          </td>
        </tr>
        <tr>
          <td>Date Received</td>
          <td><input type="date" class="datereceived" name="datereceived" value=""></td>
        </tr>
        <tr>
          <td>Unit</td>
          <td><input type="text" class="InputBox" name="Unit" value=""></td>
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
    </form>
            
            
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default" id="save1" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
