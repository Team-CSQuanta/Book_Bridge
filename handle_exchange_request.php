<?php
 include_once 'db_connection.php'; 

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page if not logged in
    header('Location:page-login-register.php');
    exit;
}

// Get user ID from session
$User_id = $_SESSION['UserID'];

// Check if book_id is set in the POST request
if (isset($_POST['book_id'])) {

    
    // Prepare and execute the SQL query to insert into exchange_request table
    $stmt = $conn->prepare("INSERT INTO exchange_request (user_id, book_id, status) VALUES (?, ?, 'Pending')");
    $stmt->bind_param("ii", $User_id, $_POST['book_id']);
    
    if ($stmt->execute()) {
        echo "Exchange request successfully submitted.";
    } else {
        echo "Error submitting exchange request: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "No book_id provided.";
}

$conn->close();
?>
