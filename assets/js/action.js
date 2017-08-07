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

    var item_type = $(this).data('type');
    $(".modal-body #item-type").val( item_type );

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
        dom: 'Bfrtip',
        buttons:[{
            text: 'Export',
            extend: 'pdf',
            className: 'btn btn-success',
            title: "Increase Logs",
            extension: '.pdf'
        }],
        destroy: true,
        responsive: true,
        "ajax": {
            "url": 'increaselog/increase_log_list',
            "type": "POST",
        },
    });




    decreaselog = $('#decrease_log').DataTable({
        dom: 'Bfrtip',
        buttons:[{
            text: 'Export',
            extend: 'pdf',
            className: 'btn btn-success',
            title: "Decrease Logs",
            extension: '.pdf'
        }],
        responsive: true,
        "destroy":true,
        "ajax": {
            "url": 'decreaselog/decrease_log_list',
            "type": "POST",
        },
    });

    returnlog = $('#return_log').DataTable({
        dom: 'Bfrtip',
        buttons:[{
            text: 'Export',
            extend: 'pdf',
            className: 'btn btn-success',
            title: "Return Logs",
            extension: '.pdf'
        }],
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
        increaselog.ajax.reload(null,false);
        decreaselog.ajax.reload(null,false);
        editlog.ajax.reload(null,false);
        returnlog.ajax.reload(null,false);
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
    $('.modal').on('hidden.bs.modal', function(){
        document.getElementById('quant').style.display  = 'none';
        $(this).find('form')[0].reset();
    });
    $('#subqty').modal('show');
    $('select[name="department"]').change(function() {
        var deptid = $(this).val();
        if (deptid != 'none') {
            $('input[name="Quantity"]').val(0);
            $.ajax({
                url: 'inventory/get_quantity/' + id + '/' + deptid,
                type:"POST",
                dataType: 'json',
                success: function(data){
                    $('input[name="Quantity"]').prop('max', data.data);
                    document.getElementById('quant').style.display  = 'block';
                },
            });
        } else {
            document.getElementById('quant').style.display  = 'none';
        } 
    });
}

function replace(id) {
    $.ajax({
        url: 'returned/get_quantity/' + id,
        type:"POST",
        dataType: 'json',
        success: function(data){
            $('#stock').text(data.data);
            if (data.data <= 0) {
                $('select[name=AccountCode]').prop("disabled", true);
                $('input[name=date]').prop("disabled", true);
                $('input[name=usage]').prop("disabled", true);
                $('input[name=receivedby]').prop("disabled", true);
                $('#save1').prop("disabled", true);
            }
            $('#replacemodal').modal('show');
            $('#save1').on('click', function () {
                var account = $('select[name=AccountCode]').val();
                var date =  $('input[name=date]').val();
                var usage = $('input[name=usage]').val();
                var receivedby =  $('input[name=receivedby]').val();
                if (!date && !receivedby && !usage) {
                    BootstrapDialog.alert("Please enter date, usage, and received by");
                } else if (!date && !receivedby && usage){
                    BootstrapDialog.alert("Please enter date and received by");
                } else if (date && !receivedby && !usage) {
                    BootstrapDialog.alert("Please enter received by and usage");
                } else if (!date && receivedby && !usage) {
                    BootstrapDialog.alert("Please enter date and usage");
                } else if (!date && receivedby && usage) {
                    BootstrapDialog.alert("Please enter date");
                } else if (date && !receivedby && usage) {
                    BootstrapDialog.alert("Please enter received by");
                } else if (date && receivedby && !usage) {
                    BootstrapDialog.alert("Please enter usage");
                } else {
                    $.ajax({
                        url : 'returned/replace',
                        type: "POST",
                        data: {'return_id': id, 'AccountCode': account, 'date': date, 'receivedby': receivedby, 'usage': usage},
                        success: function() {
                            $('#replacemodal').modal('hide');
                        }
                    });
                }
            });
        },
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
   $('#details ').on( 'change',  function () {
           $('#details tr :nth-child(2)').attr('contentEditable', 'true');


           // input field for serial
       $.each($('#details tr input[name=item-det]'),function () {
               // reset button
               $('input[type=reset]').on('click', function () {
                   $.each($('#details tr input[name=item-det]:checked'), function () {
                       $(this).parent().siblings(':first').text('');
                   });
               });

           $.each($('#details tr input[name=item-det]:checked'),function () {
               if($(this).parent().siblings(':first').text()=='')
               {
                   $('input[name=input]').on('keyup change focus', function () {
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
          //serial prevent copy paste
           $(this).bind("paste",function(e) {
               e.preventDefault();
           });
           $(this).focus(function () {
               oldData = $(this).text();
           });
    $(this).off('blur focusout').on('blur focusout',function () {
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

function get_decreaselog_details(dist_id) {
   $('#decreasedet').DataTable({
        responsive: true,
        "destroy": true,
         "ajax": {
            "url": 'decreaselog/decreaselog_details/' + dist_id,
            "type": "POST",
        },
    });

    $('#decrease').modal('show');
}
function get_return_details(dept_id,dateinput) {
    $('#return').DataTable({
        responsive: true,
        "destroy": true,
           "ajax": {
         "url": 'returnlog/returnlog_details/'+dept_id+'/'+dateinput,
         "type": "POST",
         },
    });
    $('#return_det').modal('show');
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

        $( "input[type=number]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x === 101 || x === 45 || x === 43 || x === 69){
                return false;
            }
        });
        $( "input[name=Item_Quantity]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x=== 46){
                return false;
            }
        });
        $( "input[name=Cost]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x === 101 ||  x === 45 || x === 43 || x === 69){
                return false;
            }
        });

        $( "input[id=new_cost]" ).on("keypress paste",function () {
            var x = event.charCode;
            if(x === 101 ||  x === 45 || x === 43 || x === 69){
                return false;
            }
        });
        $( "input[name=datereceived]" ).on("blur",function () {
            del_date = new Date($('input[name=datedelivered]').val());
            date_rec = new Date($('input[name=datereceived]').val());

            if(del_date > date_rec){
                $(this).val('');
                BootstrapDialog.alert('Delivery date must be later than the date received.');
            }
        });

        $( "input[name=ExpirationDate]" ).on("blur",function () {
            date_rec = new Date($('input[name=datereceived]').val());
            exp_date = new Date($('input[name=ExpirationDate]').val());

            if(exp_date < date_rec || exp_date === date_rec){
                $(this).val('');
                BootstrapDialog.alert('Expiration date must be later than the date received.');
            }
        });
        $('input[type=text]').keypress(function () {
            var x = event.charCode;
            if(x >= 0 && x <= 64 && x != 32){
                return false;
            }
        });

    });
//return items

function return_selected_items() {
    var item_det_id = [];
   
    $('#item_detail:checked').each(function () {
        item_det_id.push($(this).val());
    });

    if ($('#item_detail:checked').length > 0) {
        $('#returnmodal').modal('show');
    } else {
        BootstrapDialog.alert('Please check at least one item');
        return;
    }
    
      
    $('button[id=save1]').on('click',function () {
        var reason =  $('textarea#reason').val().trim();
        var person =  $('input[name=person]').val();

        var item_data;

        if (!reason && !person) {
            BootstrapDialog.alert("Please enter reason and return person");
        } else if (!reason && person){
            BootstrapDialog.alert("Please enter reason");
        } else if (reason && !person) {
            BootstrapDialog.alert("Please enter return person");
        } else {
            item_data = {'item_det_id':item_det_id,'reason':reason,'person':person};
            $.ajax({
                url : 'department/return_items',
                type: "POST",
                data: item_data,
                dataType: "JSON",
            });
        }
    });   
}



function dashboard_custodian_items_remaining(){
        $.ajax({
        method: "POST",
        url: "dashboard/dashboard_custodian_items_remaining",
        dataType: "JSON",
            success: function(data){
            alert(data);
        }
        })
}
//load data
$(document).ready(function () {

    setInterval(function () {
        $( "#r_items" ).load("dashboard/count_received_item");
        $( "#rec_items_per_dept" ).load("dashboard/count_rec_items_per_dept");
        $( "#defect_items" ).load("dashboard/count_def_items");
        $( "#ret_items" ).load("dashboard/count_ret_items");
        $( "#pendingu" ).load("dashboard/count_pending_users");
        $( "#no_of_items" ).load("dashboard/no_of_items");
        $( "#total_unit_cost" ).load("dashboard/total_unit_cost");
        $( "#expired_items" ).load("dashboard/count_expired_items");
    },1000);
});

    $(function () {
    var chart;
    
    $(document).ready(function () {
         $.ajax({
            url: 'dashboard/view_pie_graph_co',
            type: 'POST',
            async: true,
            dataType: "JSON",
            success: function(data){
             createGraph(data,'pie');
            } 
    });
        $.ajax({
            url: 'dashboard/view_pie_graph_mooe',
            type: 'POST',
            async: true,
            dataType: "JSON",
            success: function(data){
                mooegraph(data,'pie');
            }
        });
    });

               

        // Build the chart
        
    function createGraph(data,graph){
            $('#items').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
                title: {
                    text: 'Top 10 Capital Outlay Items'
                },subtitle: {
                    text: 'Click the slices to view percentage of items.'
                },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: ₱ {point.y:,.2f}'
                    }
                },
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },

            series: [{
                name: 'Item',
                type: graph,
                data: data
            }]
        });
        }
  
});

$(document).ready(function() {

    editlog = $('#edit_log').DataTable({

        destroy: true,
        responsive: true,
        "ajax": {
            "url": 'EditLog/get_edit_log',
            "type": "POST",
        },
    });
});

//form button validation
     $(document).ready(function(){
         $('form')
             .each(function(){
                 $(this).data('serialized', $(this).serialize())
             })
             .on('change input', function(){
                 $(this)
                     .find(' button:submit')
                     .attr('disabled', $(this).serialize() == $(this).data('serialized'))
                 ;
             })
             .find('button:submit')
             .attr('disabled', true)
         ;

     });

<!-- -->

    $( function() {
    $( ".datepicker" ).datepicker().val('mm/dd/yyyy');

    } );
//MOOE
function mooegraph(data,graph) {
    $('#graph').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Top 10 MOOE Items'
        },subtitle: {
            text: 'Click the slices to view percentage of items.'
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: ₱ {point.y:,.2f}'
                }
            },
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },

        series: [{
            name: 'Item',
            type: graph,
            data: data
        }]
    });

}
var bar;
