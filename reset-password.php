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

// Check if the token is provided in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists in the database
    $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Token exists, show the password reset form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form action="handle-reset-password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <div>
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
<?php
    } else {
        // Token is invalid or expired
        echo "Invalid token";
    }
} else {
    // Token is not provided
    echo "Token is missing";
}
?>
