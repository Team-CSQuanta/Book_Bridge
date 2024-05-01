<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'db_connection.php'; 

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from session
    $user_id = $_SESSION['UserID'];

    // Process and escape book details
    $title = mysqli_real_escape_string($conn, $_POST['inputtitle']);
    $authors = mysqli_real_escape_string($conn, $_POST['inputname']);
    $categoryName = mysqli_real_escape_string($conn, $_POST['categories']);
    $isbn = mysqli_real_escape_string($conn, $_POST['inputIsbn']);
    $edition = mysqli_real_escape_string($conn, $_POST['inputEdition']);
    $num_of_pages = mysqli_real_escape_string($conn, $_POST['inputPage']);
    $language = mysqli_real_escape_string($conn, $_POST['inputLang']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $publisher = mysqli_real_escape_string($conn, $_POST['inputPublisher']);
    $publication_date = mysqli_real_escape_string($conn, $_POST['inputDate']);
    $mainImagePath = ''; // Placeholder for main image path
    $additionalImagesPaths = ''; // Placeholder for additional images paths

    // Retrieve category ID based on category name
    $category_query = "SELECT categoryID FROM category WHERE categoryName = '$categoryName'";
    $category_result = $conn->query($category_query);
    if ($category_result->num_rows > 0) {
        $row = $category_result->fetch_assoc();
        $categoryID = $row['categoryID'];

        // Handle main image upload
        if (isset($_FILES['mainImageUpload']) && $_FILES['mainImageUpload']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = "uploadedBooks/"; // Ensure this directory exists and has write permissions
            $mainImageName = uniqid('', true) . '_' . $_FILES['mainImageUpload']['name'];
            $mainImagePath = $uploadDir . $mainImageName;
            move_uploaded_file($_FILES['mainImageUpload']['tmp_name'], $mainImagePath);
        }

        // Handle additional images upload
        if (isset($_FILES['additionalImagesUpload'])) {
            $additionalImages = $_FILES['additionalImagesUpload'];
            $additionalImagesCount = count($additionalImages['name']);
            for ($i = 0; $i < $additionalImagesCount; $i++) {
                if ($additionalImages['error'][$i] === UPLOAD_ERR_OK) {
                    $additionalImageName = uniqid('', true) . '_' . $additionalImages['name'][$i];
                    $additionalImagePath = $uploadDir . $additionalImageName;
                    move_uploaded_file($additionalImages['tmp_name'][$i], $additionalImagePath);
                    $additionalImagesPaths .= $additionalImagePath . ',';
                }
            }
            // Remove the trailing comma
            $additionalImagesPaths = rtrim($additionalImagesPaths, ',');
        }

        // Insert book information into the book table
        $insert_book_sql = "INSERT INTO book (isbn, title, authors, categoryID, edition, num_of_pages, language, description, publisher, publication_date, cover_img, additional_imgs) 
                            VALUES ('$isbn', '$title', '$authors', '$categoryID', '$edition', '$num_of_pages', '$language', '$description', '$publisher', '$publication_date', '$mainImagePath', '$additionalImagesPaths')";
        if ($conn->query($insert_book_sql) === TRUE) {
            // Retrieve the book_id of the newly inserted book
            $book_id = $conn->insert_id;

            // Create a new entry in the contribution_request table
            $insert_request_sql = "INSERT INTO contribution_request (user_id, book_id, status) 
                                   VALUES ('$user_id', '$book_id', 'pending')";
            if ($conn->query($insert_request_sql) === TRUE) {
                echo '<script>alert("Contribution request submitted successfully.");</script>';
            } else {
                echo '<script>alert("Error creating contribution request: ' . $conn->error . '");</script>';
            }
        } else {
            echo '<script>alert("Error adding book information: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Category not found.");</script>';
    }
}
?>
