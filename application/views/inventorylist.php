<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Inventory</h3><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add item</button>
                    <!-- Insert modal code here for ADD ITEM -->

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Add Bulk Items</button>
                    <!-- Insert modal code here for ADD BULK ITEMS-->
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Item id</th>
            <th>Item name</th>
            <th>Description</th>
            <th> Account Code</th>
            <th> Quantity</th>
            <th> Unit</th>
            <th> Action</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($item as $item_record): ?>
            <tr>
                <td><?php echo $item_record['item_id']; ?></td>
                <td><?php echo $item_record['item_name']; ?></td>
                <td><?php echo $item_record['item_description']; ?></td>
                <td><?php echo $item_record['account_code']; ?></td>
                <td><?php echo $item_record['quantity']; ?></td>
                <td><?php echo $item_record['unit']; ?></td>
            <td>
                <button type="button" class=" btn btn-primary open-modal-action fa fa-plus" data-id="<?php echo $item_record['item_id']; ?>" data-toggle="modal" data-target="#addqty"></button>

                <button type="button" class="btn-danger open-modal-action fa fa-minus" data-id="<?php echo $item_record['item_id']; ?>" data-toggle="modal" data-target="#subqty"></button>

                    <button class="btn btn-warning open-modal-action fa fa-pencil" data-id="<?php echo $item_record['item_id']; ?>" data-toggle="modal" data-target="#edit"></button>

                    <button class="btn btn-default open-modal-action fa fa-info" onclick="view_det(<?php echo $item_record['item_id']; ?>)"></button>


                </td>
            </tr>
        <?php endforeach; ?>



        </tbody>


    </table>

</div>

<script type="text/javascript" >

    $(document).ready(function() {
        $('#table_id').DataTable();
    } );
    $(document).ready(function() {
        $('#example1').DataTable();

    } );
    function view_det(id)
    {
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('admin/inventory/itemdetail/')?>" + id,
            type: "GET",
            dataType: "json",
       success: function(data) {

        /*   $('#example1').append(
               $.map(data, function (i, item) {
                   return '<tr>' +
                       '<td>' + i.account_code + '</td>' +
                       '<td>' + i.serial + '</td>' +
                       '<td>' + i.exp_date + '</td>' +
                       '<td>' + i.supplier + '</td>' +
                       '<td>' + i.description + '</td>' +
                       '<td>' + i.official_receipt_no + '</td>' +
                       '<td>' + i.del_date + '</td>' +
                       '<td>' + i.date_rec + '</td>' +
                       '<td>' + i.receivedby + '</td>' +
                       '<td>' + i.unit_cost + '</td></tr>';
               }).join()); */
        var table = $('#example1').DataTable();
           $('#view').on('hidden.bs.modal', function(){
               table.destroy();
               $('#tbodyid').empty();
           } );
               $.each(data, function(i, item) {
                   table.row.add([
                       data[i].account_code,
                       data[i].serial,
                       data[i].exp_date,
                       data[i].supplier,
                       data[i].description,
                       data[i].official_receipt_no,
                       data[i].del_date,
                       data[i].date_rec,
                       data[i].receivedby,
                       data[i].unit_cost
                   ]);
               });
           table.draw();

           $('#view').modal('show');
        }
        });
    }

</script>

<!-- Modal-->
<div class="modal fade" id="view" role="dialog">
    <div class="modal-dialog modal-lg" style="background-color: rgba(255,255,255, 0.93);position:fixed;
                    overflow-x:auto;overflow-y:scroll;bottom:0;left:0;right:0;top:0;
                    z-index:9999;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Item Details<b></h4>
            </div>
            <div class="modal-body" align="center">

                <div class="container">
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>

                        <tr>
                            <th>Account Code</th>
                            <th>Serial #</th>
                            <th>Expiration Date</th>
                            <th>Supplier</th>
                            <th>Description</th>
                            <th>Official Receipt #</th>
                            <th>Date Delivered</th>
                            <th>Date Received</th>
                            <th>Received By</th>
                            <th>Unit Cost</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyid">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</section>


