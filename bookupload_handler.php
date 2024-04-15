<?php
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_bridge";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Database connected successfully.<br>";

// Function to handle image uploads
function handleImageUpload($file, $isbn, $uploadDir) {
    echo "Uploading file: " . $file['name'] . "<br>";

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $error_message = "Error uploading file: " . $file['error'];
        echo $error_message . "<br>";
        error_log($error_message);
        return false;
    }

    // Define the file extension and file name
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $isbn . '_' . uniqid() . '.' . $extension;
    $filePath = $uploadDir . $fileName;

    // Move the file to the upload directory
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        echo "File uploaded successfully: " . $filePath . "<br>";
        return $filePath;
    } else {
        $error_message = "Error moving file: " . $file['name'];
        echo $error_message . "<br>";
        error_log($error_message);
        return false;
    }
}

// Handle form submission
if (isset($_POST['Submit'])) {
    echo "Form submission detected.<br>";

    // Retrieve book details from the form
    $title = mysqli_real_escape_string($conn, $_POST['inputTitle']);
    $author = mysqli_real_escape_string($conn, $_POST['inputName']);
    $genre = mysqli_real_escape_string($conn, $_POST['Categories']);
    $isbn = mysqli_real_escape_string($conn, $_POST['inputisbn']);
    $publishedYear = mysqli_real_escape_string($conn, $_POST['inputyear']);
    $language = mysqli_real_escape_string($conn, $_POST['inputlang']);
    $condition = mysqli_real_escape_string($conn, $_POST['inputCond']);
    $availabilityStatus = mysqli_real_escape_string($conn, $_POST['inputStatus']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    echo "Form data retrieved: Title - $title, Author - $author, Genre - $genre, ISBN - $isbn, Published Year - $publishedYear, Language - $language, Condition - $condition, Availability Status - $availabilityStatus, Description - $description.<br>";

    // Insert book data into `exchange_post` table
    $sql = "INSERT INTO exchange_post (Title, Author, Genre, ISBN, PublishedYear, Description, Language, Conditions, AvailabilityStatus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        echo "Error preparing statement: " . mysqli_error($conn) . "<br>";
        error_log("Error preparing statement: " . mysqli_error($conn));
        return;
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("sssisisss", $title, $author, $genre, $isbn, $publishedYear, $description, $language, $condition, $availabilityStatus);

    if ($stmt->execute()) {
        echo "Book data inserted into exchange_post table.<br>";

        // Define the upload directory
        $uploadDir = "uploads/";

        // Define the array of file input IDs
        $fileInputIDs = [
            'imageUpload',
            'thumbUpload01',
            'thumbUpload02',
            'thumbUpload03',
            'thumbUpload04',
            'thumbUpload05',
            'thumbUpload06'
        ];

        // Handle each file upload
        foreach ($fileInputIDs as $inputID) {
            echo "Processing file input ID: $inputID<br>";

            if (isset($_FILES[$inputID])) {
                $file = $_FILES[$inputID];

                // Handle image upload
                $filePath = handleImageUpload($file, $isbn, $uploadDir);

                if ($filePath) {
                    // Insert the file path into the `book_images` table
                    $sql = "INSERT INTO book_images (ISBN, ImagePath) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql);
                    
                    if (!$stmt) {
                        echo "Error preparing statement: " . mysqli_error($conn);
                        error_log("Error preparing statement: " . mysqli_error($conn));
                    }
                    
                    $stmt->bind_param("ss", $isbn, $filePath);
                    
                    if ($stmt->execute()) {
                        echo "Image path inserted into book_images table: $filePath<br>";
                    } else {
                        echo "Error inserting image path into book_images table: " . $stmt->error . "<br>";
                        error_log("Error inserting image path into book_images table: " . $stmt->error);
                    }
                } else {
                    echo "Error uploading file for input: $inputID<br>";
                    error_log("Error uploading file for input: $inputID");
                }
            } else {
                echo "No file uploaded for input: $inputID<br>";
            }
        }
        
        echo '<script>alert("Book and images uploaded successfully!"); location="index.php";</script>';
    } else {
        echo "Error inserting book data: " . $stmt->error . "<br>";
        error_log("Error inserting book data: " . $stmt->error);
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
// mysqli_close($conn);
// echo "Database connection closed.<br>";
?>
