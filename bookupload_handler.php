<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_bridge";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle image uploads
// function handleImageUpload($file, $isbn, $uploadDir) {
//     if ($file['error'] !== UPLOAD_ERR_OK) {
//         error_log("Error uploading file: " . $file['error']);
//         return false;
//     }

//     $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
//     $fileName = $isbn . '_' . uniqid() . '.' . $extension;
//     $filePath = $uploadDir . $fileName;

//     if (move_uploaded_file($file['tmp_name'], $filePath)) {
//         return $filePath;
//     } else {
//         error_log("Error moving file: " . $file['name']);
//         return false;
//     }
// }

// Handle form submission
if (isset($_POST['Submit'])) {
    // Retrieve book details from the form
    $title = $conn->real_escape_string($_POST['inputTitle']);
    $author = $conn->real_escape_string($_POST['inputName']);
    $genre = $conn->real_escape_string($_POST['Categories']);
    $isbn = $conn->real_escape_string($_POST['inputisbn']);
    $publishedYear = $conn->real_escape_string($_POST['inputyear']);
    $language = $conn->real_escape_string($_POST['inputlang']);
    $condition = $conn->real_escape_string($_POST['inputCond']);
    $availabilityStatus = $conn->real_escape_string($_POST['inputStatus']);
    $description = $conn->real_escape_string($_POST['description']);

    // Prepare statement to insert book data into `exchange_post` table
    $sql = "INSERT INTO exchange_post (Title, Author, Genre, ISBN, PublishedYear, Description, Language, Conditions, AvailabilityStatus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Error preparing statement: " . $conn->error);
        return;
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("sssisisss", $title, $author, $genre, $isbn, $publishedYear, $description, $language, $condition, $availabilityStatus);

    // if ($stmt->execute()) {
    //     // Define the upload directory
    //     $uploadDir = "uploads/";

    //     // Define the array of file input IDs
    //     $fileInputIDs = [
    //         'imageUpload',
    //         'thumbUpload01',
    //         'thumbUpload02',
    //         'thumbUpload03',
    //         'thumbUpload04',
    //         'thumbUpload05',
    //         'thumbUpload06'
    //     ];

    //     // Handle each file upload
    //     foreach ($fileInputIDs as $inputID) {
    //         if (isset($_FILES[$inputID])) {
    //             $file = $_FILES[$inputID];

    //             // Handle image upload
    //             $filePath = handleImageUpload($file, $isbn, $uploadDir);

    //             if ($filePath) {
    //                 // Insert the file path into the `book_images` table
    //                 $sql = "INSERT INTO book_images (ISBN, ImagePath) VALUES (?, ?)";
    //                 $stmt = $conn->prepare($sql);

    //                 if (!$stmt) {
    //                     error_log("Error preparing statement: " . $conn->error);
    //                     continue;
    //                 }

    //                 $stmt->bind_param("ss", $isbn, $filePath);

    //                 if (!$stmt->execute()) {
    //                     error_log("Error inserting image path into book_images table: " . $stmt->error);
    //                 }
    //             } else {
    //                 error_log("Error uploading file for input: " . $inputID);
    //             }
    //         }
    //     }
    //     echo '<script>alert("Book and images uploaded successfully!"); location="index.php";</script>';
    // } else {
    //     error_log("Error inserting book data: " . $stmt->error);
    // }

    // // Close the statement
    // $stmt->close();
}

// Close the database connection
$conn->close();
?>
