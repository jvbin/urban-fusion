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

?>

<!DOCTYPE html>
<html>

<head>
    <title>Store table</title>
    <link rel="stylesheet" type="text/css" href="styles/grid.css">

    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>

    <h2>Store Table</h2>
    <button onclick="window.location.href='form.php'">Add New Store</button>
    <table>
        <tr>
            <th>Store ID</th>
            <th>Store Name</th>
            <th>Store Address</th>
            <th>Zip code</th>
            <th>Contact Info</th>
            <th>Shop Status</th>
            <th>Selected Default</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <?php
        // Loop through the fetched data and display it in the grid
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["store_name"] . "</td>";
                echo "<td>" . $row["store_address"] . "</td>";
                echo "<td>" . $row["zip_code"] . "</td>";
                echo "<td>" . $row["contact_info"] . "</td>";
                echo "<td>" . $row["shop_status"] . "</td>";
                echo "<td>" . $row["selected_default"] . "</td>";
                echo "<td>" . $row["latitude"] . "</td>";
                echo "<td>" . $row["longitude"] . "</td>";
                echo '<td>';
                echo '<div class="btn1">';
                echo '<form action="updateStore.php?id=' . $row["id"] . '&store_name=' . $row["store_name"] . '&store_address=' . $row["store_address"] . '&zip_code=' . $row["zip_code"] . '&contact_info=' . $row["contact_info"] . '&shop_status=' . $row["shop_status"] . '&selected_default=' . $row["selected_default"] . '&latitude=' . $row["latitude"] . '&longitude=' . $row["longitude"] . '" method="POST">';
                echo '<input type="hidden" value="' . $row["id"] . '" name="val" />';
                echo '<input type="submit" value="Update" class="btn" name="submit" />';
                echo '</form>';
                echo '</div>';
                echo '</td>';
                echo '<td>';
                echo '<div class="btn1">';
                echo '<form action="./includes/delete.inc.php?id=' . $row["id"] . '" method="POST">';
                echo '<input type="hidden" value="' . $row["id"] . '" name="val" />';
                echo '<button name="submit" onClick="return confirm(\'Are you sure you want to delete this store?\');" href="./includes/delete.inc.php?id=' . $row["users_id"] . '">Delete</button>';
                '</form>';
                echo '</div>';
                echo '</td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>
    <script>
        // Function to fetch data from the API endpoint and populate the table
        function fetchData() {
            fetch('api.php') // Change the URL to your API endpoint
                .then(response => response.json())
                .then(data => {
                    // Get a reference to the table
                    const storeTable = document.getElementById('storeTable');

                    // Loop through the fetched data and create rows in the table
                    data.forEach(store => {
                        const row = storeTable.insertRow();

                        // Add cell values for each row
                        row.insertCell().textContent = store.id;
                        row.insertCell().textContent = store.store_name;
                        // Add more cells as needed
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Call the function to fetch and populate the table on page load
        fetchData();
    </script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
