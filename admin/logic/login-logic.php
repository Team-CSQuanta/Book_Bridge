<?php

require '../config/database.php';

if (isset($_POST['login'])) {
    $phone_email = filter_var($_POST['phone_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$phone_email) {
        $_SESSION['signin'] = "Phone or email required";
    } elseif(!$password){
        $_SESSION = "Password required";
    }
    else {
        $user_query = "SELECT * FROM admin WHERE email = '$phone_email' OR phone_number = '$phone_email'";
        $result = mysqli_query($connection, $user_query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $real_pass = $user['password'];
            if (password_verify($password, $real_pass)) {
                $_SESSION['user-id'] = $user['id'];
                header('Location: http://localhost/Book_Bridge/admin/index.php');
                
            } else {
                $_SESSION['signin'] = "Password didn't match";
            }
        } else {
            $_SESSION['signin'] = 'User not found';
        }
    }
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('Location: http://localhost/Book_Bridge/admin-login.php');
        exit(); 
    }
} else {
    header('Location: http://localhost/Book_Bridge/admin-login.php');
    exit(); 
}
