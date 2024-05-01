
<?php
 include_once 'db_connection.php'; 
// Handle form submission
if(isset($_POST['register'])) {
    // $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $streetAddress = mysqli_real_escape_string($conn, $_POST['streetAddress']);
    $apartmentNo = mysqli_real_escape_string($conn, $_POST['apartmentNo']);
    $postalCode = mysqli_real_escape_string($conn, $_POST['postalCode']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Get the current date
    $registrationDate = date('Y-m-d');

// Check if username or email already exists
$checkUserExists = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $checkUserExists);
if(mysqli_num_rows($result) > 0) {
    echo '<script>alert("Username or email already exists!");</script>';
} else {
    // Insert user data into the database
    $sql = "INSERT INTO `user` (phone_number, email, f_name, l_name, reg_date, bio , street_address, apartment_num, postal_code, Password) 
    VALUES ('$phoneNumber', '$email', '$firstName', '$lastName', '$registrationDate', '$bio','$streetAddress' , '$apartmentNo' ,'$postalCode', '$hashedPassword')";

if (mysqli_query($conn, $sql)) {
    // Retrieve the user ID of the newly registered user
    $userID = mysqli_insert_id($conn);
    
    // Set session variables
    $_SESSION['UserID'] = $userID;
    // $_SESSION['Email'] = $email;
    
    echo '<script>alert("Form submitted successfully!"); location="page-account.php";</script>';
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
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['Password'])) {
            // Password is correct, set session variables or redirect to dashboard
            $_SESSION['UserID'] = $row['user_id'];
           // Set longer session duration if "Remember Me" is checked
          if(isset($_POST['remember'])) {

         // Set session duration to 1 week 
          ini_set('session.gc_maxlifetime', 604800);
               }             

            echo '<script>alert("Login successful!"); location="page-account.php";</script>';
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