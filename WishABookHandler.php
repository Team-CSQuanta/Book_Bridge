<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_bridge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$title = $_POST['inputtitle'];
$author = $_POST['inputname'];
$categoryName = $_POST['categories']; // Category name selected in the form
$isbn = $_POST['inputIsbn'];
$publishedYear = $_POST['inputYear'];
$language = $_POST['inputLang'];
$description = $_POST['description'];

// File upload
$target_dir = "uploads/"; // Specify the directory where uploaded files will be stored
$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]); // Get the path of the uploaded file
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // Get the file extension

// Check if file has been uploaded and move it to the target directory
if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["imageUpload"]["name"])) . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Prepare SQL statement to retrieve category ID based on category name
$sql_category = "SELECT categoryID FROM category WHERE categoryName = ?";
$stmt_category = $conn->prepare($sql_category);
$stmt_category->bind_param("s", $categoryName);

// Execute the query
$stmt_category->execute();

// Get the result
$result_category = $stmt_category->get_result();

// Check if category exists
if ($result_category->num_rows > 0) {
    // Fetch category ID
    $row = $result_category->fetch_assoc();
    $categoryID = $row["categoryID"];

    // Prepare SQL statement to insert data into the book table
    $sql = "INSERT INTO book (isbn, title, authors, categoryID, language, description, publication_date, cover_img)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute query
    $stmt->bind_param("sssissss", $isbn, $title, $author, $categoryID, $language, $description, $publishedYear, $target_file);

    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Category not found";
}

// Close all statements and connection
$stmt_category->close();
$conn->close();
?>
