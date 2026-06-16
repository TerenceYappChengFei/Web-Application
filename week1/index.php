<?php
$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Only run this when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST["email"];
  $userPassword = $_POST["password"];

  // Check if email and password exist in student table
   $sql = "SELECT * FROM student 
          WHERE email = '$email' 
          AND password = '$userPassword'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    //this text tells us that user is found
    //$message = "User Found";
    header("<Location: class="">
    <week1>booklist.php");
  } else {
    $message = "No User Found";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Check</title>

  <style>
    * {
      font-size: 20px;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }
  </style>
</head>

<body>

  <form target="_self" method="POST">
    <h2>Enter your Email:</h2>
    <input type="email" name="email" required>

    <br>

    <h2>Password</h2>
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" value="Login">
  </form>

  <h2>
    <?php echo $message; ?>
  </h2>

</body>
</html>