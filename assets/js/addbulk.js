function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_itemname=document.getElementById("new_itemname").value;
 var new_qty=document.getElementById("new_qty").value;


 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'>" +
     "<td id='itemname_row"+table_len+"'><input type='text' value='"+new_itemname+"' name='Item_Name[]'></td>" +
     "<td id='qty_row"+table_len+"'>"+new_qty +" <input type='text' name='Item_Quantity[]'></td>" +
     "<td> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_itemname").value="";
 document.getElementById("new_qty").value="";
}