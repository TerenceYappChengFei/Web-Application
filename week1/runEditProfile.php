<?php
session_start();

$servername = "localhost";
$username = "terence243051";
$dbpassword = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";

$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = trim($_POST["name"]);
$password = trim($_POST["password"]);
$confirmPassword = trim($_POST["confirmPassword"]);
$yearjoin = trim($_POST["yearjoin"]);

if (empty($name) || empty($password) || empty($confirmPassword) || empty($yearjoin)) {
    header("Location: editProfile.php?error=All fields must be filled");
    exit();
}

if (strlen($password) < 6) {
    header("Location: editProfile.php?error=Password must be at least 6 characters");
    exit();
}

if ($password != $confirmPassword) {
    header("Location: editProfile.php?error=Password field is not the same");
    exit();
}

if ($yearjoin > date("Y")) {
    header("Location: editProfile.php?error=Year joined cannot be more than the current year");
    exit();
}

$email = $_SESSION["email"];

$sql = "UPDATE student SET name=?, password=?, yearjoin=? WHERE email=?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ssis", $name, $password, $yearjoin, $email);

if (mysqli_stmt_execute($stmt)) {
    header("Location: profile.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


mysqli_stmt_close($stmt);
mysqli_close($conn);
?>