<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';

if (isset($_POST['add-btn'])) {
    // Sanitize input data
    $club_name = isset($_POST['club_name']) ? filter_var($_POST['club_name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_description = isset($_POST['club_description']) ? filter_var($_POST['club_description'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_address_line = isset($_POST['address-line']) ? filter_var($_POST['address-line'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_district = isset($_POST['district']) ? filter_var($_POST['district'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_division = isset($_POST['division']) ? filter_var($_POST['division'], FILTER_SANITIZE_SPECIAL_CHARS) : '';

    // Default image file name
    $file_name_for_upload = "CLUB-IMG-Default.jpg";

    // Check if image file is uploaded
    if (!empty($_FILES['club-img']['name'])) {
        $file = $_FILES['club-img'];
        $file_name = $file['name'];
        $file_temp_path = $file['tmp_name'];
        $fileExtension = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_ext = array('jpg', 'jpeg', 'png', 'svg', 'gif');

        // Validate file extension
        if (in_array(strtolower($fileExtension), $allowed_ext)) {
            // Generate unique file name and move uploaded file
            $file_name_for_upload = "CLUB-IMG-" . uniqid('', true) . "." . $fileExtension;
            $file_upload_path = "../assets/imgs/club/";
            move_uploaded_file($file_temp_path, $file_upload_path . $file_name_for_upload);
        } else {
            echo '<script>alert("The file type is not allowed!");</script>';
        }
    }


    // Insert club data into database
    $insert_query = "INSERT INTO bibliophile_club (club_name, address_line, district, club_description, club_img)
                         VALUES ('$club_name', '$club_address_line', '$club_district', '$club_description', '$file_name_for_upload')";
    if ($connection->query($insert_query) === TRUE) {
        // Club inserted successfully
        // Handle success (e.g., redirect)
        header("Location: http://localhost/Book_Bridge/admin/page-form-add-club.php");
        exit();
    } else {
        // Error occurred during club insertion
        echo "Error: " . $insert_query . "<br>" . $connection->error;
    }
}



