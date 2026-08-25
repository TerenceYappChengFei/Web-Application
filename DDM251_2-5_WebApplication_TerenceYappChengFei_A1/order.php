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
    <title>Orders</title>
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
    <button><a href="product.php"><input type="submit" value="Product"></a></button>


    <table width="1100">
        <tr>
            <th>Order ID</th>
            <th width="300">Product Name</th>
            <th width="300">Customer Username</th>
            <th>Quantity</th>
            <th>Total Price (RM)</th>
        </tr>

        <?php

        $query = "SELECT orders.orderID, product.ProductName, customer.Username,
                         orders.orderQuantity, product.UnitPrice
                  FROM orders
                  JOIN product ON orders.productID = product.ProductID
                  JOIN customer ON orders.customerID = customer.CustomerID";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['orderID'] ?></td>
                <td><?php echo htmlspecialchars($row['ProductName']) ?></td>
                <td><?php echo htmlspecialchars($row['Username']) ?></td>
                <td><?php echo $row['orderQuantity'] ?></td>
                <td><?php echo number_format($row['orderQuantity'] * $row['UnitPrice'], 2) ?></td>
                <td><input type="button" value="Read"></a></td>
                <td>
                    <a href="editOrder.php?orderID=<?php echo $row['orderID']; ?>">
                        <input type='button' value='Edit'>
                    </a>
                </td>
                <td>
                    <button onclick="confirmDelete('<?php echo $row['orderID']; ?>')">Delete
                    </button>
                    </a>
                </td>
            </tr>

        <?php
        }
    mysqli_close($conn);
        
        ?>

    </table>
    <button><a href="addOrder.php"><input type="submit" value="Add Order"></a></button>
    <button><a href="logout.php"><input type="submit" value="Logout"></a></button>

    <script>
        function confirmDelete(OrderID) {
            let text = "Are you sure you want to delete the order with ID:" + OrderID + "?";

            if (confirm(text) == true) {

                window.location.href = "deleteOrder.php?orderID=" + OrderID;
            }
        }
    </script>

</body>
</html>
