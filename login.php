<?php
// Start the session
session_start();

// Connect to the database
$servername = "localhost";
$username = "ukpthscsub";
$password = "YY42mKYtjw";
$dbname = "ukpthscsub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database for the user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// Check if the user was found
if (mysqli_num_rows($result) == 1) {
    // Set session variables
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;

    // Redirect to the dashboard page
    header("Location: dashboard.php");
} else {
    // Redirect back to the login page with an error message
    header("Location: index.php?error=invalid_login");
}

// Close the database connection
mysqli_close($conn);
?>
