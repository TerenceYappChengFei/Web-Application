<?php
$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week2 - Profile</title>
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
    <table>
        <tr>
            <th width="100">Booking_ID</th>
            <th width="250">Session_ID</th>
            <th width="150">Email</th>
            <th>Event Name</th>
            <th>Date</th>

        </tr>

        <?php
        $query = "SELECT * FROM booking_profiles WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['Booking_ID']; ?></td>
                <td><?php echo $row['Session_ID']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['eventname']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        <?php
        }
        mysqli_close($conn);
        ?>

        <a href="booking.php"><button>Back</button></a>

    </table>
</body>

</html>