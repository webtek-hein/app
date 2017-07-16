/**
 * Created by hpb on 7/15/2017.
 */

$(document).on("click", ".open-modal-action", function () {
    var item_id = $(this).data('id');
    $(".modal-body #item-id").val( item_id );

    var item = $(this).data('id');
    $(".modal-body #dist-id").val( item );
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

    setInterval(function () {
        inventory.ajax.reload(null,false);
        department.ajax.reload(null,false);

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
            $('input[name="Quantity"]').attr('max', data.data)
            //alert(data.data);
            $('#subqty').modal('show');
        },
    });

}




function get_item_details(id) {
    $('#details').DataTable({
        responsive: true,
        "destroy": true,
        "ajax": {
            "url": 'inventory/itemdetail/' + id,
            "type": "POST",
        },
        "columnDefs": [
            { visible: "false", "targets": 0 }
        ]
    });
    $('#view_custodian').modal('show');
}


