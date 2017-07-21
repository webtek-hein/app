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

function get_item_details(id) {
    var serial;
    var oldData;
    details = $('#details').DataTable({
        responsive: true,
        "destroy": true,
        "ajax": {
            "url": 'inventory/itemdetail/' + id,
            "type": "GET",
        },
    });
   $('#details').on( 'click', 'tr :first-child', function () {
       $(this).attr('contentEditable', 'true');
       $(this).focus(function () {
           oldData = $(this).text();
       });
       $(this).blur(function () {
            serial = $(this).text();
           if(oldData != serial) {
               $.ajax({
                   type: "POST",
                   url: 'inventory/set_serial/' + id,
                   data: {'serial':serial},
                   dataType: 'json',
               });
           }
       });

    });

    $('#view').modal('show');
}

function get_distribution_details(id) {
    $('#details').DataTable({
        responsive: true,
        "destroy": true,
        "ajax": {
            "url": 'department/dist_details/' + id,
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
function create_chart()
{
    var chart;
    // Build the chart
    $('#items').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Items'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Top 5 items',
            data: [
                ['Ballpen',   4],
                ['Table',       2],
                ['Bag',    1],
                ['Paper',     1],
                ['Laptop',   2]
            ]
        }]
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
        $( "input[id=add_bulk_quant]" ).on("keypress paste",function () {
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
    });

