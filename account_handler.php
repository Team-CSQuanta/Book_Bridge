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

// Calculate total contributed books count
$total_contributed_books_count = $result_books->num_rows;

// Update the user's book_wallet column with the total count
$update_wallet_sql = "UPDATE user SET book_wallet = $total_contributed_books_count WHERE user_id = $User_id";
$conn->query($update_wallet_sql);


// Query to fetch books with status not published
$sql_not_published_books = "SELECT 
                                b.title AS book_title,
                                b.authors,
                                c.categoryName,
                                cr.status
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
                                AND cr.status != 'published'
                            GROUP BY 
                               b.book_id";    

$result_not_published_books = $conn->query($sql_not_published_books);




// Handle form submission
if(isset($_POST['submit'])) {
    
    // Retrieve form data
    $firstName = mysqli_real_escape_string($conn, $_POST['FName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['LName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $currentPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['npassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    // Query to fetch user information based on user_id
    $getUserQuery = "SELECT * FROM user WHERE user_id='$User_id'";
    $result = mysqli_query($conn, $getUserQuery);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify the current password
        if(password_verify($currentPassword, $user['Password'])) {
            // Current password matches, prepare the update query
            
            // Initialize an empty array to store the update fields
            $updateFields = array();

            // Check which fields are provided in the form and add them to the update query
            if(!empty($firstName)) {
                $updateFields[] = "f_name='$firstName'";
            }
            if(!empty($lastName)) {
                $updateFields[] = "l_name='$lastName'";
            }
            if(!empty($email)) {
                $updateFields[] = "email='$email'";
            }
            if(!empty($newPassword) && $newPassword === $confirmPassword) {
                // If a new password is provided and matches the confirmation, hash it and add it to the update fields
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateFields[] = "Password='$hashedPassword'";
            }

            // Check if any fields need to be updated
            if(!empty($updateFields)) {
                // Prepare the update query
                $updateQuery = "UPDATE user SET " . implode(", ", $updateFields) . " WHERE user_id='$User_id'";
                
                // Execute the update query
                if(mysqli_query($conn, $updateQuery)) {
                    // User information updated successfully
                    echo '<script>alert("User informations successfully.");location="page-account.php";</script>';
                } else {
                    // Error updating user information
                    echo "Error updating user information: " . mysqli_error($conn);
                }
            } else {
                // No fields to update
                echo "No fields to update.";
            }
        } else {
            // Current password does not match, handle error (e.g., display an error message)
            echo "Current password is incorrect.";
        }
    } else {
        // User not found, handle error (e.g., display an error message)
        echo "User not found.";
    }
}



// Close the database connection
mysqli_close($conn);
?>

