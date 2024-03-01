<?php

if (isset($_POST["submit"])) {
    
    $fist_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["PASSWORD"];
    $passwordrpt = $_POST["PASSWORDrpt"];
    $telephone = $_POST["telephone"];
    $postcode = $_POST["postcode"];
    $title = $_POST["title"];
    $gender = $_POST["gender"];
    $adress1 = $_POST["adress1"];
    $adress2 = $_POST["adress2"];
    $adress3 = $_POST["adress3"];
    $description = $_POST["description"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($fist_name, $last_name, $email, $username, $password, $passwordrpt, $telephone, $postcode, $gender, $adress1, $title) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidemail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $passwordrpt) !== false) {
        header("location: ../signup.php?error=passwordsdontwatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $fist_name, $last_name, $email, $username, $password, $title, $adress1, $gender, $postcode, $telephone, $adress2, $adress3, $description);

}
else {
    header("location: ../signup.php");
    exit();
}