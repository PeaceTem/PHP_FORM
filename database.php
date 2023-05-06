

<?php
require 'db_connection.php';

$sql = "SELECT * FROM account";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo  "Name: " . $row["name"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
    echo "Phone Number: " . $row["phone"] . "<br>";
    echo "Gender: " . $row["gender"] . "<br>";
    echo "Language: " . $row["language"] . "<br>";
    echo "Zip Code: " . $row["zip"] . "<br>";
    echo "About: " . $row["about"] . "<br>";
    echo "<hr>";
  }
} else {
  echo "0 results";
}

        // Close the database connection
        mysqli_close($conn);
?>