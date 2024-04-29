<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoloader

session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_bridge";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle password reset request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize email address
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Generate unique token
    $token = bin2hex(random_bytes(16));

    // Save token in database with the user's email for future verification
    $sql = "INSERT INTO password_resets (email, token, expiration_timestamp) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $token);
    mysqli_stmt_execute($stmt);

    // Check if the token was successfully inserted
    if (mysqli_stmt_affected_rows($stmt) > 0) {
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
            $reset_link ="http://localhost/dbms_project/Book_Bridge/reset-password.php?token=$token";
            // Sender and recipient settings
            $mail->setFrom('teamcsquanta@gmail.com', 'Team CSQuanta');
            $mail->addAddress($email);
            
            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Hello,<br><br>You have requested to reset your password. Please click the following link to reset your password:<br>$reset_link<br><br>If you did not request this, please ignore this email.<br><br>Regards,<br>Team CSQuanta";

            // Send email
            $mail->send();
            echo "Password reset email sent successfully.";
        } catch (Exception $e) {
            echo "Failed to send password reset email. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to save password reset token in the database.";
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
