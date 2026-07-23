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

$customerID = $_POST['ProductID'];
$username = $_POST['ProductName'];
$name = $_POST['UnitPrice'];
$password = $_POST['Description'];

$sql = "INSERT INTO product (ProductID, ProductName, UnitPrice, Description)
        VALUES ('$customerID', '$username', '$name', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New product created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

<body>
  <button><a href="product.php"><input type="submit" value="View Products"></a></button>
  <button><a href="addProduct.php"><input type="submit" value="Back"></a></button>
</body>