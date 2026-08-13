<?php
session_start();

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

date_default_timezone_set('Asia/Kuala_Lumpur');
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$code = '';

for ($i = 0; $i < 6; $i++) {
    $code .= $characters[random_int(0, strlen($characters) - 1)];
}

$uniqueCode = date('YmdHis') . "_" . $code;

$_SESSION["UID"] = $uniqueCode;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name = $_POST["name"];
    $Email = $_POST["Email"];
    $Age = $_POST["Age"];

    $insert = "INSERT INTO uid
               (name, Email, Age, UID)
               VALUES ('$Name', '$Email', '$Age', '$uniqueCode')";

    mysqli_query($conn, $insert);

    header("Location: 3games.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UID</title>

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
    <h2>Name:</h2>
    <input type="text" name="name" required>

    <br>

    <h2>Email:</h2>
    <input type="email" name="Email" required>

    <br>

    <h2>Age:</h2>
    <input type="number" name="Age" required>

    <br><br>

      <input type="submit" value="Login">
  </form>

  <h2>
    <?php echo $uniqueCode; ?>
  </h2>
</body>

</html>