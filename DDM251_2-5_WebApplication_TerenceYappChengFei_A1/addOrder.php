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
    <title>Add Order</title>

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
    <button><a class="link" href="orders.php">Back</a></button>

    
    <table>
        <tr>
            <th>Product ID</th>
            <th>Customer ID</th>
            <th>Order Quantity</th>
        </tr>
        <tr>
                <form action="insertOrder.php" method="POST">
                <td>
                    <select name="productID" required>
                        <option value="">Select a product</option>
                        <?php
                        $products = $conn->query("SELECT ProductID, ProductName, UnitPrice FROM product ORDER BY ProductName");
                        while ($product = $products->fetch_assoc()) {
                            echo '<option value="' . $product['ProductID'] . '">' .
                                htmlspecialchars($product['ProductName']) . ' (RM ' .
                                number_format($product['UnitPrice'], 2) . ')</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="customerID" required>
                        <option value="">Select a customer</option>
                        <?php
                        $customers = $conn->query("SELECT CustomerID, Username FROM customer ORDER BY Username");
                        while ($customer = $customers->fetch_assoc()) {
                            echo '<option value="' . $customer['CustomerID'] . '">' .
                                htmlspecialchars($customer['Username']) . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="orderQuantity" min="1" required></td>
                <td><input type="submit" value="Add"></td>
                </form>
        </tr>
    </table>
</body>

</html>
