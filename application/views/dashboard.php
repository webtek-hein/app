 
 <head>
 	<title>
 	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</title>
 </head>

<h1 class="page-header">Dashboard</h1>
<div class="row">
    <a href="/admin/registration/list">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Replaced Items</span>
                    <span class="info-box-number"> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </a>
    <!-- /.col -->
    <a href="/admin/customers/list">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Ignored Items</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </a>
    <!-- /.col -->

    
<div class="page-header">
	<h1>ITEMS REMAINING:</h1>
</div>
	<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> Item name</th>
                  <th> Account Code</th>
                  <th> Descripton</th>
                  <th> Unit</th>
					<th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Laptop</td>
                  <td>2145</td>
                  <td>Black, 15 inches</td>
                  <td>Others</td>
                  <td>4</td>
                </tr>
                </tbody>
                <tfoot>
                </tfoot>
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

  <script type="text/javascript">
  window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Mobile Phones Used For",
                fontFamily: "Verdana",
                fontColor: "Peru",
                fontSize: 28

            },
            animationEnabled: true,
            axisY: {
                tickThickness: 0,
                lineThickness: 0,
                valueFormatString: " ",
                gridThickness: 0
            },
            axisX: {
                tickThickness: 0,
                lineThickness: 0,
                labelFontSize: 18,
                labelFontColor: "Peru"

            },
            data: [
            {
                indexLabelFontSize: 26,
                toolTipContent: "<span style='\"'color: {color};'\"'><strong>{indexLabel}</strong></span><span style='\"'font-size: 20px; color:peru '\"'><strong>{y}</strong></span>",

                indexLabelPlacement: "inside",
                indexLabelFontColor: "white",
                indexLabelFontWeight: 600,
                indexLabelFontFamily: "Verdana",
                color: "#62C9C3",
                type: "bar",
                dataPoints: [
                    { y: 21, label: "21%", indexLabel: "Video" },
                    { y: 25, label: "25%", indexLabel: "Dining" },
                    { y: 33, label: "33%", indexLabel: "Entertainment" },
                    { y: 36, label: "36%", indexLabel: "News" },
                    { y: 42, label: "42%", indexLabel: "Music" },
                    { y: 49, label: "49%", indexLabel: "Social Networking" },
                    { y: 50, label: "50%", indexLabel: "Maps/ Search" },
                    { y: 55, label: "55%", indexLabel: "Weather" },
                    { y: 61, label: "61%", indexLabel: "Games" }


                ]
            }
            ]
        });

        chart.render();
    }
  </script>
  <script type="text/javascript" src="/assets/script/canvasjs.min.js"></script>
  
  </div>