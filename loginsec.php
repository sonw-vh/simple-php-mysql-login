<?php
session_start();

$servername = "localhost";
$username = "ukpthscsub";
$password = "YY42mKYtjw";
$dbname = "ukpthscsub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username=? AND password=?");

mysqli_stmt_bind_param($stmt, "ss", $username, $password);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;

    header("Location: dashboard.php");
} else {
    header("Location: index.php?error=invalid_login");
}

mysqli_close($conn);
?>