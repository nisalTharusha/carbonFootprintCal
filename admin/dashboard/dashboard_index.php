<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard_style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="../../index.html">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="../../report/report.php">Report</a></li>
            <li><a href="../index_admin.html">Admin</a></li>
        </ul>
    </nav>

    <div class="header-container">
        <div class="green-box">
            <div class="one">
                <h1>Green Algorithms</h1>         
                <p1>Understand Your Environmental Impact Simpler</p1>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <h1>Dashboard</h1>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "carbon_data";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $totalRows1 = "";

        $sqlTotalRows = "SELECT COUNT(*) AS total FROM carbon_values";
        $resultTotalRows = $conn->query($sqlTotalRows);
        $rowTotalRows = $resultTotalRows->fetch_assoc();
        $totalRows = $rowTotalRows['total'];

        $sqlTodayInsertedValues = "SELECT COUNT(*) AS inserted FROM carbon_values WHERE DATE(Date) = CURDATE()";
        $resultTodayInsertedValues = $conn->query($sqlTodayInsertedValues);
        $rowTodayInsertedValues = $resultTodayInsertedValues->fetch_assoc();
        $todayInsertedValues = $rowTodayInsertedValues['inserted'];

        $sqlMaxCO2 = "SELECT MAX(Co2) AS max_co2 FROM carbon_values";
        $resultMaxCO2 = $conn->query($sqlMaxCO2);
        $rowMaxCO2 = $resultMaxCO2->fetch_assoc();
        $maxCO2Level = $rowMaxCO2['max_co2'];

        $sqlMaxCO2Country = "SELECT County FROM carbon_values WHERE CO2 = (SELECT MAX(CO2) FROM carbon_values)";
        $resultMaxCO2Country = $conn->query($sqlMaxCO2Country);
        $rowMaxCO2Country = $resultMaxCO2Country->fetch_assoc();
        $maxCO2Country = $rowMaxCO2Country['County'];

        // Retrieve CO2 data for line chart
        $sqlCO2Data = "SELECT Date, CO2 FROM carbon_values";
        $resultCO2Data = $conn->query($sqlCO2Data);
        $co2Data = array();
        while ($rowCO2Data = $resultCO2Data->fetch_assoc()) {
            $co2Data[] = $rowCO2Data;
        }

        $conn->close();
        ?>
        
        <div class="dashboard-chart">
            <canvas id="co2Chart"></canvas>
        </div>
        <div class="dashboard-card">
            <h2>Total Records</h2>
            <p><?php echo $totalRows; ?></p>
        </div>
        <div class="dashboard-card">
            <h2>Records today</h2>
            <p><?php echo $todayInsertedValues; ?></p>
        </div>
        <div class="dashboard-card">
            <h2>Maximum CO2 level recorded</h2>
            <p><?php echo $maxCO2Level; ?></p>
        </div>
        <div class="dashboard-card">
            <h2>Country with the highest CO2 level</h2>
            <p><?php echo $maxCO2Country; ?></p>
        </div>


        <script>
            var ctx = document.getElementById('co2Chart').getContext('2d');
            var chartData = <?php echo json_encode($co2Data); ?>;
            var dates = chartData.map(function (data) {
                return data.Date;
            });
            var co2Levels = chartData.map(function (data) {
                return data.CO2;
            });

            var co2Chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'CO2 Level',
                        data: co2Levels,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</body>
</html>
