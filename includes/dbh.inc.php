<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "rentmycar";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failes: ". mysqli_connect_error());
}