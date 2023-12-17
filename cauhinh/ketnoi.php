<?php
$dbHost = 'localhost:3308';
$dbUsername = 'root';
$dbPassword = '';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$dbSelect = mysqli_select_db($conn, 'study');
$setLang = mysqli_query($conn, "SET NAMES 'utf8'");

?>
