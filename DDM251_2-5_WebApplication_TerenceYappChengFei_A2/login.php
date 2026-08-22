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
$message = "";
$enteredUsername = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $userPassword = $_POST["password"];

    $sql = "SELECT * FROM df_user
            WHERE username = '$enteredUsername'
            AND password = '$userPassword'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["username"] = $_POST["username"];
        header("Location: df_index.php");
        exit();
    } else {
        $message = "invalid user";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Dwarven Forge</title>
  <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>
  <main class="auth-card">
    <form class="auth-panel login-panel" method="POST">
      <div class="panel-content">
        <button class="form-title" type="submit">Login</button>

        <label for="username">Name:</label>
        <input id="username" type="text" name="username" value="<?php echo $enteredUsername; ?>" required>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>

        <div class="message-area">
          <p class="error-message"><?php echo $message; ?></p>
        </div>
      </div>
    </form>
    <a class="page-link" href="register.php">Create new account</a>
  </main>
</body>
</html>
