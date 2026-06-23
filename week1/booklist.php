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
    <title>Booklist</title>
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
    <table width="1100">
        <tr>
            <th>ISBN</th>
            <th width="300">Title</th>
            <th width="200">Author</th>
            <th>Description</th>
            <th>Price(RM)</th>
        </tr>

        <?php

        $query = "SELECT * FROM booklist";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['ISBN'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['author'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td><?php   echo $row['price'] ?></td>
                <td><button>Delete</button></td>
                <td><input type="button" value="Edit"></a></td>
            </tr>

        <?php
        }
    mysqli_close($conn);
        
        ?>

    </table>

    <button><a href="profile.php"><input type="submit" value="Profile"></a></button>
    <button><a href="../Exercise1/addBook.php"><input type="submit" value="Add Book"></a></button>
    <button><a href="../Exercise1/editProfile.php"><input type="submit" value="Edit Profile"></a></button>
    <button><a href=""><input type="submit" value="Logout"></a></a></button>



</body>
</html>