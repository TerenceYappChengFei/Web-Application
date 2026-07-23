<?php
$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$CustomerID = $_POST["CustomerID"];
$Username = $_POST["Username"];
$Name = $_POST["Name"];
$Password = $_POST["Password"];

if (empty($Name) || empty($Password) || empty($Username) || empty($CustomerID)) {
    header("Location: editCustomer.php?CustomerID=$CustomerID&error=All fields must be filled");
    exit();
}

if (strlen($Password) < 6) {
    header("Location: editCustomer.php?CustomerID=$CustomerID&error=Password must be at least 6 characters");
    exit();
}

// SQL to update a record
$sql = "UPDATE customer SET Username='$Username', Name='$Name', Password='$Password' WHERE CustomerID='$CustomerID'";


if (mysqli_query($conn, $sql)) {
    header("Location:customer.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
