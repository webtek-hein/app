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

<?php $position1 = $this->session->userdata['logged_in']['position'];
    if($position1 === 'department head' || $position1 === 'receiver'){
        echo "<div class='col-lg-3 col-xs-6'>";
        echo "<div class='small-box bg-aqua'>";
        echo "<div class='inner'>";
        echo "<h3 id='rec_items_per_dept'></h3>";
        echo "<p>Received Items</p>";
        echo "</div>";
        echo "<div class='icon'>";
        echo "<i class='ion ion-bag'></i>";
        echo "</div>";
        echo "<span><button><a class='small-box-footer' href='/app/inventory>More Details";
        echo "<i class='fa fa-arrow-circle-right'> </i></a></button> </span>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='col-lg-3 col-xs-6'>";
        echo "<div class='small-box bg-aqua'>";
        echo "<div class='inner'>";
        echo "<h3 id='rec_items'></h3>";
        echo "<p>Received Items</p>";
        echo "</div>";
        echo "<div class='icon'>";
        echo "<i class='ion ion-bag'></i>";
        echo "</div>";
        echo "<span><button><a class='small-box-footer' href='/app/inventory'>More Details";
        echo "<i class='fa fa-arrow-circle-right'> </i></a></button> </span>";
        echo "</div>";
        echo "</div>";
    }
?>
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
        <span><button><a class="small-box-footer" href="/app/returned">More Details
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
        <span><button><a class="small-box-footer" href="/app/decreaselog">More Details
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


