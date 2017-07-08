function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_itemname=document.getElementById("new_itemname").value;
 var new_accountcode=document.getElementById("new_accountcode").value;
 var new_qty=document.getElementById("new_qty").value;
 var new_supplier=document.getElementById("new_supplier").value;
 var new_datereceived=document.getElementById("new_datereceived").value;
 var new_unit=document.getElementById("new_unit").value;
 var new_cost=document.getElementById("new_cost").value;
 var new_expdate=document.getElementById("new_expdate").value;
  
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='itemname_row"+table_len+"'>"+new_itemname+"</td><td id='accountcode_row"+table_len+"'>"+new_accountcode+"</td><td id='qty_row"+table_len+"'>"+new_qty
 +"</td><td id='supplier_row"+table_len+"'>"+new_supplier+"</td><td id='datereceived_row"+table_len+"'>"+new_datereceived+"</td><td id='unit_row"+table_len+"'>"+new_unit+"</td><td id='cost_row"+table_len+"'>"+new_cost+"</td><td id='expdate_row"+table_len+"'>"+new_expdate+"</td><td> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_itemname").value="";
 document.getElementById("new_accountcode").value="";
 document.getElementById("new_qty").value="";
 document.getElementById("new_supplier").value="";
 document.getElementById("new_datereceived").value="";
 document.getElementById("new_unit").value="";
 document.getElementById("new_cost").value="";
 document.getElementById("new_expdate").value="";
}