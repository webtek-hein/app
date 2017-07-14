
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow-x:auto; width:auto;">
                <div class="box-header">
                    <h3 class="box-title">Inventory</h3><br>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Item name</th>
                            <th>Description</th>
                            <th> Account Code</th>
                            <th> Quantity</th>
                            <th> Unit</th>
                            <th> View Item Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Item name</th>
                            <th>Description</th>
                            <th> Account Code</th>
                            <th> Quantity</th>
                            <th> Unit</th>
                            <th> View Item Details</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



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
            </div>
        </div>
    </div>
</section>


