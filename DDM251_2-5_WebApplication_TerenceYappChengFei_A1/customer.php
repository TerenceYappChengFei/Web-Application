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
    <title>Customer</title>
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
    <button><a href="product.php"><input type="submit" value="Product"></a></button>

    <table width="1100">
        <tr>
            <th>Customer ID</th>
            <th width="300">Username</th>
            <th width="200">Full Name</th>
            <th width="200">Password</th>
        </tr>

        <?php

        $query = "SELECT * FROM customer";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['CustomerID'] ?></td>
                <td><?php echo $row['Username'] ?></td>
                <td><?php echo $row['Name'] ?></td>
                <td><?php echo $row['password'] ?></td>

                <td><input type="button" value="Read"></a></td>
                <td>
                    <a href="editCustomer.php?CustomerID=<?php echo $row['CustomerID']; ?>">
                        <input type='button' value='Edit'>
                    </a>
                </td>
                <td><input type="button" value="Delete"></a></td>
            </tr>

        <?php
        }
    mysqli_close($conn);
        
        ?>

    </table>
    <button><a href="addCustomer.php"><input type="submit" value="Add Customer"></a></button>
    <button><a href="index.php"><input type="submit" value="Logout"></a></a></button>



</body>
</html>