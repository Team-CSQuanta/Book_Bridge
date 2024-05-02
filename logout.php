<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Include database connection
include_once 'db_connection.php';

// Add activity log for logout
$user_id = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : null;
$activity_description = "User logged out";
$logActivityQuery = "INSERT INTO user_activity (user_id, activity_description) VALUES ('$user_id', '$activity_description')";
mysqli_query($conn, $logActivityQuery);

// Destroy session
session_destroy();

// Redirect to login page
header("Location: page-login-register.php");
exit();
?>
