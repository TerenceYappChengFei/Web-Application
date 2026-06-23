<?php
session_start();

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
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<style>
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <button><a class="link" href="booklist.php">Back</a></button>
     <table width="1100">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Year Joined</th>
        </tr>

        <?php

        $query = "SELECT * FROM student WHERE email = '$email'";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['yearjoin'] ?></td>
                <td><input type="button" value="Edit"></a></td>
            </tr>
            </tr>

        <?php
        }
    mysqli_close($conn);
        
        ?>
</body>
</html>