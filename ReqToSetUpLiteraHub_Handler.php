
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



if(isset($_POST['submit'])) {
// Assuming $conn is your database connection

// Escape and sanitize form inputs
$country = mysqli_real_escape_string($conn, $_POST['country']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$upazila = mysqli_real_escape_string($conn, $_POST['upazila']);
$village = mysqli_real_escape_string($conn, $_POST['village']);

// Check if a similar location already exists
$sqlCheckLocation = "SELECT location_id FROM location WHERE country = '$country' AND district = '$district' AND upazila = '$upazila' AND village = '$village'";
$result = mysqli_query($conn, $sqlCheckLocation);

if (mysqli_num_rows($result) > 0) {
    // Location already exists, retrieve its location_id
    $row = mysqli_fetch_assoc($result);
    $locationId = $row['location_id'];
} else {
    // Location doesn't exist, insert a new record
    $sqlInsertLocation = "INSERT INTO location (country, district, upazila, village) 
                         VALUES ('$country', '$district', '$upazila', '$village')";
    
    if (mysqli_query($conn, $sqlInsertLocation)) {
        // Retrieve the location_id of the newly inserted location
        $locationId = mysqli_insert_id($conn);
    } else {
        // Handle insertion error
        echo "Error: " . $sqlInsertLocation . "<br>" . mysqli_error($conn);
    }
}

// Use the retrieved or newly inserted location_id in your next query
$sqlRequest = "INSERT INTO request_to_set_up_hub (FullName, email, LocationID, RequestStatus) 
               VALUES ('{$_POST['fullName']}', '{$_POST['email']}', '$locationId', null)";

if (mysqli_query($conn, $sqlRequest)) {
    echo '<script>alert("Form submitted successfully!"); location="index.php";</script>';
} else {
    echo "Error: " . $sqlRequest . "<br>" . mysqli_error($conn);
}
}




// Close the database connection
mysqli_close($conn);
?>