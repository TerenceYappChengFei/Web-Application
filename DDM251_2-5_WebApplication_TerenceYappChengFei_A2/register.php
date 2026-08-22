<?php
session_start();

$servername = "localhost";
$username = "terence243051";
$password = "wyaslwwjz030331121139YES!";
$dbname = "terence243051";

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$errorMessage = "";
$successMessage = "";
$enteredUsername = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $userPassword = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if (strlen($userPassword) < 6) {
        $errorMessage = "Password must be at least 6 characters";
    } else if ($userPassword != $confirmPassword) {
        $errorMessage = "Passwords do not match";
    } else {
        $checkSql = "SELECT * FROM df_user
                     WHERE username = '$enteredUsername'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            $errorMessage = "Username already exists";
        } else {
            $uidSql = "SELECT MAX(UID) AS highest_uid FROM df_user";
            $uidResult = mysqli_query($conn, $uidSql);
            $uidRow = mysqli_fetch_assoc($uidResult);
            $nextId = $uidRow["highest_uid"] + 1;
            $dateCreated = date("Y-m-d");

            $insertSql = "INSERT INTO df_user (UID, username, password, date_created)
                          VALUES ($nextId, '$enteredUsername', '$userPassword', '$dateCreated')";

            if (mysqli_query($conn, $insertSql)) {
                $successMessage = "Registration successful. You can now log in.";
                $enteredUsername = "";
            } else {
                $errorMessage = "Registration failed. Please try again.";
            }
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Dwarven Forge</title>
  <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>
  <main class="auth-card">
    <form class="auth-panel register-panel" method="POST">
      <div class="panel-content">
        <button class="form-title" type="submit">Register</button>

        <label for="username">Name:</label>
        <input id="username" type="text" name="username" value="<?php echo $enteredUsername; ?>" required>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input id="confirm_password" type="password" name="confirm_password" required>

        <div class="message-area">
          <p class="error-message"><?php echo $errorMessage; ?></p>
          <p class="success-message"><?php echo $successMessage; ?></p>
        </div>
      </div>
    </form>
    <a class="page-link" href="login.php">Login</a>
  </main>
</body>
</html>
