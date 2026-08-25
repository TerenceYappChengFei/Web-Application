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
$cusID= $_GET['CustomerID'];

$sql = "DELETE FROM customer WHERE CustomerID='$cusID'";

if ($conn->query($sql) === TRUE) {

    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>


<body>
  <button><a href="customer.php"><input type="submit" value="View Customers"></a></button>
</body>