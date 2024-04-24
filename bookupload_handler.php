<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
function handleImageUpload($file, $uploadDir) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        error_log("Error uploading file: " . $file['error']);
        return false;
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = uniqid() . '.' . $extension;
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return $filePath;
    } else {
        error_log("Error moving file: " . $file['name']);
        return false;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve book details from the form
    $title = mysqli_real_escape_string($conn, $_POST['inputtitle']);
    $author = mysqli_real_escape_string($conn, $_POST['inputname']);
    $genre = mysqli_real_escape_string($conn, $_POST['categories']);
    $isbn = mysqli_real_escape_string($conn, $_POST['inputIsbn']);
    $publishedYear = mysqli_real_escape_string($conn, $_POST['inputYear']);
    $language = mysqli_real_escape_string($conn, $_POST['inputLang']);
    $condition = mysqli_real_escape_string($conn, $_POST['inputcond']);
    $availabilityStatus = mysqli_real_escape_string($conn, $_POST['inputstatus']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Prepare statement to insert book data into `exchange_post` table
    $sql = "INSERT INTO exchange_post (Title, Author, ISBN, Genre, PublishedYear, Description, Language, Conditions, AvailabilityStatus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Error preparing statement: " . $conn->error);
        return;
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssssissss", $title, $author, $isbn, $genre, $publishedYear, $description, $language, $condition, $availabilityStatus);

    if ($stmt->execute()) {
        // Define the upload directory
        $uploadDir = "uploads/";

        // Create the upload directory if it doesn't exist
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
            die("Failed to create upload directory");
        }

        // Handle image uploads for each file input
        foreach ($_FILES as $fileInputName => $file) {
            // Check if file input exists and is not empty
            if (isset($file['name']) && !empty($file['name'])) {
                // Handle image upload
                $filePath = handleImageUpload($file, $uploadDir);

                if ($filePath) {
                    // Insert the file path into the `book_images` table
                    $sql = "INSERT INTO book_images (ISBN, ImagePath) VALUES (?, ?)";
                    $stmt_img = $conn->prepare($sql);

                    if (!$stmt_img) {
                        error_log("Error preparing statement: " . $conn->error);
                        continue;
                    }

                    $stmt_img->bind_param("ss", $isbn, $filePath);

                    if (!$stmt_img->execute()) {
                        error_log("Error inserting image path into book_images table: " . $stmt_img->error);
                    }

                    $stmt_img->close();
                } else {
                    error_log("Error uploading file for input: " . $fileInputName);
                }
            }
        }
        echo '<script>alert("Book and images uploaded successfully!"); location="index.php";</script>';
    } else {
        error_log("Error inserting book data: " . $stmt->error);
    }

    // Close the statements
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
