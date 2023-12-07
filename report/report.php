<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="Style_report.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../about/index_about.html">About</a></li>
            <li><a href="report.php">Report</a></li>
            <li><a href="../admin/index_admin.html">Admin</a></li>
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

    <a href="download.php" class="downloads-button align-right">Download</a> <br>

    <table>
<tr>
<th>Date</th>
<th>device</th>
<th>Hour_of_use</th>
<th>County</th>
<th>Co2</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "carbon_data");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Date, device, Hour_of_use,County,Co2 FROM carbon_values";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Date"]. "</td><td>" . $row["device"] . "</td><td>". $row["Hour_of_use"]. "</td><td>". $row["County"]. "</td><td>". $row["Co2"]. "</td></tr>";

}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>





    
</body>
</html>
