<?php

spl_autoload_register(function ($className) {
    $path = "../classes/";
    $extension = ".class.php";
    $fullPath = $path.$className.$extension;

    include_once $fullPath;
});
