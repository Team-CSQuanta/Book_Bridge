
<?php
session_start();

// Establish database connection

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookbridge";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $universityAffiliation = mysqli_real_escape_string($conn, $_POST['universityAffiliation']);
    $universityCity = mysqli_real_escape_string($conn, $_POST['universityCity']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Get the current date
    $registrationDate = date('Y-m-d');

// Check if username or email already exists
$checkUserExists = "SELECT * FROM Users WHERE Username='$username' OR Email='$email'";
$result = mysqli_query($conn, $checkUserExists);
if(mysqli_num_rows($result) > 0) {
    echo '<script>alert("Username or email already exists!");</script>';
} else {
    // Insert user data into the database
    $sql = "INSERT INTO Users (Username, Email, Password, FirstName, LastName, PhoneNumber, UniversityAffiliation, UniversityCity,RegistrationDate, Bio) 
            VALUES ('$username', '$email', '$hashedPassword', '$firstName', '$lastName', '$phoneNumber', '$universityAffiliation', '$universityCity', '$registrationDate','$bio')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Form submitted successfully!"); location="index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}


// Handle Login
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database for the user with the given email
    $sql = "SELECT * FROM Users WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['Password'])) {
            // Password is correct, set session variables or redirect to dashboard
            $_SESSION['user_id'] = $row['UserID'];
            echo '<script>alert("Login successful!"); location="index.php";</script>';
        } else {
            // Invalid password
            echo '<script>alert("Invalid password!");</script>';
        }
    } else {
        // User not found
        echo '<script>alert("User not found!");</script>';
    }
}

// Close the database connection
mysqli_close($conn);
?>