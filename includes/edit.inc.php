<?php
session_start();
if (isset($_POST["submit"])) {

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $userid = $_SESSION["user_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $adress1 = $_POST["adress1"];
    $email = $_POST["email"];
    $postcode = $_POST["postcode"];
    $telephone = $_POST["telephone"];


    editUser($conn, $userid, $first_name, $last_name, $email, $adress1, $postcode, $telephone);
}
else {
    header("location: ../edit.php");
    exit();
}