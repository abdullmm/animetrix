<?php
include 'includes/dbh.inc.php';
$query = "SELECT p.title Title, count(o.observationnumber) number from project p, observation o where p.ProjectID=o.ProjectID group by o.ProjectID;";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
            var data = google.visualization.arrayToDataTable([
                ['Title', 'Number'],
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo "['".$row["Title"]."', ".$row["number"]."],";
                }
                ?>
            ]);
            var options = {
                title: 'Percentage of Male and Female Employee',
                //is3D:true,
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<br /><br />
<div style="width:900px;">
    <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>
    <br />
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>
</body>
</html>