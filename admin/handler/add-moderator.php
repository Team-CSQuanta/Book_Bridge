<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';

if(isset($_POST['add-moderator'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone-number'], FILTER_SANITIZE_SPECIAL_CHARS);
    $f_name = filter_var($_POST['f_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $l_name = filter_var($_POST['l_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $moderator_password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $hashed_password = password_hash($moderator_password, PASSWORD_DEFAULT);
    $address_line = filter_var($_POST['address-line'], FILTER_SANITIZE_SPECIAL_CHARS);
    $district = filter_var($_POST['district'], FILTER_SANITIZE_SPECIAL_CHARS);
    $division = filter_var($_POST['division'], FILTER_SANITIZE_SPECIAL_CHARS);
    $file_name_for_upload = null; 

    
    $location_id_query = "SELECT location_id FROM location WHERE district = '$district' AND division = '$division'";
    $location_id_query_result = $connection->query($location_id_query);

    if ($location_id_query_result && $location_id_query_result->num_rows > 0) {
        $location_id_associative_array = $location_id_query_result->fetch_assoc();
        $location_id = $location_id_associative_array['location_id'];
    } else {
        // Handle case when location is not found
        echo '<script>alert("Location not found!");</script>';
        exit(); // Exit script if location is not found
    }

    // Handle file upload
    if (!($_FILES['moderator-img']['error'] === UPLOAD_ERR_NO_FILE)) { // Check if file is uploaded
        $file = $_FILES['moderator-img'];
        $file_name = $file['name'];
        $file_temp_path = $file['tmp_name'];

        $fileExtension = explode('.', $file_name);
        $extension = strtolower(end($fileExtension));
        $allowed_ext = array('jpg', 'jpeg', 'png', 'svg', 'gif');
        if (in_array($extension, $allowed_ext)) {
            $file_name_for_upload = "MODERATOR-" . uniqid('', true) . "." . $extension;
            $file_upload_path = "../assets/imgs/people/";
            move_uploaded_file($file_temp_path, $file_upload_path . $file_name_for_upload);
        } else {
            echo '<script>alert("The file type is not allowed!");</script>';
        }
    } else {
        $file_name_for_upload = "defualt_profile.jpg";
    }

    
    $add_moderator_query = "INSERT INTO bibliophile_club_admin (email, phone_number, password,  f_name, l_name, profile_img, address_line, location_id)
                            VALUES ('$email', '$phone', '$hashed_password' ,'$f_name', '$l_name', '$file_name_for_upload', '$address_line', '$location_id')";

    if ($connection->query($add_moderator_query) === TRUE) {
        // Success, redirect to page
        header("Location: http://localhost/Book_Bridge/admin/page-add-moderator.php");
        exit();
    } else {
        // Error handling if insertion fails
        echo "Error: " . $add_moderator_query . "<br>" . $connection->error;
        exit();
    }
}
?>
