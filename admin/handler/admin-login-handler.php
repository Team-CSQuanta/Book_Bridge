<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';
$phone_email = filter_var($_POST['phone_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if(empty($phone_email)){
    $_SESSION['signin'] = "Phone or email required";
    header("Location: http://localhost/Book_Bridge/admin-login.php");
    exit();
}elseif(empty($password)){
    $_SESSION['signin'] = "Password Required";
    header("Location: http://localhost/Book_Bridge/admin-login.php");
    exit();
}else{
    $search_user_query = "SELECT * 
                    FROM admin
                    WHERE '$phone_email' = email OR '$phone_email' = phone_number";
    $search_user_query_result = $connection->query($search_user_query);
    if($search_user_query_result->num_rows == 1){
        $result_row = $search_user_query_result->fetch_assoc();
        $actual_pass = $result_row['password'];
        // Need to update the code later when admin password will be hashed
        if($actual_pass ==  $password){
            $_SESSION['user-logged-email'] = $result_row['email'];
            $_SESSION['user-first-name'] = $result_row['f_name'];
            $_SESSION['user-last-name'] = $result_row['l_name'];
            $_SESSION['user-logged-role'] = $result_row['role'];
            $_SESSION['profile_img'] = $result_row['profile_img'];
            $_SESSION['user-phone-number'] = $result_row['phone_number'];
            $_SESSION['user-address'] = $result_row['address'];
            header("Location: http://localhost/Book_Bridge/admin/");
            exit();
        }else{
            $_SESSION['signin'] = "Incorrect password or email";
            header("Location: http://localhost/Book_Bridge/admin-login.php");
            exit();
        }
    }else{
        $_SESSION['signin'] = "No user found";
        header("Location: http://localhost/Book_Bridge/admin-login.php");
        exit();
    }
}