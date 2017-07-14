
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow-x:auto; width:auto;">
                <div class="box-header">
                    <h3 class="box-title">Inventory</h3><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add item</button>
                    <!-- Insert modal code here for ADD ITEM -->

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Add Bulk Items</button>
                    <br></br>
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

                                    <button type="button" class="btn btn-danger open-modal-action fa fa-minus" data-id="<?php echo $item_record['item_id']; ?>" data-toggle="modal" data-target="#subqty"></button>

                                    <button class="btn btn-warning open-modal-action fa fa-pencil" onclick="edit_inventory(<?php echo $item_record['item_id']; ?>)"></button>

                                    <button class="btn btn-default open-modal-action fa fa-info" onclick="view_det(<?php echo $item_record['item_id']; ?>)"></button>


                                </td>
                            </tr>
                        <?php endforeach; ?>



                        </tbody>


                    </table>

                </div>

                <script type="text/javascript" >

                    $(document).ready(function() {
                       list = $('#table_id').DataTable({responsive: true});
                    } );
                    $(document).ready(function() {
                       $('#example1').DataTable({responsive: true});

                    } );


                    var save_method; //for save method string

                    function edit_inventory(id)
                    {
                        save_method = 'update';

                        //Ajax Load data from ajax
                        $.ajax({
                            url : "<?php echo site_url('admin/edit/edit/')?>/" + id,
                            type: "GET",
                            dataType: "JSON",
                            success: function(data)
                            {
                                $.each(data, function(i, item) {
                                    $('[name="item_id"]').val(data[i].item_id);
                                    $('[name="acid"]').val(data[i].ac_id);
                                    $('[name="item_name"]').val(data[i].item_name);
                                    $('[name="desc"]').val(data[i].item_description);
                                    $('[name="accountcode"]').val(data[i].ac_id);
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

                            url = "<?php echo site_url('admin/edit/item_update')?>";


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

                    function view_det(id)
                    {
                        //Ajax Load data from ajax
                        $.ajax({
                            url : "<?php echo site_url('admin/inventory/itemdetail/')?>" + id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
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

                <!-- Modal item detail-->
                <div class="modal fade" id="view" role="dialog">
                    <div class="modal-dialog" style="overflow-x:auto; width:auto;">

                        <!-- Modal content-->
                        <div class="container" style="background-color:white; width:1220px; height: auto; size:50px; overflow-y:auto;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" align="center"><b>Item Details<b></h4>
                            </div>
                            <div class="modal-body">


                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="auto" align="center">
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


                <!-- Modal edit inventory-->
                <div class="modal fade" id="edit" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Inventory</h3>
                            </div>
                            <div class="modal-body form">
                                <form action="#" id="form" class="form-horizontal">
                                    <input type="hidden" value="" name="item_id"/>
                                    <input type="hidden" value="" name="acid"/>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Item Name</label>
                                            <div class="col-md-9">
                                                <input name="item_name"  placeholder="Item Name" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Description</label>
                                            <div class="col-md-9">
                                                <input name="desc" placeholder="Description" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Account Code</label>
                                            <div class="col-md-9">

                                                <select name="accountcode" class="accountcode">
                                                    <?php foreach ($accountcodes as $ac_record): ?>
                                                        <option value="<?php echo $ac_record['ac_id']; ?>"><?php echo $ac_record['account_code']," ", $ac_record['description']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Unit</label>
                                            <div class="col-md-9">
                                                <input name="unit" placeholder="Unit" class="form-control" type="text">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Quantity</label>
                                            <div class="col-md-9">
                                                <input name="qty" placeholder="Quantity" class="form-control" type="text">

                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


            </div>
        </div>
    </div>
</section>


