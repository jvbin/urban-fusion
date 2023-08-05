<?php include "./includes/form.inc.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Store Information Form</title>
    <link rel="stylesheet" type="text/css" href="styles/form.css">
</head>

<body>
    <form action="./includes/form.inc.php" method="POST">
        <label>Store Name:</label>
        <input type="text" name="store_name" required><br>

        <label>Store Address:</label>
        <textarea name="store_address" required></textarea><br>

        <label>Zip Code:</label>
        <input type="int" name="zip_code" required pattern="[0-9]{5}"><br>

        <label>Contact Info:</label>
        <input type="int" name="contact_info" required pattern="[0-9]+"><br>

        <label>Shop Status:</label>
        <input type="text" name="shop_status" required><br>

        <label>Selected Default:</label>
        <input type="checkbox" name="selected_default"><br>

        <label>Latitude:</label>
        <input type="text" name="latitude" required><br>

        <label>Longitude:</label>
        <input type="text" name="longitude" required><br>

        <input type="submit" value="Save">
    </form>
</body>

</html>