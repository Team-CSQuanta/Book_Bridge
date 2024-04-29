<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "book_bridge";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $title = $_POST["inputtitle"];
    $author = $_POST["inputname"];
    $genre = $_POST["categories"];
    $isbn = $_POST["inputIsbn"];
    $publishedYear = $_POST["inputYear"];
    $language = $_POST["inputLang"];
    $description = $_POST["description"];


    // Retrieve OwnerUserID from user table (assuming you have the user ID available)
    $userID = "user_id_here"; // Replace with the actual user ID or retrieve it from session or elsewhere
    $ownerUserID = null;

    // Prepare SQL statement to fetch OwnerUserID
    $user_query = "SELECT OwnerUserID FROM user WHERE UserID = ?";
    $stmt = $con->prepare($user_query);
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $stmt->bind_result($ownerUserID);
    $stmt->fetch();
    $stmt->close();

    // Prepare SQL statement to insert wish data
    $wish_sql = "INSERT INTO wish (Title, Author, Genre, ISBN, PublishedYear, Description, Language, OwnerUserID) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters for wish insertion
    $wish_stmt = $con->prepare($wish_sql);
    $wish_stmt->bind_param("ssssisss", $title, $author, $genre, $isbn, $publishedYear, $description, $language, $ownerUserID);

    // Execute the wish insertion statement
    if ($wish_stmt->execute()) {
        echo "New wish added successfully.";
    } else {
        echo "Error: " . $wish_stmt->error;
    }

    // Close statement
    $wish_stmt->close();
}

// Close connection
$con->close();
?>