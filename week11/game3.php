<?php
$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";
session_start();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uid = $_SESSION['UID'];
    $game3 = $_POST["G3"];


    $update = "UPDATE uid
               SET G3 = '$game3'
               WHERE UID = '$uid'";

    mysqli_query($conn, $update);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game 1</title>

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

    <input type="submit" name="G3" value="0">


    <input type="submit" name="G3" value="1">


    <input type="submit" name="G3" value="2">

    <br><br>

    <input type="submit" name="G3" value="3">


    <input type="submit" name="G3" value="4">


    <input type="submit" name="G3" value="5">

</form>

</body>
</html>