/**
 * Created by hpb on 7/15/2017.
 */
$(document).ready(function() {
    $('#example1').DataTable({responsive: true});

} );


$(document).on("click", ".open-modal-action", function () {
    var item_id = $(this).data('id');
    $(".modal-body #item-id").val( item_id );

    var item = $(this).data('id');
    $(".modal-body #dist-id").val( item );

    var return_id = $(this).data('id');
    $(".modal-body #return-id").val( return_id );

    var user_id = $(this).data('id');
    $(".modal-body #user-id").val( user_id );
});


var inventory;
var department;
var increaselog;

$(document).ready(function() {

    inventory = $('#table').DataTable({

        destroy: true,
        responsive: true,
        "ajax": {
            "url": 'inventory/inventory_list',
            "type": "POST",
        },
    });


    department = $('#department').DataTable({
        destroy: true,
        responsive: true,
        "ajax": {
            "url":'department/get_all_dept_list',
            "type": "POST",
        },
    });



    $('select[name="department"]').change(function(){
        var id = $(this).val();

        department = $('#department').DataTable({   
            responsive: true,
            "destroy": true,
            "ajax": {
                "url":'department/get_dept_list/'+id,
                "type": "POST",
            },
        });
        if (id == 'none') {
            department.column( 0 ).visible( true );
        } else {
            department.column( 0 ).visible( false );
        }
        
    });



    increaselog = $('#increase_log').DataTable({
        destroy: true,
        responsive: true,
        "ajax": {
            "url": 'increaselog/increase_log_list',
            "type": "POST",
        },
    });



    decreaselog = $('#decrease_log').DataTable({
        responsive: true,
        "destroy":true,
        "ajax": {
            "url": 'decreaselog/decrease_log_list',
            "type": "POST",
        },
    });

    returnlog = $('#return_log').DataTable({
        responsive: true,
        "destroy":true,
        "ajax": {
            "url": 'returnlog/return_log_list',
            "type": "POST",
        },
    });

    returned_items = $('#returned_items').DataTable({
        responsive: true,
        "destroy":true,
        "ajax": {
            "url": 'returned/returned_list',
            "type": "POST",
        },
    });

    pending = $('#pending').DataTable({
        responsive: true,
        "destroy":true,
        "ajax": {
            "url": 'users/display_pending_users',
            "type": "POST",
        },
    });

    setInterval(function () {
        inventory.ajax.reload(null,false);
        department.ajax.reload(null,false);
        returned_items.ajax.reload(null,false);
        pending.ajax.reload(null,false);
    }, 1000);
});


function summary() {
    $('#departmentsummary').DataTable({
        responsive: true,
        "destroy": true,
        "ajax": {
            "url": 'department/summary_items',
            "type": "POST",
        },
    });
    $('#summary').modal('show');
}



function subtract_quantity(id) {
    $.ajax({
        url: 'inventory/get_quantity/' + id,
        type:"POST",
        dataType: 'json',
        success: function(data){
            $('input[name="Quantity"]').attr('max', data.data);
            $('#subqty').modal('show');
        },
    });

}

function return_no_action(id) {
    $.ajax({
        url: 'returned/no_action/' + id,
        type:"POST",
        success: function() {
            location.href = window.location.origin + "/app/returned"
        }
    });

}
//select all
$(document).ready(function () {
    $('input[name=select-all]').change(function () {
        $('input[name=item-det]').prop('checked',this.checked);
    });
});
function get_item_details(id) {
    var serial;
    var item_det_id = [];
    var oldData;
    //detail list
    details = $('#details').DataTable({
        responsive: true,
        "destroy": true,
        "ajax": {
            "url": 'inventory/itemdetail/' + id,
            "type": "GET",
        },
    });

    //multiple serial input
   $('#details ').on( 'change ',  function () {
           $('#details tr :nth-child(2)').attr('contentEditable', 'true');


           // input field for serial
       $.each($('#details tr input[name=item-det]'),function () {
               // reset button
               $('input[type=reset]').on('click', function () {
                   $('input[type=number]').val('').change();
               });

           $.each($('#details tr input[name=item-det]:checked'),function () {
               if($(this).parent().siblings(':first').text()=='')
               {
                   $('input[type=number]').on('keyup change ', function () {
                       serial = ($(this).val());
                               $.each($('#details tr input[name=item-det]:checked'), function () {
                                   $(this).parent().siblings(':first').text(serial);
                               });
                               });
               }
           });
       });
   });
   //single serial input
       $('#details').off( 'click', 'tr :nth-child(2)').on( 'click', 'tr :nth-child(2)', function () {
            var item_det = $(this).closest('tr').find('input[name="item-det"]').val();
           $(this).attr('contentEditable', 'true');
           $(this).focus(function () {
               oldData = $(this).text();
           });
    $(this).off('blur').on('blur',function () {
               serial = $(this).text();
               if(oldData != serial) {
                   $.ajax({
                       type: "POST",
                       url: 'inventory/set_serial/',
                       data: {'serial':serial, 'item_det': item_det},
                       error: function () {
                           BootstrapDialog.alert({
                               type: BootstrapDialog.TYPE_WARNING,
                               message: 'Please enter a unique serial',
                               closable: true
                           });
                       }
                   });
               }
           });
       });

    $('#view').modal('show');

}


