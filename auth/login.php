<!-- <?php
session_start();
session_regenerate_id(true);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Dummy authentication check
    if ($username == "admin" && $password == "password") {
        $_SESSION["username"] = $username;
        setcookie("username", $username, time() + (86400 * 30), "/");
        header("Location: admin.php");
        exit();
    } else {
        echo "Invalid credentials.";
    }
}
?> -->

<?php
require_once "db.php";

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) == 0) {
        die("Error: No record found with username: $username.");
    }

    $user = mysqli_fetch_assoc($result);
    $hash = $user['password'];

    if (password_verify($pass, $hash)) {
        $_SESSION['username'] = $user['id'];
        header("Location: admin.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <form method="post" action="login.php">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>


<!-- setcookie("username", $username, [
    'expires' => time() + (86400 * 30),
    'path' => '/',
    'secure' => true,   // Only send over HTTPS
    'httponly' => true, // JavaScript cannot access the cookie
    'samesite' => 'Strict' // CSRF protection
]); -->