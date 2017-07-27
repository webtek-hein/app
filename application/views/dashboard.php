<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section><br>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Monthly Recap Report</h3>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                            <strong>Sales: 1 Jan, 2017 - 30 Jul, 2017</strong>
                        </p>

                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 200px; width:auto;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>Goal Completion</strong>
                        </p>

                        <div class="progress-group">
                            <span class="progress-text">Received Items</span>
                            <span class="progress-number"><b>160</b></span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Returned Items</span>
                            <span class="progress-number"><b>480</b></span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Defected Items</span>
                            <span class="progress-number"><b>310</b></span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                            <h5 class="description-header">$35,210.43</h5>
                            <span class="description-text">TOTAL RECEIVED ITEMS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-xs-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                            <h5 class="description-header">$10,390.90</h5>
                            <span class="description-text">TOTAL RETURNED ITEMS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-xs-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                            <h5 class="description-header">$24,813.53</h5>
                            <span class="description-text">TOTAL DEFECTIVE ITEMS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>

            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!---->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">

            <h3 id="rec_items">
            </h3>
            <p>Received Items</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <span onClick="toggle();"><button><a class="small-box-footer">More Details
                     <i class="fa fa-arrow-circle-right"> </i></a></button> </span>

    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3 id="ret_items">
            </h3>
            <p>Returned Items</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <span onClick="toggle1();"><button><a class="small-box-footer">More Details
                     <i class="fa fa-arrow-circle-right"> </i></a></button> </span>

    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3 id="defect_items">
            </h3>

            <p>Defected Items</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <span onClick="toggle2();"><button><a class="small-box-footer">More Details
                     <i class="fa fa-arrow-circle-right"> </i></a></button> </span>
    </div>
</div>
<!-- ./col -->
<!-- small box -->

<?php $position = $this->session->userdata['logged_in']['position'];
if($position === 'admin'){


    echo '<div class="col-lg-3 col-xs-6">'.
         '<div class="small-box bg-yellow">'.
         '<div class="inner"><h3 id="pendingu"></h3>'.
         '<p>Pending Users</p></div>'.
         '<div class="icon">'.
         '<i class="ion ion-person-add"></i></div>'.
         '<nav><a href="/app/users"><button>More Details'.
         '<i class="fa fa-arrow-circle-right"> </i></a></button></a>'.
         '</nav></div></div>';
}
?>
<!-- -->


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="container" style="width:650px; margin-left: -30px; height:auto;">

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
                                <th>Type</th>
                            </tr>
                            </thead>
                            <tbody>
                                         <?php foreach ($itemsremaining as $itemret): ?>
                                <tr>
                                    <td><?php echo $itemret['official_receipt_no']; ?></td>
                                    <td><?php echo $itemret['item_name']; ?></td>
                                    <td><?php echo $itemret['quantity']; ?></td>
                                    <td><?php echo $itemret['item_type']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->

            <!---->
            <div id="hidethis" style="display:none;">
                <div class="col-lg-3 col-sm-8" style="width: 480px; margin-left:630px; position:absolute;">
                    <div class="panel panel-default panel-info">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <h3>Received Items</h3>
                        </div>
                        <!-- Table -->
                        <table class="table table-bordered table-striped" width="auto">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($countrecitems as $cri): ?>
                                <tr>
                                    <td><?php echo $cri['item_name']; ?></td>
                                    <td><?php echo $cri['quantity']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!---->
            <div id="hidethis1" style="display:none;">
                <div class="col-lg-3 col-sm-8" style="width: 480px; margin-left:630px; position:absolute;">
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

                    </div>
                </div>
            </div>
            <!---->
            <div id="hidethis2" style="display:none;">
                <div class="col-lg-3 col-sm-8" style="width: 480px; margin-left:630px;  position:absolute;">
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

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function toggle() {
        if( document.getElementById("hidethis").style.display=='none' ){
            document.getElementById("hidethis").style.display = '';
        }else{
            document.getElementById("hidethis").style.display = 'none';
        }
    }


    function toggle1() {
        if( document.getElementById("hidethis1").style.display=='none' ){
            document.getElementById("hidethis1").style.display = '';
        }else{
            document.getElementById("hidethis1").style.display = 'none';
        }
    }


    function toggle2() {
        if( document.getElementById("hidethis2").style.display=='none' ){
            document.getElementById("hidethis2").style.display = '';
        }else{
            document.getElementById("hidethis2").style.display = 'none';
        }
    }
</script>