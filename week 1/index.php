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
// echo "Connected successfully";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=x, initial-scale=1.0">
  <title>Document</title>
 
 <style>
  * {
    font-size:20px;
  }

  body {
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
  }
</style>

</head>

<body>
  <div id="email">
    <form target="_self" method=POST>
      <h2>Enter your Email:</h2>
      <input type="email" name="email" id="email">
      <br />
      <h2>Password</h2>
      <input type="password" name="password">
      <input type="submit">
    </form> 
  </div>
</body>
</html>