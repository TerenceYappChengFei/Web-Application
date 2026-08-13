<?php
session_start();

$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION["email"])) { //not equal to null

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Week 11 - Booking </title>
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
    <a href="booking_profile.php"><input type="submit" value="Profile"></a>
    <a href="logout.php"><input type="submit" value="LogOut"></a>

    <h1>Classes</h1>

    <table width="1100">
        <tr>
            <th>Session ID</th>
            <th width="300">Session Name</th>
            <th width="200">Session Date</th>
            <th>Available Slots</th>
        </tr>

        <?php
        $query = "SELECT * FROM booking_sessions";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
                <td><?php echo $row['Session_ID']; ?></td>
                <td><?php echo $row['SessionName']; ?></td>
                <td><?php echo $row['SessionDate']; ?></td>
                <td><?php echo $row['SessionSlots']; ?></td>
                <td>

                        <input type='button' value='Book'>

                </td>
            </tr>
        <?php
        }
        mysqli_close($conn);
        ?>



    </table>

</body>


</html>