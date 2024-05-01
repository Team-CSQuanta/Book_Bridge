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
// Query to fetch count of contributed books 
$sql_books = "SELECT 
                b.title AS book_title,
                COUNT(cr.request_id) AS contributed_books_count,
                b.authors,
                c.categoryName
            FROM 
                user u
            LEFT JOIN 
                contribution_request cr ON u.user_id = cr.user_id
            LEFT JOIN 
                book b ON cr.book_id = b.book_id
            LEFT JOIN 
                category c ON b.categoryID = c.categoryID
            WHERE 
                u.user_id = $User_id
                AND cr.status = 'published'
            GROUP BY 
                b.book_id";

$result_books = $conn->query($sql_books);

// Close the database connection
mysqli_close($conn);
?>

