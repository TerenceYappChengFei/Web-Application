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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$customerID = $_POST['CustomerID'];
$username = $_POST['Username'];
$name = $_POST['Name'];
$password = $_POST['Password'];

$sql = "INSERT INTO customer (CustomerID, Username, Name, Password)
        VALUES ('$customerID', '$username', '$name', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New user created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>