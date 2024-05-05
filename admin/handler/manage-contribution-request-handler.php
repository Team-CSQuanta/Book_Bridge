/*<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';



$request_id = filter_var($_POST['request_id'], FILTER_SANITIZE_SPECIAL_CHARS);
$query = "SELECT cr.*, b.*, cr.status as cr_status 
          FROM contribution_request as cr
          NATURAL JOIN book as b
          WHERE request_id = '$request_id'";
$query_result = $connection->query($query);
$contribution_request_row = $query_result->fetch_assoc();

$requester_email = "";
// Retrieve requester's email
$query_requester_email = "SELECT user.email
                          FROM user
                          JOIN contribution_request ON user.user_id = contribution_request.user_id
                          WHERE contribution_request.request_id = '$request_id'";
$query_requester_result = $connection->query($query_requester_email);
if ($query_requester_result) {
    $requester_row = $query_requester_result->fetch_assoc();
    $requester_email = $requester_row['email'];
    
}


$status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$notes = filter_var($_POST['notes'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_title = filter_var($_POST['book_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_description = filter_var($_POST['book_description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_edition = filter_var($_POST['edition'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_category = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_num_pages = filter_var($_POST['num_of_pages'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_language = filter_var($_POST['language'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$book_condition = filter_var($_POST['book-condition'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$file_name_for_upload = null;


if ($status != $contribution_request_row['status']) {
    if ($status == 'Requested to courier') {
      
        $query_update_status = "UPDATE contribution_request
                                set status = '$status'
                                WHERE request_id = '$request_id'";
        $query_result = $connection->query($query_update_status);
        if ($query_result) {
            // Update successful
           handleStatusChange($requester_email, $status);
        } else {
            // Update failed
            echo "Error updating notes: " . $connection->error;
        }
    } elseif ($status == 'Received the book') {
        
        $query_update_status = "UPDATE contribution_request
                                set status = '$status'
                                WHERE request_id = '$request_id'";
        $query_result = $connection->query($query_update_status);
        if ($query_result) {
            // Update successful
             handleStatusChange($requester_email, $status);
        } else {
            // Update failed
            echo "Error updating notes: " . $connection->error;
        }
    } elseif ($status == 'QC in progress') {
        $query_update_status = "UPDATE contribution_request
                                set status = '$status'
                                WHERE request_id = '$request_id'";
        $query_result = $connection->query($query_update_status);
        if ($query_result) {
            // Update successful
              handleStatusChange($requester_email, $status);
        } else {
            // Update failed
            echo "Error updating notes: " . $connection->error;
        }
    } elseif ($status == 'Published') {
        echo $book_condition;
        if (isset($book_condition) && $book_condition != "Select Condition") {
            $query_update_status = "UPDATE contribution_request
                                    set status = '$status'
                                    WHERE request_id = '$request_id'";
            $query_result = $connection->query($query_update_status);
            if ($query_result) {
                // Update successful
                 handleStatusChange($requester_email, $status);
                $query_for_club_id = "SELECT club_id
                                      FROM bibliophile_club
                                      WHERE club_manager_id = {$_SESSION['user-logged-id']}";
                $query_club_id_result = $connection->query($query_for_club_id);
                $query_club_id = $query_club_id_result->fetch_assoc();
                $query_for_adding_to_platform = "INSERT INTO global_book_collection(book_id, owner_id, book_condition, availability_status, club_id)
                                                 VALUES({$contribution_request_row['book_id']}, {$contribution_request_row['user_id']}, '$book_condition', 'yes', {$query_club_id['club_id']})";
                if ($connection->query($query_for_adding_to_platform)) {
                    header("Location: http://localhost/Book_Bridge/admin/page-manage-contribution-request.php");
                    exit();
                }
            } else {
                // Update failed
                echo "Error updating notes: " . $connection->error;
            }
        } else {
            header("Location: http://localhost/Book_Bridge/admin/page-manage-contribution-request-detail.php?error=SelectBookCondition&request_id=" . $request_id);
            exit();
        }
    }

    // Redirect back to the original page
    header("Location: http://localhost/Book_Bridge/admin/page-manage-contribution-request-detail.php?request_id=" . $request_id);
}

// Function to send email when status is changed





function handleStatusChange($email,$status) {
    
    
   
        // Determine subject and body based on the status
        $subject = ""; // Initialize subject
        $body = ""; // Initialize body

        if ($status === "Processing") {
            $subject = "Notification: Request Processing";
            $body = "Dear User,<br><br>We received your request.Your contribution request is being processed.<br><br>Thank you for being willing tocontribute!<br><br>Regards,<br>Book Bridge Team";
        } elseif ($status === "Requested to courier") {
            $subject = "Notification: Request for sending the book";
            $body = "Dear User,<br><br>You are requested to send the book to your local Bibliophile club via any courier.<br><br>You can expect it to be shipped soon.<br><br>Regards,<br>BookBridge Team";
        } elseif ($status === "Received the book") {
            $subject = "Notification: Book Received";
            $body = "Dear User,<br><br>We have received the book from you.<br><br>Thank you for your contribution!<br><br>Regards,<br>BookBridge Team";
        }
       elseif ( $status === "QC in progress") {
            $subject = "Notification: Quality checking";
            $body = "Dear User,<br><br>We are checking your books quality and we hope to publish it for exchanging very soon.<br><br>Thank you for your contribution!<br><br>Regards,<br>BookBridge Team";
        }

        elseif ( $status === "Published") {
            $subject = "Notification: Book published";
            $body = "Dear User,<br><br>Your book has been published for exchange.<br><br>Thank you for your contribution!<br><br>Regards,<br>BookBridge Team";
        }

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // SMTP server settings for Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'teamcsquanta@gmail.com'; // Your Gmail email address
            $mail->Password = 'lgvt zllm olea urqw'; // Your Gmail password
            $mail->SMTPSecure = 'ssl'; // Enable SSL encryption
            $mail->Port = 465; // Gmail SMTP port

            // Sender and recipient settings
            $mail->setFrom('teamcsquanta@gmail.com', 'Team CSQuanta');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send email
            $mail->send();

        
            return "Status change email sent successfully.";
        } catch (Exception $e) {
            return "Failed to send status change email. Error: {$mail->ErrorInfo}";
        }
    } 







if ($notes != $contribution_request_row['notes']) {
    $query_update_notes = "UPDATE contribution_request
                           set notes = '$notes'
                           WHERE request_id = '$request_id'";
    $query_result = $connection->query($query_update_notes);
    if ($query_result) {
        // Update successful
    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
if ($book_title != $contribution_request_row['title']) {
    $query_update_title = "UPDATE book
                           set title = '$book_title'
                           WHERE book_id = {$contribution_request_row['book_id']}";
    $query_result = $connection->query($query_update_title);
    if ($query_result) {
        // Update successful

    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
if ($book_description != $contribution_request_row['description']) {
    $query_update_description = "UPDATE book
                           set description = '$book_description'
                           WHERE book_id = {$contribution_request_row['book_id']}";
    $query_result = $connection->query($query_update_description);
    if ($query_result) {
        // Update successful
    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
if ($book_edition != $contribution_request_row['edition']) {
    $query_update_edition = "UPDATE book
                           set edition = '$book_edition'
                           WHERE book_id = {$contribution_request_row['book_id']}";
    $query_result = $connection->query($query_update_edition);
    if ($query_result) {
        // Update successful

    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
if ($book_category != $contribution_request_row['categoryID']) {
    $query_update_category = "UPDATE book
                           set categoryID = '$book_category'
                           WHERE book_id = {$contribution_request_row['book_id']}";
    $query_result = $connection->query($query_update_category);
    if ($query_result) {
        // Update successful
    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
if ($book_num_pages != $contribution_request_row['num_of_pages']) {
    $query_update_pages = "UPDATE book
                           set num_of_pages = '$book_num_pages'
                           WHERE book_id = {$contribution_request_row['book_id']}";
    $query_result = $connection->query($query_update_pages);
    if ($query_result) {
        // Update successful

    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
if ($book_language != $contribution_request_row['language']) {
    $query_update_language = "UPDATE book
                           set language = '$book_language'
                           WHERE book_id = {$contribution_request_row['book_id']}";
    $query_result = $connection->query($query_update_language);
    if ($query_result) {
        // Update successful

    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
if ($book_publisher != $contribution_request_row['publisher']) {
    $query_update_publisher = "UPDATE book
                           set publisher = '$book_publisher'
                           WHERE book_id = {$contribution_request_row['book_id']}";
    $query_result = $connection->query($query_update_publisher);
    if ($query_result) {
        // Update successful

    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}
// Handle file upload
if (!($_FILES['Book-image-upload']['error'] === UPLOAD_ERR_NO_FILE)) { // Check if file is uploaded
    $file = $_FILES['Book-image-upload'];
    $file_name = $file['name'];
    $file_temp_path = $file['tmp_name'];

    $fileExtension = explode('.', $file_name);
    $extension = strtolower(end($fileExtension));
    $allowed_ext = array('jpg', 'jpeg', 'png', 'svg', 'gif');
    if (in_array($extension, $allowed_ext)) {
        $file_name_for_upload = "MODERATOR-BOOK-IMG" . uniqid('', true) . "." . $extension;
        $file_upload_path = "../../uploadedBooks/";
        move_uploaded_file($file_temp_path, $file_upload_path . $file_name_for_upload);
    } else {
        echo '<script>alert("The file type is not allowed!");</script>';
    }
}
header("Location: http://localhost/Book_Bridge/admin/page-manage-contribution-request-detail.php?request_id=" . $request_id);
exit();
