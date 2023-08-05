<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "terrificminds";
$dbname = "urban_fusion";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the database
$sql = "SELECT * FROM stores";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    $data = array();
    // Loop through the fetched data and add it to the $data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // Convert the $data array to JSON and output it
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // No data found
    echo json_encode(array("message" => "No data found"));
}

// Close the database connection
$conn->close();
