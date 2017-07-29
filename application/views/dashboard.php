<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section><br>


    <div class="container">


                    <div id="items"></div>
    </div><!--end container -->


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

                <?php if($position==='admin' || $position==='custodian'){

                echo '<div class="col-lg-3 col-sm-8" style="width: 650px;">'.
                    '<div class="panel panel-default">'.

                        '<div class="panel-heading">'.
                            '<h3><center>Items Remaining</center></h3>'.
                        '</div>'.

                        '<table class="table table-bordered table-striped" width="auto">'.
                            '<thead >'.
                            '<tr>'.
                                '<th>Order ID</th>'.
                                '<th>Item</th>'.
                                '<th>Quantity</th>'.
                                '<th>Type</th>'.
                            '</tr>'.
                            '</thead>'.
                            '<tbody></tbody></table></div></div>';
                        }
            ?>
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
                            <tbody>
                            <?php foreach ($defecteditems as $defect_items): ?>
                                <tr>
                                    <td><?php echo $defect_items['user']; ?></td>
                                    <td><?php echo $defect_items['item_name']; ?></td>
                                    <td><?php echo $defect_items['quantity']; ?></td>
                                    <td><?php echo $defect_items['reason']; ?></td>
                                    <td><?php echo $defect_items['department']; ?></td>
                                    <td><?php echo $defect_items['supplier']; ?></td>
                                </tr>
                            <?php endforeach; ?>
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