function get_distribution_details(item_id,id) {
    $('#details').DataTable({
        responsive: true,
        "destroy": true,
        "ajax": {
            "url": 'department/dist_details/' + item_id +'/'+id,
            "type": "POST",
        },
    });
    $('#view').modal('show');
}

var save_method; //for save method string

function edit_inventory(id)
{
    save_method = 'update';

    //Ajax Load data from ajax
    $.ajax({
        url : 'inventory/edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $.each(data, function(i, item) {
                $('[name="item_id"]').val(data[i].item_id);
                $('[name="item_name"]').val(data[i].item_name);
                $('[name="desc"]').val(data[i].item_description);
                $('[name="unit"]').val(data[i].unit);
                $('[name="qty"]').val(data[i].quantity);
            });
            $('#edit').modal('show'); // show bootstrap modal when complete loaded

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function save()
{
    var url;
    if(save_method === 'update')

        url = 'admin/edit/item_update';


    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            //if success close modal and reload ajax table
            $('#edit').modal('hide');
            location.reload();// for reload a page
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}

//form validations
    $(document).ready(function () {

        $( "input[name=Item_Quantity]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x === 101 || x === 46 || x === 45 || x === 43){
                return false;
            }
        });
        $( "input[name=Cost]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x === 101 ||  x === 45 || x === 43){
                return false;
            }
        });
        $( "input[id=new_qty]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x === 101 || x === 46 || x === 45 || x === 43){
                return false;
            }
        });
        $( "input[id=new_cost]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x === 101 ||  x === 45 || x === 43){
                return false;
            }
        });
        $( "input[name=datereceived]" ).on("blur",function () {
            del_date = new Date($('input[name=datedelivered]').val());
            date_rec = new Date($('input[name=datereceived]').val());

            if(del_date > date_rec){
                $(this).val('');
            }
        });

        $( "input[name=ExpirationDate]" ).on("blur",function () {
            date_rec = new Date($('input[name=datereceived]').val());
            exp_date = new Date($('input[name=ExpirationDate]').val());

            if(exp_date < date_rec){
                $(this).val('');
            }
        });

    });
//return items

function return_selected_items() {
    var item_det_id = [];
    var reason;
    var person;
    var checked;
   
    $('#item_detail:checked').each(function () {
        item_det_id.push($(this).val());
    });

    $('#returnmodal').modal('show');
      
    $('button[id=save1]').on('click',function () {
        reason =  $('textarea#reason').val();
        person =  $('input[name=person]').val();

        if ($('input[name=defect]').is(":checked"))
        {
            checked = 'yes';
        } else {
            checked = 'no';
        }

        var item_data;

        if ($('#item_detail:checked').length > 0 && reason && person) {
            item_data = {'item_det_id':item_det_id,'reason':reason,'person':person, 'ischecked': checked};
        } else {
            window.alert("Please check at least 1 item and input all required fields. Try again.");
            return;
        }

        $.ajax({
           url : 'department/return_items',
           type: "POST",
           data: item_data,
           dataType: "JSON",
        });
    });   
}


function count_received_item(item_id,quantity)
{
    $.ajax({
        method: "POST",
        url: "dashboard",
        dataType: "JSON",
        data:{item_id:item_id},
         success: function(data){
            alert(data);
        }
})
}
function dashboard_custodian_items_remaining(){
        $.ajax({
        method: "POST",
        url: "dashboard",
        dataType: "JSON",
            success: function(data){
            alert(data);
        }
        })
}

$(document).ready(function () {
    $( "#rec_items" ).load("dashboard/count_received_item");
});


$(document).ready(function () {
    $( "#defect_items" ).load("dashboard/count_def_items");
});