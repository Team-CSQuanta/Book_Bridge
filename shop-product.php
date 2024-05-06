<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
</head>
<body>

<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_bridge";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display book details
function displayBookDetails($conn, $book_id) {
    // Fetch data for the selected book
    $sql = "SELECT * FROM book WHERE book_id = $book_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the details of the selected book
        $row = $result->fetch_assoc();
        echo "<h1>" . $row["title"] . "</h1>";
        echo "<p><strong>Authors:</strong> " . $row["authors"] . "</p>";
        echo "<p><strong>ISBN:</strong> " . $row["isbn"] . "</p>";
        // Display other details as needed
    } else {
        echo "Book not found";
    }
}

// Main logic to display book details if book_id is provided in the URL
if(isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    displayBookDetails($conn, $book_id);
} else {
    echo "No book selected";
}

$conn->close();
?>

</body>
</html>
