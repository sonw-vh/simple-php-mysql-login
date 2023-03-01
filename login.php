<?php
session_start();

$servername = "localhost";
$username = "dibongaodu";
$password = "@Dibongaodu123";
$dbname = "login";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;

    header("Location: dashboard.php");
} else {
    header("Location: index.php?error=invalid_login");
}

mysqli_close($conn);
?>
