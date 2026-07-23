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


$customerID = $_POST["customerID"];
$Username = $_POST["Username"];
$Name = $_POST["Name"];

if (empty($name) || empty($password) || empty($confirmPassword) || empty($yearjoin)) {
    header("Location: editProfile.php?error=All fields must be filled");
    exit();
}

if (strlen($password) < 6) {
    header("Location: editProfile.php?error=Password must be at least 6 characters");
    exit();
}

// SQL to update a record
$sql = "UPDATE customer SET Username='$Username', Name='$Name' WHERE CustomerID='$customerID'";


if (mysqli_query($conn, $sql)) {
    header("Location:customer.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
