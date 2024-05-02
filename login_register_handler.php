<?php
include_once 'db_connection.php';

// Function to log user activity
function logActivity($conn, $userId, $activityDescription) {
    $activityDescription = mysqli_real_escape_string($conn, $activityDescription);
    $sql = "INSERT INTO user_activity (user_id, activity_description) VALUES ('$userId', '$activityDescription')";
    mysqli_query($conn, $sql);
}

// Handle registration form submission
if(isset($_POST['register'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $streetAddress = mysqli_real_escape_string($conn, $_POST['streetAddress']);
    $apartmentNo = mysqli_real_escape_string($conn, $_POST['apartmentNo']);
    $postalCode = mysqli_real_escape_string($conn, $_POST['postalCode']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $profileImagePath = ''; // Placeholder for profile image path
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $registrationDate = date('Y-m-d');
    $districtDivision = mysqli_real_escape_string($conn, $_POST['distDiv']);

    // Handle profile image upload
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
        $assetsDir = "assets/";
        $imgDir = $assetsDir . "imgs/";
        $peopleDir = $imgDir . "people/";
        $uploadDir = $peopleDir;
        $profileImageName = uniqid('', true) . '_' . $_FILES['profileImage']['name'];
        move_uploaded_file($_FILES['profileImage']['tmp_name'], $profileImageName );
    }
    $addressComponents = explode(',', $districtDivision);
    $district = trim($addressComponents[0]);
    $division = trim($addressComponents[1]);

      $getLocationQuery = "SELECT location_id FROM location WHERE district='$district' AND division='$division'";
                $locationResult = mysqli_query($conn, $getLocationQuery);
                $location = mysqli_fetch_assoc($locationResult);
                $location_id = $location['location_id'];

    $checkUserExists = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $checkUserExists);
    if(mysqli_num_rows($result) > 0) {
        echo '<script>alert("Username or email already exists!");</script>';
    } else {
        $sql = "INSERT INTO `user` (phone_number, email, f_name, l_name, reg_date, bio , street_address, apartment_num, postal_code,location_id,Password,profile_img) 
        VALUES ('$phoneNumber', '$email', '$firstName', '$lastName', '$registrationDate', '$bio','$streetAddress' , '$apartmentNo' ,'$postalCode','$location_id','$hashedPassword', '$profileImageName')";

        if (mysqli_query($conn, $sql)) {
            $userID = mysqli_insert_id($conn);
            $_SESSION['UserID'] = $userID;
            logActivity($conn, $userID, 'User registered');
            echo '<script>alert("Form submitted successfully!"); location="page-account.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Handle login form submission
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['Password'])) {
            $_SESSION['UserID'] = $row['user_id'];

            if(isset($_POST['remember'])) {
                ini_set('session.gc_maxlifetime', 604800);
            }

            logActivity($conn, $_SESSION['UserID'], 'User logged in');
            header("Location: page-account.php");
            exit();
        } else {
            echo '<script>alert("Invalid password!");</script>';
        }
    } else {
        echo '<script>alert("User not found!");</script>';
    }
}

// Close the database connection
mysqli_close($conn);
?>
