
<?php

if (isset($_POST["submit"])) {
    $id = $_POST['val'];

    $store_name = $_POST["store_name"];
    $store_address = $_POST["store_address"];
    $zip_code = $_POST["zip_code"];
    $contact_info = $_POST["contact_info"];
    $shop_status = $_POST["shop_status"];
    $selected_default = $_POST["selected_default"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    include "../classes/Dbh.class.php";
    include "../classes/updateStore.class.php";
    include "../classes/updateContr.class.php";

    $update = new updateContr();
    $update->getStore($id, $store_name, $store_address, $zip_code, $contact_info, $shop_status, $selected_default, $latitude, $longitude);

    header("location: ../grid.php?status=sucess");
} else {
    header("Location: 'grid.php");
}
