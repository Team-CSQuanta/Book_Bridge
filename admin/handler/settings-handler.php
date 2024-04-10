<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';
if(isset($_POST['save-changes'])){
    $actual_email = $_SESSION['user-logged-email'];
    $first_name;
    $last_name;
    $email;
    $Phone;
    $Address;
    $old_pass;
    $new_pass;
    $profile_img;
    $query;
    if(isset($_POST['f_name'])){
        $first_name = $_POST['f_name'];
        $_SESSION['user-first-name'] = $_POST['f_name'];
        $query = "UPDATE admin
                  SET f_name = '$first_name'
                  WHERE email = '$actual_email'";
        
        $connection->query($query);
        // header("Location: http://localhost/Book_Bridge/admin/settings.php");
        // exit();
    }
    if(isset($_POST['l_name'])){
        $last_name = $_POST['l_name'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['phone_number'])){
        $Phone = $_POST['phone_number'];
    }
    if(isset($_POST['phone_number'])){
        $Phone = $_POST['phone_number'];
    }
    if(isset($_POST['address'])){
        $Address = $_POST['address'];
    }
    if(isset($_POST['old_pass']) && isset($_POST['new_pass'])){
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
    }
    if(isset($_FILES['profile_img'])){
        $file = $_FILES['profile_img'];
        
        $file_name = $file['name'];
        echo $file_name;
        $file_temp_path = $file['tmp_name'];
        $file_size = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExtension = explode('.', $file_name);
        $extension = strtolower(end($fileExtension));
        $allowed_ext = array('jpg', 'jpeg', 'png', 'svg', 'gif');
        if(in_array($extension, $allowed_ext)){
            if($fileError=== 0){
                $file_name_for_upload = uniqid('', true) . "." .$extension;
                $file_upload_path= "../assets/imgs/people/";
                move_uploaded_file($file_temp_path, $file_upload_path . $file_name_for_upload);
            }else{
                echo '<script>alert("Error encountered while uploading the file");</script>';
            }
        }else{
            echo '<script>alert("The file type is not allowed!");</script>';
        }
        $_SESSION['profile_img'] = $file_name_for_upload;
        echo $_SESSION['profile_img'];
        // header("Location: http://localhost/Book_Bridge/admin/settings.php");
        // exit();
    }
}