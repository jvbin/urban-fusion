<?php

include './autoloaderInc.inc.php';

$id = $_GET['id'];
$taskContrObj = new FormContr();
$taskContrObj->deleteStore($id);

header("location: ../grid.php?id=$id");

exit;
