<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['roomtype','cnt'],
                <?php
                require_once 'login.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
                $query="SELECT roomtype, count(*) as cnt FROM reservation group by roomtype";

                $result = $conn->query($query);
                while ($row=mysqli_fetch_array($result)){
                    echo "['".$row['roomtype']."',".$row['cnt']."],";

                }
                ?>
            ]);

            var options = {
                title: 'Reservation Stats'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>