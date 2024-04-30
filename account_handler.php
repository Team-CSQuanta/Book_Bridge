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

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location:page-login-register.php');
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user's name from the database
$sql = "SELECT FirstName FROM users WHERE UserID = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['FirstName'];
} else {
    // Handle case where user's information is not found
    $first_name = "User";
}



// Handle account-related actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form for updating user information was submitted
   /* if (isset($_POST['update_info'])) {
        // Handle updating user information
        // Example: Update user's email address
        $new_email = $_POST['new_email'];

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("UPDATE users SET email = ? WHERE user_id = ?");
        $stmt->bind_param("si", $new_email, $user_id);

        // Execute the update statement
        $stmt->execute();
        
        // Close statement
        $stmt->close();
    }

    // Check if the form for changing password was submitted
    if (isset($_POST['change_password'])) {
        // Handle changing password
        // Example: Change user's password
        $new_password = $_POST['new_password'];

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $stmt->bind_param("si", $hashed_password, $user_id);

        // Execute the update statement
        $stmt->execute();
        
        // Close statement
        $stmt->close();
    }

    // Check if the form for deleting account was submitted
    if (isset($_POST['delete_account'])) {
        // Handle deleting account
        // Example: Delete user's account and related data from the database

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);

        // Execute the delete statement
        $stmt->execute();
        
        // Close statement
        $stmt->close();

        // Unset all session variables
        session_unset();
        
        // Destroy the session
        session_destroy();

        // Redirect to login page or homepage after account deletion
        header('Location: login.php');
        exit;
    } */

   
}

// Close the database connection
mysqli_close($conn);
?>