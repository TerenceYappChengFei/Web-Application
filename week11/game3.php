<?php
$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";
session_start();

$message = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uid = $_SESSION['UID'];
    $game1 = $_POST["G3"];

    $limit = "SELECT attempts_g3 FROM uid WHERE UID = '$uid'";
    $result = mysqli_query($conn, $limit);
    $row = mysqli_fetch_assoc($result);
    $attempts = $row['attempts_g3'];   
    $attempts++;
    
    echo "Attempts: " . $attempts . "<br>";

    if($attempts == 2) {
        $message = "You have reached the limit of 2 attempts for Game 3.";
    }
    else if($attempts < 2) {
     $update = "UPDATE uid
               SET G3 = '$game1', attempts_g3 = '$attempts'
               WHERE UID = '$uid'";
              //  $_POST['attempts']++;
              // $updateAttempts = "UPDATE uid SET attempts = '$attempts' WHERE UID = '$uid'";
               
    mysqli_query($conn, $update);
    } 

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
  <a href="3games.php"><input type="submit" value="Back"></a>

  <br><br>

  <form target="_self" method="POST">

    <input type="submit" name="G3" value="0">


    <input type="submit" name="G3" value="1">


    <input type="submit" name="G3" value="2">

    <br><br>

    <input type="submit" name="G3" value="3">


    <input type="submit" name="G3" value="4">


    <input type="submit" name="G3" value="5">

</form>

  <h2>
    <?php echo $message;?>
  </h2>

</body>
</html>