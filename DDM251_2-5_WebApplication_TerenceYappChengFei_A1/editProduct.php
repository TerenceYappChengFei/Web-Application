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

if (isset($_GET['error'])) {
    echo $_GET['error'] . "</p>";
}

$ProductID = $_GET['ProductID'];

$sql = "SELECT * FROM product WHERE ProductID='$ProductID'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <button>
        <a class="link" href="product.php">Back</a>
    </button>

    <table width="600">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Unit Price (RM)</th>
            <th>Description</th>
        </tr>

        <form action="runEditProduct.php" method="POST">
            <tr>
                <td>
                    <?php echo $product['ProductID']; ?>
                    <input type="hidden" name="ProductID" value="<?php echo $product['ProductID']; ?>">
                </td>
                <td><input type="text" name="ProductName" value="<?php echo $product['ProductName']; ?>"></td>
                <td><input type="text" name="UnitPrice" value="<?php echo $product['UnitPrice']; ?>"></td>
                <td><input type="text" name="Description" value="<?php echo $product['Description']; ?>"></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </form>
    </table>

</body>

</html>