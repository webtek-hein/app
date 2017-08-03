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
<!-- ./col -->
<div class='col-lg-2 col-xs-2'>
    <div class='small-box bg-aqua'>
        <div class='inner'>
            <h3 id='r_items'></h3>
            <p>Received Items</p>
        </div>
        <div class='icon'>
            <i class='ion ion-bag'></i>
        </div>
        <span><button><a class='small-box-footer' href='/app/inventory'>More Details
         <i class='fa fa-arrow-circle-right'> </i></a></button> </span>
    </div>
</div>
        <div class="col-lg-2 col-xs-2">
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
        <div class="col-lg-4 col-xs-2">

            <div class="small-box bg-blue">
                <div class="inner">
                    <h3 id="no_of_items">
                    </h3>
                    <p>Total Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>


            </div>
        </div>


        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3 id="total_unit_cost">
                    </h3>
                    <p>Total Cost of Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
</div>

    <div class="container">
        <!-- ./col -->
        <div class="col-lg-2 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3 id="expired_items">
                    </h3>
                    <p>Expired Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <span><button><a class="small-box-footer">More Details
                     <i class="fa fa-arrow-circle-right"> </i></a></button> </span>
            </div>
        </div>

        <?php $position = $this->session->userdata['logged_in']['position'];
        if ($position === 'admin') {


            echo '<div class="col-lg-2 col-xs-6">' .
                '<div class="small-box bg-yellow">' .
                '<div class="inner"><h3 id="pendingu"></h3>' .
                '<p>Pending Users</p></div>' .
                '<div class="icon">' .
                '<i class="ion ion-person-add"></i></div>' .
                '<nav><a href="/app/users"><button>More Details' .
                '<i class="fa fa-arrow-circle-right"> </i></a></button></a>' .
                '</nav></div></div>';
        }
        ?>
    </div>

    <div class="container">


    </div>




<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div id="items"></div>
        </div>
        <div class="col-xs-6">
            <div id="graph"></div>
        </div>
    </div>
</div>
<div class="container">
</div>

<!--bar graph -->
<div class="container">
    <div id="bar"></div>
</div><!--end container -->