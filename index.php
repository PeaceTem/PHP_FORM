
<?php
// cause error, unlike include that just gives warning
// require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-box">
      <img src="passport.jpg">

        <h1>Registration</h1>
        <form id="registration-form" action="" method="post">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Your Name" >
                <div class="error" id="name-error"></div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Your Email" >
                <div class="error" id="email-error"></div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <div class="error" id="password-error"></div>
            </div>

            <div class="form-group">
                <label for="name">Phone Number:</label>
                <input type="tel" name="phone" id="phone">
                <div class="error" id="phone-error"></div>

            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <label for="male">Male:</label>
                <input type="radio" name="gender" id="Male" value="male" >
                <label for="female">Female:</label>
                <input type="radio" name="gender" id="Female" value="female" >
                <label for="others">Others:</label>
                <input type="radio" name="gender" id="Others" value="others" >
                <div class="error" id="gender-error"></div>

            </div>

            <div class="form-group">
                <label for="language">Language:</label>
                <select name="language" id="language">
                    <option value="">Select Language</option>
                    <?php require 'language.php' ?>
                </select>
                <div class="error" id="language-error"></div>
            </div>

            <div class="form-group">
                <label for="zip">Zip Code:</label>
                <input type="number" name="zip" id="zip">
                <div class="error" id="zip-error"></div>
            </div>

            <div class="form-group">
                <label for="about">About:</label>
                <textarea name="about" id="about" cols="30" rows="10" ></textarea>
                <div class="error" id="about-error"></div>
            </div>

            <div class="form-group">
                <input id="submitBtn" type="submit" value="Submit">
            </div>

        </form>
    </div>
    <div class="form-box form-group board">
      <?php require 'search.php' ?>
      <h3>All</h3>
      <hr>
      <?php require 'database.php' ?>
    </div>

  <script src="script.js" type="text/javascript"></script>
</body>
</html>

<?php
require 'connect.php';
// Define variables and set to empty values
$name = $email = $password = $phone = $gender = $language = $zip = $about = "";
$name_error = $email_error = $password_error = $phone_error = $gender_error = $language_error = $zip_error = $about_error = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Validate the name field
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed";
    }
  }
  
  // Validate the email field
  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // Check if email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format";
    }
  }
  
  // Validate the password field
  if (empty($_POST["password"])) {
    $password_error = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  
  // Validate the phone field
  if (empty($_POST["phone"])) {
    $phone_error = "Phone number is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }
  
  // Validate the gender field
  if (empty($_POST["gender"])) {
    $gender_error = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  // Validate the language field
  if (empty($_POST["language"])) {
    $language_error = "Language is required";
  } else {
    $language = test_input($_POST["language"]);
  }
  
  // Validate the zip field
  if (empty($_POST["zip"])) {
    $zip_error = "Zip code is required";
  } else {
    $zip = test_input($_POST["zip"]);
  }
  
  // Validate the about field
  if (empty($_POST["about"])) {
    $about_error = "About field is required";
  } else {
    $about = test_input($_POST["about"]);
  }
  
  // If all fields are valid, redirect to a success page
  if ($name_error == "" and $email_error == "" and $password_error == "" and $phone_error == "" and $gender_error == "" and $language_error == "" and $zip_error == "" and $about_error == "") {
    // header("Location: success.php");
    // Add a tag with a class that has absolute and it disappears in 5 seconds
    // Retrieve the form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);

    // Insert the data into the database
    $sql = "INSERT INTO account (name, email, password, phone, gender, language, zip, about)
    VALUES ('$name', '$email', '$password', '$phone', '$gender', '$language', '$zip', '$about')";

    if (mysqli_query($conn, $sql)) {
    
    // Insert JavaScript code to display a notification after the data has been saved
    echo '<script>
            var notification = document.createElement("div");
            notification.textContent = "Data saved successfully!";
            notification.classList.add("notification");
            document.body.appendChild(notification);
            
            setTimeout(function() {
              notification.style.display = "none";
            }, 5000);
          </script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    exit();
  }
}

// Function to test input values and remove any unnecessary characters
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
