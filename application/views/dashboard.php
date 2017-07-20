<link rel="stylesheet" type="text/css" href="welcome.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  
<script>
  $(function () {
    var chart;
    
    $(document).ready(function () {
      
      // Build the chart
        $('#items').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Items'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Top 5 items',
                data: [
                    ['Ballpen',   4],
                    ['Table',       2],
                    ['Bag',    1],
                    ['Paper',     1],
                    ['Laptop',   2]
                ]
            }]
        });
    });
    
});
</script>



  <title>sample data</title>
</head>

<body>
  <div class="container">
      
    </div><!--end header -->

          <div id="items"></div>
  </div><!--end container -->
</body>