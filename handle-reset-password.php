<?php
session_start();

// Establish database connection

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_bridge";

$conn = mysqli_connect($servername, $username, $password, $dbname);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve token and passwords from the form
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords
    if ($password !== $confirm_password) {
        echo "Passwords do not match";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email IN (SELECT email FROM password_resets WHERE token = ?)");
    $stmt->bind_param("ss", $hashed_password, $token);

    if ($stmt->execute()) {
        // Password reset successful, delete the token from the database
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        echo "Password reset successfully";
    } else {
        echo "Error resetting password";
    }
}
?>
