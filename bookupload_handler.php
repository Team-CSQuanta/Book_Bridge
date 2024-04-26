<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_bridge";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['imageUpload'])) {
        if ($_FILES['imageUpload']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = "uploads/"; // Ensure this directory exists and has write permissions
            $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];

            // Validate image type
            $check = getimagesize($_FILES['imageUpload']['tmp_name']);
            if ($check === false || !in_array($check['mime'], $allowedImageTypes)) {
                echo '<script>alert("Invalid image file type. Please upload a JPEG, PNG, or GIF image.");</script>';
                exit();
            }

            $fileName = uniqid('', true) . '_' . $_FILES['imageUpload']['name'];
            $filePath = $uploadDir . $fileName;

            // Try to upload the image
            if (!move_uploaded_file($_FILES['imageUpload']['tmp_name'], $filePath)) {
                echo '<script>alert("Error uploading image!");</script>';
                exit();
            }

            // Process and escape book details
            $title = mysqli_real_escape_string($conn, $_POST['inputtitle']);
            $author = mysqli_real_escape_string($conn, $_POST['inputname']);
            $genre = mysqli_real_escape_string($conn, $_POST['categories']);
            $isbn = mysqli_real_escape_string($conn, $_POST['inputIsbn']);
            $publishedYear = mysqli_real_escape_string($conn, $_POST['inputYear']);
            $language = mysqli_real_escape_string($conn, $_POST['inputLang']);
            $condition = mysqli_real_escape_string($conn, $_POST['inputcond']);
            $availabilityStatus = mysqli_real_escape_string($conn, $_POST['inputstatus']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);

            // Prepare and execute SQL statement with error handling
            $sql = "INSERT INTO exchange_post (Title, Author, ISBN, Genre, PublishedYear, Description, Language, Conditions, AvailabilityStatus, BookImage)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ssssisssss", $title, $author, $isbn, $genre, $publishedYear, $description, $language, $condition, $availabilityStatus, $filePath);

                if ($stmt->execute()) {
                    echo '<script>alert("Book uploaded successfully!"); location="index.php";</script>';
                } else {
                    echo '<script>alert("Error inserting book data: ' . $stmt->error . '");</script>';
                }

                $stmt->close();
            } else {
                echo '<script>alert("Error preparing statement: ' . $conn->error . '");</script>';
            }
        } else {
            // Error handling for file upload issues
            $errorMessage = "Image upload failed";
            switch ($_FILES['imageUpload']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    $errorMessage = "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $errorMessage = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $errorMessage = "The uploaded file was only partially uploaded.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $errorMessage = "No file was uploaded.";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $errorMessage = "Missing a temporary folder.";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $errorMessage = "Failed to write file to disk.";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $errorMessage = "A PHP extension stopped the file upload.";
                    break;
            }
            echo '<script>alert("' . $errorMessage . '");</script>';
        }
    } else {
        echo '<script>alert("Image upload field not found");</script>';
    }
}
?>
