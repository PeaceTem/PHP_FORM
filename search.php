    <h1>Accounts</h1>
    <form method="get">
      <label for="search">Search:</label>
      <input type="text" name="search" id="search" placeholder="search" value="<?php 
      if (isset($_GET['search'])) {
        // $search_term = mysqli_real_escape_string($conn, $_GET['search']);
        $data = trim($_GET['search']);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        echo $data;
       } ?>
        ">
    </form>
    <br>
    <?php
require 'db_connection.php';

      // Check if the search form was submitted
      if (isset($_GET['search'])) {
        // Get the search term from the form input
        $search_term = mysqli_real_escape_string($conn, $_GET['search']);

        // Build the SQL query
        $query = "SELECT * FROM account WHERE name LIKE '%$search_term%'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if any results were found
        if (mysqli_num_rows($result) > 0) {
          // Display the results in an HTML table
          while ($row = mysqli_fetch_assoc($result)) {
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
          // Display a message if no results were found
          echo '<p>No results found.</p>';
        }

        // Close the database connection
        mysqli_close($conn);
      }
    ?>
  </body>
</html>
