<?php
session_start();
if(isset($_POST['submit'])) {
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $id = $_POST['id'];
    $make = $_POST["make"];
    $model = $_POST["model"];
    $bodytype = $_POST["btype"];
    $fueltype = $_POST["ftype"];
    $mileage = $_POST["mileage"];
    $location = $_POST["location"];
    $year = $_POST["year"];
    $numdoors = $_POST["ndoors"];
    $vurl = $_POST["vurl"];
    $iurl = $_POST["iurl"];

    editVehicle($conn, $id, $make, $model, $bodytype, $fueltype, $mileage, $location, $year, $numdoors, $vurl, $iurl);

}

else {
    header("location: ../editv.php");
    exit();
}