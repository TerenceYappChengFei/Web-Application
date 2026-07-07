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

session_start();

$name = $_POST["name"];
$password = $_POST["password"];
$yearjoin = $_POST["yearjoin"];

// SQL to update a record
$sql = "UPDATE student SET name='$name', password='$password', yearjoin='$yearjoin' WHERE email='" . $_SESSION["email"] . "'";
/*
$sql = "UPDATE student SET name='" . $_POST["name"] . "', password='" . $_POST["password"] . "', yearjoin='" . $_POST["yearjoin"] . "' WHERE email='" . $_SESSION["email"] . "'";
*/

if (mysqli_query($conn, $sql)) {
    header("Location:profile.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
