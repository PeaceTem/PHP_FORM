<?php
// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$database = "registration";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $database, 3306);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


// phpinfo();
?>