function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_itemname=document.getElementById("new_itemname").value;
 var new_description=document.getElementById("new_description").value;
 var new_or=document.getElementById("new_or").value;
 var new_receivedby=document.getElementById("new_receivedby").value;
 var new_qty=document.getElementById("new_qty").value;
 var new_supplier=document.getElementById("new_supplier").value;
 var new_type=document.getElementById("new_type").value;
 var new_deldate=document.getElementById("new_deldate").value;
 var new_datereceived=document.getElementById("new_datereceived").value;
 var new_unit=document.getElementById("new_unit").value;
 var new_cost=document.getElementById("new_cost").value;
 var new_expdate=document.getElementById("new_expdate").value;


 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'>" +
     "<td id='itemname_row"+table_len+"'><input type='text' value='"+new_itemname+"' name='Item_Name[]' required='required'></td>" +
     "<td id='description_row"+table_len+"'><input type='text' value='"+new_description+"' name='Item_Description[]' required='required'></td>" +
     "<td id='or_row"+table_len+"'><input type='text' value='"+new_or+"' name='Item_OfficialReceipt[]' required='required'></td>" +
     "<td id='receivedby_row"+table_len+"'><input type='text' value='"+new_receivedby+"' name='Item_Receivedby[]' required='required'></td>" +
     "<td id='qty_row"+table_len+"'> <input type='number' min = 0 value='"+new_qty+"' name='Item_Quantity[]' required='required'></td>" +
     "<td id='supplier_row"+table_len+"'><input type='text' value='"+new_supplier+"' name='Item_Supplier[]' required='required'></td>" +
     "<td id='type_row"+table_len+"'><input type='text' value='"+new_type+"' name='Item_Type[]' required='required'></td>" +
     "<td id='deldate_row"+table_len+"'><input type='date' value='"+new_deldate+"' name='Item_Deliverydate[]' required='required'></td>" +
     "<td id='datereceived_row"+table_len+"'><input type='date' value='"+new_datereceived+"' name='Item_Datereceived[]' required='required'></td>" +
     "<td id='unit_row"+table_len+"'><input type='text' value='"+new_unit+"' name='Item_Unit[]' required='required'></td>" +
     "<td id='cost_row"+table_len+"'><input type='text' value='"+new_cost+"' name='Item_Cost[]' required='required'></td>" +
     "<td id='expdate_row"+table_len+"'><input type='date' value='"+new_expdate+"' name='Item_Expirationdate[]' required='required'></td>" +
     "<td> <input type='button' value='Delete' class='btn btn-danger' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_itemname").value="";
 document.getElementById("new_description").value="";
 document.getElementById("new_or").value="";
 document.getElementById("new_receivedby").value="";
 document.getElementById("new_qty").value="";
 document.getElementById("new_supplier").value="";
 document.getElementById("new_type").value="";
 document.getElementById("new_deldate").value="";
 document.getElementById("new_datereceived").value="";
 document.getElementById("new_unit").value="";
 document.getElementById("new_cost").value="";
 document.getElementById("new_expdate").value="";
}