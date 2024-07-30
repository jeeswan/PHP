<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $p = $_POST['password'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$user', '$pass')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    echo "<p style='color: green;'>Registration Successful!</p>";
    include "header.php";
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <?php include 'header.php' ?>
    <br><br>
    <form action="register.php" method="post">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>