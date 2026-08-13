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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Games</title>

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

    <input type="submit" value="0">


    <input type="submit" value="1">


    <input type="submit" value="2">

    <br><br>

    <input type="submit" value="3">


    <input type="submit" value="4">


    <input type="submit" value="5">

  </form>

  <h2>
    <?php echo $message; ?>
  </h2>

</body>
</html>