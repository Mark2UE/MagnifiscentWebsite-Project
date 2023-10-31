<?php


$host = "localhost";
$username = "root";
$password = "";
$dbname = "magnifiscent_db";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
