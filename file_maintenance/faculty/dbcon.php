<?php

$connection = "localhost";
$username = "root";
$password = "root";
$port = 3306;
$db_name = "cgs";

$conn = mysqli_init();
mysqli_options($conn, MYSQLI_OPT_LOCAL_INFILE, true);
mysqli_real_connect($conn, $connection, $username, $password, $db_name, $port);

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}


?>

