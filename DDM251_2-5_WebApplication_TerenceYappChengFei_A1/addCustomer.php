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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>

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

</head>

<body>
    <button><a class="link" href="customer.php">Back</a></button>

    
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Password</th>
        </tr>
        <tr>
                <form action="insertCustomer.php" method="POST">
                <td><input type="text" name="CustomerID" ></td>
                <td><input type="text" name="Username" ></td>
                <td><input type="text" name="Name" ></td>
                <td><input type="text" name="Password" ></td>
                <td><input type="submit" value="Add"></td>
                </form>
        </tr>
    </table>
</body>

</html>