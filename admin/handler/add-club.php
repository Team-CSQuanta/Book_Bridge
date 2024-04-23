<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/database.php';

if(isset($_POST['add-btn'])){
    $club_name = isset($_POST['club_name']) ? filter_var($_POST['club_name'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_description = isset($_POST['club_description']) ? filter_var($_POST['club_description'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_address_line = isset($_POST['address-line']) ? filter_var($_POST['address-line'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_district = isset($_POST['district']) ? filter_var($_POST['district'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $club_division = isset($_POST['division']) ? filter_var($_POST['division'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $file_name_for_upload = "CLUB-IMG-Defualt.jpg";
    $location_id_for_club;
    if (!($_FILES['club-img']['error'] === UPLOAD_ERR_NO_FILE)) {
        $file = $_FILES['club-img'];
        $file_name = $file['name'];
        $file_temp_path = $file['tmp_name'];
        $fileType = $file['type'];
        $fileExtension = explode('.', $file_name);
        $extension = strtolower(end($fileExtension));
        $allowed_ext = array('jpg', 'jpeg', 'png', 'svg', 'gif');

        if (in_array($extension, $allowed_ext)) {
            $file_name_for_upload = "CLUB-IMG". uniqid('', true) . "." . $extension;
            $file_upload_path = "../assets/imgs/club/";
            move_uploaded_file($file_temp_path, $file_upload_path . $file_name_for_upload);
        } else {
            echo '<script>alert("The file type is not allowed!");</script>';
        }
    }
    $get_location = "SELECT *
                    FROM location
                    WHERE `$club_district` = district and `$club_division` = division";
    $get_location_result = $connection->query($get_location)->fetch_assoc();
    $location_id_for_club = $get_location_result['location_id'];
    $insert_query ="INSERT INTO bioliophile_club(club_name, address_line, location_id, club_manager_id, club_description, club_img
                    VALUES(`$club_name`, `$club_address_line`, `$location_id_for_club`, null,))"
}