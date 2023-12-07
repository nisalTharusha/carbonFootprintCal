<?php
// PHP code to download SQL data as a CSV file
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "master";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the data
$sql = "SELECT id, Name, HOUR, Country, Co2 FROM test_report_CO";
$result = $conn->query($sql);

// Generate the CSV data
$csvData = "SELECT id, Name, HOUR, Country, Co2\n";
while ($row = $result->fetch_assoc()) {
    $csvData .= $row["id"] . "," . $row["Name"] . "," . $row["HOUR"] . "," . $row["Country"] . "," . $row["Co2"] . "\n";
}

// Set the appropriate headers for CSV download
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="sql_data.csv"');

// Output the CSV data
echo $csvData;

// Close the connection
$conn->close();
?>
