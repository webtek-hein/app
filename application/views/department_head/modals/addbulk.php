         <!-- Modal-->
        <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center"><b>How many items?<b></h4>
        </div>
        <div class="modal-body" align="center">

  

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
            var itemname = $("#itemname").val();
            var accountcode = $("#accountcode").val();
            var quantity = $("quantity").val();
            
            
            
            var markup = "<tr><td>
            <input type='checkbox' name='record'></td>
            <td>
                  " + itemname + "
            </td>
            <td>
                  " + accountcode + "
            </td>
            <td>
                  " + quantity +"
            </td>
            </tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
    <form>
        <input type="text" id="itemname" placeholder="Item Name">
        <input type="text" id="accountcode" placeholder="Account code">
        <input type="text" id="quantity" placeholder="Quantity">
        <input type="text" id="supplier" placeholder="Supplier">
        <input type="text" id="datereceived" placeholder="Date received">
        <input type="text" id="unit" placeholder="Unit">
        <input type="text" id="cost" placeholder="Cost">
        <input type="text" id="expirationdate" placeholder="Expiration date">

        <input type="button" class="add-row" value="Add Row">
    </form>




         <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th>Select</th>
                <th>Item Name</th>
                <th>Accound Code</th>
                <th>Quanity</th>
                <th>Supplier</th>
                <th>Date Received</th>
                <th>Unit</th>        
                <th>Cost</th>        
                <th class="text-right">Expiration Date</th>
              </tr>
            </thead>
            <tbody>
              <tr><td><input type="checkbox" name="record"></td>
                <td>Long Island, NY, USA</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td class="text-right">45001</td>
              </tr>
            </tbody>
          </table>
        <button type="button" class="delete-row">Delete Row</button>
        
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default" id="save" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        </div>
      </div>
      
    </div>
  </div>
