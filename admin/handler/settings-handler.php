<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';
if (isset($_POST['save-changes'])) {
    $actual_email = $_SESSION['user-logged-email'];
    $first_name;
    $last_name;
    $email;
    $Phone;
    $Address;
    $old_pass;
    $new_pass;
    $profile_img;
    $query = "SELECT *
              FROM admin
              WHERE '$actual_email' = email";
    $query_result = $connection->query($query);
    $query_sep_attributes = $query_result->fetch_assoc();


    if (isset($_POST['f_name']) && $_POST['f_name'] != $query_sep_attributes['f_name']) {
        $first_name = $_POST['f_name'];
        $_SESSION['user-first-name'] = $_POST['f_name'];
        $query = "UPDATE admin
                  SET f_name = '$first_name'
                  WHERE email = '$actual_email'";

        $connection->query($query);
    }
    if (isset($_POST['l_name']) && $_POST['l_name'] != $query_sep_attributes['l_name']) {
        $last_name = $_POST['l_name'];
        $_SESSION['user-last-name'] = $_POST['l_name'];
        $query = "UPDATE admin
                  SET l_name = '$last_name'
                  WHERE email = '$actual_email'";

        $connection->query($query);
    }
    if (isset($_POST['email'])  && $_POST['email'] != $query_sep_attributes['email']) {
        $email = $_POST['email'];
        $_SESSION['user-logged-email'] = $_POST['email'];
        $query = "UPDATE admin
                  SET email = '$email'
                  WHERE email = '$actual_email'";

        $connection->query($query);
    }
    if (isset($_POST['phone_number'])  && $_POST['phone_number'] != $query_sep_attributes['phone_number']) {
        $Phone = $_POST['phone_number'];
        $_SESSION['user-phone-number'] = $_POST['phone_number'];
        $query = "UPDATE admin
                  SET phone_number = '$Phone'
                  WHERE email = '$actual_email'";

        $connection->query($query);
    }
    if (isset($_POST['address']) && $_POST['address'] != $query_sep_attributes['address']) {
        $Address = $_POST['address'];
        $_SESSION['user-address'] = $_POST['address'];
        $query = "UPDATE admin
                  SET address = '$Address'
                  WHERE email = '$actual_email'";

        $connection->query($query);
    }
    if (isset($_POST['old_pass']) && isset($_POST['new_pass'])) {
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
    }
    if (!($_FILES['profile_img']['error'] === UPLOAD_ERR_NO_FILE)) {
        $file = $_FILES['profile_img'];
        $file_name = $file['name'];
        $file_temp_path = $file['tmp_name'];
        $file_size = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExtension = explode('.', $file_name);
        $extension = strtolower(end($fileExtension));
        $allowed_ext = array('jpg', 'jpeg', 'png', 'svg', 'gif');
        if (in_array($extension, $allowed_ext)) {
            $file_name_for_upload = uniqid('', true) . "." . $extension;
            $file_upload_path = "../assets/imgs/people/";
            move_uploaded_file($file_temp_path, $file_upload_path . $file_name_for_upload);
        } else {
            echo '<script>alert("The file type is not allowed!");</script>';
        }
        $_SESSION['profile_img'] = $file_name_for_upload;
        $query = "UPDATE admin
                  SET profile_img = '$file_name_for_upload'
                  WHERE email = '$actual_email'";
        $connection->query($query);
    } else {
        echo '<script>alert("Error encountered while uploading the file");</script>';
    }
}
header("Location: http://localhost/Book_Bridge/admin/settings.php");
exit();