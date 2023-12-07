<?php
// Retrieve form data
$product1 = $_POST['product1'];
$product2 = $_POST['product2'];
$product3 = $_POST['product3'];

// Validate and sanitize the data as needed




// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbon_data";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//coloum 1  Date
$currentDateTime = date("Y-m-d H:i:s");

//coloum 2 Date

if (!empty($product1)) {
    // Retrieve the selected option text
    $selectedOptionText = '';
    
    switch ($product1) {
        case '0.2':
            $selectedOptionText = 'Desktop Computer';
            break;
        case '0.05':
            $selectedOptionText = 'Laptop Computer';
            break;
        case '0.03':
            $selectedOptionText = 'Printer';
            break;
        case '0.15':
            $selectedOptionText = 'Projector';
            break;
        case '5':
            $selectedOptionText = 'Refrigerators';
            break;
        case '5':
            $selectedOptionText = 'Air conditioners';
            break;
        case '5':
            $selectedOptionText = 'Washing machines';
            break;
        case '5':
            $selectedOptionText = 'Dishwashers';
            break;
        default:
            // Handle other cases if needed
            break;
    }

} else {
    // Handle the case when no option is selected
    echo "No option selected.";
}

//col 3 
$cw = 0.6;
$co2_cost = ($product1 * $product2 * $cw);
$co2_cost = number_format($co2_cost, 3);




// Update the SQL table with the form data
$sql = "INSERT INTO carbon_values (Date, device, Hour_of_use,County,Co2) VALUES ('$currentDateTime', '$selectedOptionText', '$product2','$product3','$co2_cost')";

if ($conn->query($sql) === TRUE) {
    // Data updated successfully, redirect back to the index page
    header("Location: index.html");
    exit(); // Terminate the current script to prevent further execution
} else {
    echo "Error updating data: " . $conn->error;
}
$conn->close();
?>