<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../config/database.php';

if(isset($_POST['create-category'])){
    $categoryName = mysqli_real_escape_string($connection, $_POST['category-name']);
    $categoryDescription = mysqli_real_escape_string($connection, $_POST['description']);

    // Generate a unique category ID (Example: CAT-BIO-001)
    $query = "SELECT MAX(SUBSTRING(categoryID, -3)) AS max_id FROM category";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];
    $next_id = ($max_id !== null) ? $max_id + 1 : 1;
    $categoryID = "CAT-" . strtoupper(substr($categoryName, 0, 3)). "-" . str_pad($next_id, 3, '0', STR_PAD_LEFT);

    // Insert the category into the database
    $query = "INSERT INTO category (categoryID, categoryName, categoryDescription)
              VALUES ('$categoryID', '$categoryName', '$categoryDescription')";
    $result = $connection->query($query);
    
    if(!$result){
        echo "Error: " . $connection->error;
    }else{
        // Redirect after successful insertion
        header("Location: http://localhost/Book_Bridge/admin/page-categories.php");
        exit(); 
    }
}

