<?php
// PHP code to connect to the SQL server and fetch data
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

// Check if there are any records
if ($result->num_rows > 0) {
    // Display the total row count
    echo "<h2>Total number of data: " . $result->num_rows . "</h2>";

    // Display the table headers
    echo "<table>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>HOUR</th>
                <th>Country</th>
                <th>Co2</th>
            </tr>";

    // Display the data rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["Name"]."</td>
                <td>".$row["HOUR"]."</td>
                <td>".$row["Country"]."</td>
                <td>".$row["Co2"]."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>
