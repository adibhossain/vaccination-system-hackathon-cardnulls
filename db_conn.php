<?php

// $sname= "localhost";

$host = 'db';
$db = 'database-name';
$user = 'username';
$pass = 'password';
$port = '3306';

// $unmae= "root";

// $password = "";

// $db_name = "vaccination_db";

$conn = new mysqli($host, $user, $pass, $db, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// $conn = mysqli_connect($sname, $unmae, $password, $db_name);

// if (!$conn) {

//     echo "Connection failed!";

// }