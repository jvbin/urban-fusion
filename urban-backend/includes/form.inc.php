<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data and sanitize it
    $id = (int)$_POST["id"];
    $store_name = htmlspecialchars($_POST["store_name"]);
    $store_address = htmlspecialchars($_POST["store_address"]);
    $zip_code = (int)$_POST["zip_code"];
    $contact_info = htmlspecialchars($_POST["contact_info"]);
    $shop_status = htmlspecialchars($_POST["shop_status"]);
    $selected_default = isset($_POST["selected_default"]) ? 1 : 0;
    $latitude = (float)$_POST["latitude"];
    $longitude = (float)$_POST["longitude"];

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

    // Prepare and execute the SQL query to insert data into the database
    $sql = "INSERT INTO stores (store_name, store_address, zip_code, contact_info, shop_status, selected_default, latitude, longitude)
            VALUES ('$store_name', '$store_address', $zip_code, '$contact_info', '$shop_status', $selected_default, $latitude, $longitude)";

    if ($conn->query($sql) === TRUE) {

        header("location:../grid.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
