<?php

session_start();

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pswd = $_POST["pswd"];

    $_SESSION["pswd"] = $pswd;

    function useremail($email)
    {
        return $email;
    }
    function userpswd($pswd)
    {
        return $pswd;
    }

    include "../classes/Dbh.class.php";
    include "../classes/Login.classes.php";
    include "../classes/LoginContr.classes.php";

    $login = new LoginContr();
    $login->loginUser($email, $pswd);

    if (isset($_POST["remember"])) {
        header("location:../login.php?status=remember");
    } else {
        header("location:../login.php?status=notremember");
    }
}
