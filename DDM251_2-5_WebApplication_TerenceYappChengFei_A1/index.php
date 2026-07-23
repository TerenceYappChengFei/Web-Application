<?php
session_start();

$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Only run this when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = $_POST["Username"];
  $userPassword = $_POST["Password"];

  // Check if username and password exist in customer table
   $sql = "SELECT * FROM customer 
          WHERE Username = '$username' 
          AND Password = '$userPassword'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $_POST['Username'];
    header("Location: customer.php");
    exit();
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
    <h2>Enter your username:</h2>
    <input type="text" name="Username" required>

    <br>

    <h2>Password</h2>
    <input type="Password" name="Password" required>

    <br><br>

    <input type="submit" value="Login">
  </form>

  <h2>
    <?php echo $message; ?>
  </h2>

</body>
</html>