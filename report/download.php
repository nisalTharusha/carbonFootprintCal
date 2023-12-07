<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbon_data";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // Redirect to an error page if the connection fails
    header("Location: error.html");
    exit();
}


$sql = "SELECT * FROM carbon_values";


$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $filename = "carbon_data.csv";
    

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');


    $output = fopen('php://output', 'w');


    fputcsv($output, array('Date', 'Device', 'Hour of use', 'Country', 'CO2'));


    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }


    fclose($output);
}


$conn->close();
?>
