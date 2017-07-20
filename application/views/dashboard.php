<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="container" style="width:600px; margin-left: -30px">

                <div class="col-lg-3 col-sm-8" style="width: 650px;">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <h3><center>Items Remaining</center></h3>
                        </div>

                        <table class="table table-bordered table-striped" width="auto">
                            <thead >
                            <tr>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($itemsremaining as $items_remaining): ?>
                                <tr>
                                    <td><?php echo $items_remaining['official_receipt_no']; ?></td>
                                    <td><?php echo $items_remaining['item_name']; ?></td>
                                    <td><?php echo $items_remaining['quantity']; ?></td>
                                    <td><?php echo $items_remaining['date_rec']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
            </div>

                        <div class="col-lg-3 col-sm-8" style="width: 450px; height:auto; margin-left:630px; margin-top: -505px;">
                            <div class="panel panel-default panel-success">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <h3>Ordered Items</h3>
                                </div>
                                <!-- Table -->
                                <table class="table table-bordered table-striped" width="auto">
                                    <thead>
                                    
                                    <tr>
                                        <th>User</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Supplier</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($ordered as $ordered_items): ?>
                                    <tr>
                                        <td><?php echo $ordered_items['user']; ?></td>
                                        <td><?php echo $ordered_items['item_name']; ?></td>
                                        <td><?php echo $ordered_items['quantity']; ?></td>
                                        <td><?php echo $ordered_items['supplier']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>

                                        <th scope="row">
                                            <p class="text-center">
                                                <a href="" class="btn-success btn">
                                                    <span aria-hidden="true"></span> See more</a>
                                            </p>
                                        </th>
                            </div>
                        </div>

            <div class="col-lg-3 col-sm-8" style="width: 450px; margin-left:630px; margin-top: -250px;">
                <div class="panel panel-default panel-info">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h3>Received Items</h3>
                    </div>
                    <!-- Table -->
                    <table class="table table-bordered table-striped" width="auto">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($received as $received_items): ?>
                        <tr>
                            <td><?php echo $received_items['user']; ?></td>
                            <td><?php echo $received_items['item_name']; ?></td>
                            <td><?php echo $received_items['quantity']; ?></td>
                            <td><?php echo $received_items['supplier']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <th scope="row">
                        <p class="text-center">
                            <a href="" class="btn-info btn">
                                <span aria-hidden="true"></span> See more</a>
                        </p>
                    </th>
                </div>
            </div>

            <div class="col-lg-3 col-sm-8" style="width: 450px; margin-left:630px;">
                <div class="panel panel-default panel-warning">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h3>Returned Items</h3>
                    </div>
                    <!-- Table -->
                    <table class="table table-bordered table-striped" width="auto">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Reason</th>
                            <th>Department</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($returned as $returned_items): ?>
                        <tr>
                            <td><?php echo $returned_items['user']; ?></td>
                            <td><?php echo $returned_items['item_name']; ?></td>
                            <td><?php echo $returned_items['quantity']; ?></td>
                            <td><?php echo $returned_items['reason']; ?></td>
                            <td><?php echo $returned_items['department']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <th scope="row">
                        <p class="text-center">
                            <a href="" class="btn-warning btn">
                                <span aria-hidden="true"></span> See more</a>
                        </p>
                    </th>
                </div>
            </div>
                    <div class="col-lg-3 col-sm-8" style="width: 450px; margin-left:630px;">
                        <div class="panel panel-default panel-danger">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <h3>Defected Items</h3>
                            </div>
                            <!-- Table -->
                            <table class="table table-bordered table-striped" width="auto">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Reason</th>
                                    <th>Department</th>
                                    <th>Supplier</th>
                                </tr>
                                </thead>
                                <tbody>defecteditems
                                <?php foreach ($defecteditems as $defected_items): ?>
                                <tr>
                                    <td><?php echo $defected_items['user']; ?></td>
                                    <td><?php echo $defected_items['item_name']; ?></td>
                                    <td><?php echo $defected_items['quantity']; ?></td>
                                    <td><?php echo $defected_items['reason']; ?></td>
                                    <td><?php echo $defected_items['department']; ?></td>
                                    <td><?php echo $defected_items['supplier']; ?></td>
                                </tr>
                               <?php endforeach; ?>
                                </tbody>
                            </table>

                            <th scope="row">
                                <p class="text-center">
                                    <a href="" class="btn-danger btn">
                                        <span aria-hidden="true"></span> See more</a>
                                </p>
                            </th>
                        </div>
                    </div>

        </div>
    </div>
</section>