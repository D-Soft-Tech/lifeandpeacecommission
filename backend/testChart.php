<?php
    
session_start();

include_once '../life/php/db.php';

$conn = get_DB();
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          
            <?php

                include_once 'booksSalesReport.php';

            ?>
        ]);

        var options = {
          chart: {
            title: 'Books Sales Report',
            subtitle: 'Books monthly Sales Report for the current half of the year',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('booksSalesReport'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="booksSalesReport" style="width: 900px; height: 500px;"></div>
  </body>
</html>