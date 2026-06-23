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

// SQL to update a record
//$sql = "UPDATE student SET name='halo' WHERE email = '" . $_SESSION['email'] . "'";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$password = $_POST['password'];
$name = $_POST['name'];
$yearjoin = $_POST['year_joined'];

$sql = "UPDATE booklist SET password='$password', name='$name', yearjoin='$yearjoin' WHERE email = '" . $_SESSION['email'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Profile Updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>