<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow-x:auto; width:auto;">
                <div class="box-header">
                    <h3 class="box-title">Inventory</h3><br>
                   <?php
                   $position = $this->session->userdata['logged_in']['position'];
                        if ($position === 'custodian') {
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add item</button>';
                            echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Add Bulk Items</button>';
                        }
                        ?>

                    <div class="container" style="overflow-x:auto; width:auto;">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table" class="table table-bordered table-striped" width="100%" >
                                <thead>
                                <tr>
                                    <th>Item name</th>
                                    <th>Description</th>
                                    <th> Quantity</th>
                                    <th> Unit</th>
                                    <th> Type</th>
                                    <th> Total Cost</th>
                                    <th> Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Item name</th>
                                    <th>Description</th>
                                    <th> Quantity</th>
                                    <th> Unit</th>
                                    <th> Type</th>
                                    <th> Total Cost</th>
                                    <th> Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>

