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
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page if not logged in
    header('Location:page-login-register.php');
    exit;
}

// Get user ID from session
$User_id = $_SESSION['UserID'];

// Fetch user's name from the database
$sql = "SELECT f_name FROM user WHERE user_id = $User_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['f_name'];
} else {
    // Handle case where user's information is not found
    $first_name = "User";
}
// Query to fetch count of contributed books and list the books
$sql_books = "SELECT 
                COUNT(cr.request_id) AS contributed_books_count,
                GROUP_CONCAT(b.title SEPARATOR ', ') AS contributed_books_list
                FROM 
                contribution_request cr
            LEFT JOIN 
                user u ON cr.user_id = u.user_id
            LEFT JOIN 
                book b ON cr.book_id = b.book_id
            WHERE 
                cr.user_id = $User_id";

$result_books = mysqli_query($conn, $sql_books);

if (mysqli_num_rows($result_books) > 0) {
    $row_books = mysqli_fetch_assoc($result_books);
    $contributed_books_count = $row_books['contributed_books_count'];
    $contributed_books_list = $row_books['contributed_books_list'];
} else {
    // Set default values if no books are contributed
    $contributed_books_count = 0;
    $contributed_books_list = "No books contributed";
}

// Close the database connection
mysqli_close($conn);
?>
