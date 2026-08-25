<?php
$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$orderID = (int)($_GET['orderID'] ?? 0);

$statement = $conn->prepare("DELETE FROM orders WHERE orderID = ?");
$statement->bind_param("i", $orderID);

if ($statement->execute()) {
    header("Location: order.php");
    exit();
} else {
    echo "Error deleting record: " . $statement->error;
}

$conn->close();
?>


<body>
  <button><a href="order.php"><input type="submit" value="View Orders"></a></button>
</body>
