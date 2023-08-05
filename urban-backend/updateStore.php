<?php

include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Store</title>
    <link rel="stylesheet" href="styles/update-style.css">
</head>

<body>
    <div class="content">
        <form action="./includes/updateStore.inc.php" method="post">
            <h2>Update Store</h2>
            <label><b>Store Name</b></label><br>
            <input class="input" type="text" name="store_name" required placeholder="Enter Store Name" value="<?php echo $_GET['store_name']; ?>"><br><br>

            <label><b>Store Address</b></label><br>
            <input class="input" type="textarea" name="store_address" required placeholder="Enter Store Address" value="<?php echo $_GET['store_address']; ?>"><br><br>

            <label><b>Zip Code</b></label><br>
            <input class="input" type="int" name="zip_code" required pattern="[0-9]{5} placeholder=" Enter Zip Code" value="<?php echo $_GET['zip_code']; ?>"><br><br>

            <label><b>Contact Info:</b></label><br>
            <input class="input" type="int" name="contact_info" required pattern="[0-9]+" placeholder="Enter Contact Info" value="<?php echo $_GET['contact_info']; ?>"><br><br>

            <label><b>Shop Status</b></label><br>
            <input class="input" type="text" name="shop_status" required placeholder="Enter Shop status" value="<?php echo $_GET['shop_status']; ?>"><br><br>

            <label><b>Selected Default</b></label><br>
            <input class="input" type="checkbox" name="selected_default" placeholder="Enter Selected Default" value="<?php echo $_GET['selected_default']; ?>"><br><br>

            <label><b>Latitude</b></label><br>
            <input class="input" type="text" name="latitude" required placeholder="Enter Latitude" value="<?php echo $_GET['latitude']; ?>"><br><br>

            <label><b>Longitude</b></label><br>
            <input class="input" type="text" name="longitude" required placeholder="Enter Longitude" value="<?php echo $_GET['longitude']; ?>"><br><br>

            <div class="link">
                <button class="btn" name="submit" type="submit" data-inline="true">Update</button>
                <a style="text-decoration:none" class="btn cancel" href="grid.php">Cancel</a>
            </div>
            <div style="display:none"><input type="hidden" value="<?php echo $_GET['id']; ?>" name="val" /></div>
    </div>
    </form>

    <?php


    if ($_GET['error'] === "emptyinput") {
        echo "<p class='err1'>Please fill all the fields</p>";
    } elseif ($_GET['error'] === "invalidemail") {
        echo "<p class='err1'>Please enter valid entry</p>";
    }
    ?>


    </div>
</body>

</html>