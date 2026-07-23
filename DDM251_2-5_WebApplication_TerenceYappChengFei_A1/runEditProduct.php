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


$ProductID = $_POST["ProductID"];
$ProductName = $_POST["ProductName"];
$UnitPrice = $_POST["UnitPrice"];
$Description = $_POST["Description"];

if (empty($ProductName) || empty($UnitPrice) || empty($Description) || empty($ProductID)) {
    header("Location: editProduct.php?ProductID=$ProductID&error=All fields must be filled");
    exit();
}

if (!is_numeric($UnitPrice)) {
    header("Location: editProduct.php?ProductID=$ProductID&error=Price must be a number");
    exit();
}

// SQL to update a record
$sql = "UPDATE product SET ProductName='$ProductName', UnitPrice='$UnitPrice', Description='$Description' WHERE ProductID='$ProductID'";


if (mysqli_query($conn, $sql)) {
    header("Location:product.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
