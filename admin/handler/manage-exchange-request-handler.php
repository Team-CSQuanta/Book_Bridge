/*
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';



$exchange_id = filter_var($_POST['exchange_id'], FILTER_SANITIZE_SPECIAL_CHARS);
$query = "SELECT er.*, b.*, er.status as er_status 
          FROM exchange_request as er
          NATURAL JOIN book as b
          WHERE exchange_id = '$exchange_id'";
$query_result = $connection->query($query);
$exchange_request_row = $query_result->fetch_assoc();

$requester_email = "";
// Retrieve requester's email
$query_requester_email = "SELECT user.email
                          FROM user
                          JOIN exchange_request ON user.user_id = exchange_request.user_id
                          WHERE exchange_request.exchange_id = '$exchange_id'";
$query_requester_result = $connection->query($query_requester_email);
if ($query_requester_result) {
    $requester_row = $query_requester_result->fetch_assoc();
    $requester_email = $requester_row['email'];

}


$status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);



if ($status != $exchange_request_row['status']) {
    if ($status == 'Delivered') {

        $query_update_status = "UPDATE exchange_request
                                set status = '$status'
                                WHERE exchange_id = '$exchange_id'";
        $query_result = $connection->query($query_update_status);
        if ($query_result) {
            // Update successful
            handleStatusChange($requester_email, $status);
            $query_for_club_id = "SELECT club_id
                                      FROM bibliophile_club
                                      WHERE club_manager_id = {$_SESSION['user-logged-id']}";
            $query_club_id_result = $connection->query($query_for_club_id);
            $query_club_id = $query_club_id_result->fetch_assoc();
            $query_for_adding_to_platform = "UPDATE global_book_collection
                                                SET availability_status = 'no'
                                                WHERE book_id = {$exchange_request_row['book_id']}";
            if ($connection->query($query_for_adding_to_platform)) {
                header("Location: http://localhost/Book_Bridge/admin/page-manage-exchange-request.php");
                exit();
            }
        } else {
            // Update failed
            echo "Error updating notes: " . $connection->error;
        }
    }
    // Redirect back to the original page
    header("Location: http://localhost/Book_Bridge/admin/page-manage-contribution-request-detail.php?exchange_id=" . $exchange_id);
}

// Function to send email when status is changed





function handleStatusChange($email, $status)
{




    // Determine subject and body based on the status
    $subject = ""; // Initialize subject
    $body = ""; // Initialize body

    if ($status === "Delivered")
        $subject = "Notification: Delivered";
    $body = "Dear User,<br><br>We hand over your requested book to the courier.<br><br>Thank you for being being with us!<br><br>Regards,<br>Book Bridge Team";
    // } elseif ($status === "Requested to courier") {
    //     $subject = "Notification: Request for sending the book";
    //     $body = "Dear User,<br><br>You are requested to send the book to your local Bibliophile club via any courier.<br><br>You can expect it to be shipped soon.<br><br>Regards,<br>BookBridge Team";
    // } elseif ($status === "Received the book") {
    //     $subject = "Notification: Book Received";
    //     $body = "Dear User,<br><br>We have received the book from you.<br><br>Thank you for your contribution!<br><br>Regards,<br>BookBridge Team";
    // } elseif ($status === "QC in progress") {
    //     $subject = "Notification: Quality checking";
    //     $body = "Dear User,<br><br>We are checking your books quality and we hope to publish it for exchanging very soon.<br><br>Thank you for your contribution!<br><br>Regards,<br>BookBridge Team";
    // } elseif ($status === "Published") {
    //     $subject = "Notification: Book published";
    //     $body = "Dear User,<br><br>Your book has been published for exchange.<br><br>Thank you for your contribution!<br><br>Regards,<br>BookBridge Team";


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







if ($notes != $exchange_request_row['notes']) {
    $query_update_notes = "UPDATE contribution_request
                           set notes = '$notes'
                           WHERE exchange_id = '$exchange_id'";
    $query_result = $connection->query($query_update_notes);
    if ($query_result) {
        // Update successful
    } else {
        // Update failed
        echo "Error updating notes: " . $connection->error;
    }
}

header("Location: http://localhost/Book_Bridge/admin/page-manage-exchange-request-detail.php?exchange_id=" . $exchange_id);
exit();
