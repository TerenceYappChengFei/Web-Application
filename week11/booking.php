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


if (!isset($_SESSION["email"])) {
    header("Location: booking_login.php");
    exit();
}

$message = "";

if (isset($_POST["book"])) {

    $sessionID = $_POST["sessionID"];
    $email = $_SESSION["email"];

    $check = "SELECT * FROM booking_profiles
              WHERE Session_ID = '$sessionID'
              AND Email = '$email'";

    $checkResult = mysqli_query($conn, $check);

    if (mysqli_num_rows($checkResult) > 0) {

        $message = "You have already booked this class.";

    } else {

        $slotQuery = "SELECT * FROM booking_sessions
                      WHERE Session_ID = '$sessionID'";

        $slotResult = mysqli_query($conn, $slotQuery);
        $session = mysqli_fetch_assoc($slotResult);

        if ($session["SessionSlots"] > 0) {

            $insert = "INSERT INTO booking_profiles
                       (Session_ID, Email)
                       VALUES ('$sessionID', '$email')";

            mysqli_query($conn, $insert);

            $update = "UPDATE booking_sessions
                       SET SessionSlots = SessionSlots - 1
                       WHERE Session_ID = '$sessionID'";

            mysqli_query($conn, $update);

            $message = "Class booked successfully.";

        } else {

            $message = "Sorry, this class is full.";
        }
    }
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
    <p><?php echo $message; ?></p>
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

                <!-- Add a form with a hidden input for the session ID and a submit button -->
                <td>
                    <form method="POST">
                    <input type="hidden" name="sessionID"

                   value="<?php echo $row['Session_ID']; ?>">
                    <input type="submit" name="book" value="Book">
                    </form>
                </td>

            </tr>
        <?php
        }
        mysqli_close($conn);
        ?>



    </table>

</body>


</html>