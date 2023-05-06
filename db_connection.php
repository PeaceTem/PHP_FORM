<?php
// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$database = "registration";

// $conn = new mysqli($host, $user, $password, $database, 3306);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";


// Create connection
$conn = mysqli_connect($host, $user, $pass, $database, 3306);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


// phpinfo();
?>