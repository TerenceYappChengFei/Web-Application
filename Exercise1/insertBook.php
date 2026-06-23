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

$ISBN = $_POST['ISBN'];
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql = "INSERT INTO booklist (ISBN, title, author, description, price)
        VALUES ('$ISBN', '$title', '$author', '$description', $price)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>