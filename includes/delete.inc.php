<?php
session_start();
if(isset($_POST['submit'])) {
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $id = $_GET['id'];

    deleteVehicle($conn, $id);

}

else {
    header("location: ../manage.php");
    exit();
}