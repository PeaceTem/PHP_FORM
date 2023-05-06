

<?php
require 'connect.php';

$sqlLanguage = "SELECT * FROM language";
$result_language = mysqli_query($conn, $sqlLanguage);

  // output data of each row
  while($language = mysqli_fetch_assoc($result_language)) {
    echo "<option value='" . $language["language"] . "'>" . $language["language"] . "</option>";
  } 


        // Close the database connection
        mysqli_close($conn);
?>