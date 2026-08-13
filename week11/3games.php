<?php

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
    <h2>Games 1</h2>
    <a href="game1.php">Enter</a>
    <br><br>

    <h2>Games 2</h2>
    <a href="game2.php">Enter</a>
    <br><br>    

    <h2>Games 3</h2>
    <a href="game3.php">Enter</a>
  </form>

  <h2>
    <?php echo $message; ?>
  </h2>

</body>
</html>