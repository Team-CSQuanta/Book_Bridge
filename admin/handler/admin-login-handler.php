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
                          WHERE '$phone_email' = email OR phone_number = '$phone_email'";
    $search_user_query_result = $connection->query($search_user_query);
    if($search_user_query_result->num_rows == 1){
        $result_row = $search_user_query_result->fetch_assoc();
        $actual_pass = $result_row['password'];
        // Need to update the code later when admin password will be hashed
        if($actual_pass ==  $password){
            $_SESSION['user-logged-id'] = $result_info_club['admin_id'];
            $_SESSION['user-logged-email'] = $result_row['email'];
            $_SESSION['user-first-name'] = $result_row['f_name'];
            $_SESSION['user-last-name'] = $result_row['l_name'];
            $_SESSION['user-logged-role'] = "admin";
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

        // query for checking moderator
        $search_club_manager = "SELECT *
                                FROM bibliophile_club_admin
                                WHERE '$phone_email' = email OR phone_number = '$phone_email'";
        $search_club_manager_result = $connection->query($search_club_manager);
        if($search_club_manager_result->num_rows == 1){
            $result_info_club = $search_club_manager_result->fetch_assoc();
            $actual_pass_club = $result_info_club['password'];
            if(password_verify($password, $actual_pass_club)){
                $query_checking_for_assigned_club = "SELECT *
                                                     FROM bibliophile_club
                                                     WHERE club_manager_id = {$result_info_club['club_admin_id']}";
                $query_checking_assigned_club_result = $connection->query($query_checking_for_assigned_club);
                if($query_checking_assigned_club_result->num_rows == 1){
                    $_SESSION['user-logged-id'] = $result_info_club['club_admin_id'];
                    $_SESSION['user-logged-email'] = $result_info_club['email'];
                    $_SESSION['user-first-name'] = $result_info_club['f_name'];
                    $_SESSION['user-last-name'] = $result_info_club['l_name'];
                    $_SESSION['user-logged-role'] = "club-manager";
                    $_SESSION['profile_img'] = $result_info_club['profile_img'];
                    $_SESSION['user-phone-number'] = $result_info_club['phone_number'];
                    $_SESSION['user-address'] = $result_info_club['address_line'];
                    $_SESSION['user-location-id'] = $result_info_club['location_id'];
                    header("Location: http://localhost/Book_Bridge/admin/");
                    exit();
                }else{
                    header("Location: http://localhost/Book_Bridge/page-club-error.php?f_name=" . urlencode($result_info_club['f_name']) . "&l_name=" . urlencode($result_info_club['l_name']));
                    exit();
                }
            }else{
                $_SESSION['signin'] = "Incorrect email or password";
                header("Location: http://localhost/Book_Bridge/admin-login.php");
                exit();
            }
        }else{
            $_SESSION['signin'] = "No user found";
            header("Location: http://localhost/Book_Bridge/admin-login.php");
            exit();
        }
    }
}
