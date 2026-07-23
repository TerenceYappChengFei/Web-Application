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
    <title>Product</title>
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
    <button><a href="customer.php"><input type="submit" value="Customer"></a></button>

    <table width="1100">
        <tr>
            <th>Product ID</th>
            <th width="300">Product Name</th>
            <th width="300">Unit Price (RM)</th>
            <th>Description</th>
        </tr>

        <?php

        $query = "SELECT * FROM product";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['ProductID'] ?></td>
                <td><?php echo $row['ProductName'] ?></td>
                <td><?php echo $row['UnitPrice'] ?></td>
                <td><?php echo $row['Description'] ?></td>
                <td><input type="button" value="Read"></a></td>
                <td><input type="button" value="Edit"></a></td>
                <td><input type="button" value="Delete"></a></td>
            </tr>

        <?php
        }
    mysqli_close($conn);
        
        ?>

    </table>
    <button><a href="addProduct.php"><input type="submit" value="Add Product"></a></button>
    <button><a href="logout.php"><input type="submit" value="Logout"></a></button>



</body>
</html>