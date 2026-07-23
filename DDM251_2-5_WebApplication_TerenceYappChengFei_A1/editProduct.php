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

$CustomerID = $_GET['CustomerID'];

$sql = "SELECT * FROM customer WHERE CustomerID='$CustomerID'";
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);
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
        <a class="link" href="customer.php">Back</a>
    </button>

    <table width="600">
        <tr>
            <th>Customer ID</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Password</th>

        </tr>

        <form action="runEditCustomer.php" method="POST">
            <tr>
                <td>
                    <?php echo $customer['CustomerID']; ?>
                    <input type="hidden" name="CustomerID" value="<?php echo $customer['CustomerID']; ?>">
                </td>
                <td><input type="text" name="Username" value="<?php echo $customer['Username']; ?>"></td>
                <td><input type="text" name="Name" value="<?php echo $customer['Name']; ?>"></td>
                <td><input type="text" name="Password" value="<?php echo $customer['Password']; ?>"></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </form>
    </table>

</body>

</html>