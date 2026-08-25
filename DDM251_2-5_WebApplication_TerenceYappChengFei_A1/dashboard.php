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

// Count the number of orders
$orderQuery = "SELECT COUNT(orderID) AS totalOrders, SUM(orderQuantity) AS totalUnits FROM orders";
$orderResult = mysqli_query($conn, $orderQuery);
$orderRow = mysqli_fetch_assoc($orderResult);

// Get the top 3 selling products
$topProductQuery = "SELECT product.ProductName, SUM(orders.orderQuantity) AS quantitySold
                    FROM orders
                    JOIN product ON orders.productID = product.ProductID
                    GROUP BY product.ProductID, product.ProductName
                    ORDER BY quantitySold DESC
                    LIMIT 3";
$topProductResult = mysqli_query($conn, $topProductQuery);

// Get products that have not been sold
$unsoldProductQuery = "SELECT product.ProductID, product.ProductName
                       FROM product
                       LEFT JOIN orders ON product.ProductID = orders.productID
                       WHERE orders.orderID IS NULL";
$unsoldProductResult = mysqli_query($conn, $unsoldProductQuery);

// Get customers who have not made a purchase
$customerQuery = "SELECT customer.CustomerID, customer.Username
                  FROM customer
                  LEFT JOIN orders ON customer.CustomerID = orders.customerID
                  WHERE orders.orderID IS NULL";
$customerResult = mysqli_query($conn, $customerQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <button><a href="order.php"><input type="submit" value="Order"></a></button>

    <h1>Dashboard</h1>

    <h2>Order Summary</h2>
    <p>Total Orders: <?php echo $orderRow['totalOrders']; ?></p>
    <p>Total Units Sold: <?php echo $orderRow['totalUnits'] ?? 0; ?></p>

    <h2>Top 3 Selling Products</h2>
    <table width="500">
        <tr>
            <th>Product Name</th>
            <th>Quantity Sold</th>
        </tr>

        <?php
        if (mysqli_num_rows($topProductResult) > 0) {
            while ($row = mysqli_fetch_assoc($topProductResult)) {
        ?>
                <tr>
                    <td><?php echo $row['ProductName']; ?></td>
                    <td><?php echo $row['quantitySold']; ?></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td>No products have been sold.</td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>Products That Have Not Been Sold</h2>
    <table width="500">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
        </tr>

        <?php
        if (mysqli_num_rows($unsoldProductResult) > 0) {
            while ($row = mysqli_fetch_assoc($unsoldProductResult)) {
        ?>
                <tr>
                    <td><?php echo $row['ProductID']; ?></td>
                    <td><?php echo $row['ProductName']; ?></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="2">All products have been sold.</td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>Customers Who Have Not Purchased</h2>
    <table width="500">
        <tr>
            <th>Customer ID</th>
            <th>Username</th>
        </tr>

        <?php
        if (mysqli_num_rows($customerResult) > 0) {
            while ($row = mysqli_fetch_assoc($customerResult)) {
        ?>
                <tr>
                    <td><?php echo $row['CustomerID']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="2">All customers have made a purchase.</td>
            </tr>
        <?php
        }
        ?>
    </table>

    <button><a href="logout.php"><input type="submit" value="Logout"></a></button>
</body>
</html>

<?php
mysqli_close($conn);
?>
