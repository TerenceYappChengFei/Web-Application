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

$CustomerID = $_POST['customerID'];
$ProductID = $_POST['productID'];
$OrderQuantity = $_POST['orderQuantity'];

$sql = "INSERT INTO orders (customerID, productID, orderQuantity)
        VALUES ('$CustomerID', '$ProductID', '$OrderQuantity')";

if ($conn->query($sql) === TRUE) {
  echo "New order created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

<body>
  <button><a href="order.php"><input type="submit" value="View Orders"></a></button>
  <button><a href="addOrder.php"><input type="submit" value="Back"></a></button>
</body>