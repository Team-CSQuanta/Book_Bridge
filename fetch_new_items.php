<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

// Function to check if an item with a given ISBN is already displayed
function isItemDisplayed($isbn) {
    // Check if the item ISBN exists in the session variable storing displayed item ISBNs
    if (isset($_SESSION['displayed_item_isbns']) && in_array($isbn, $_SESSION['displayed_item_isbns'])) {
        return true;
    }
    return false;
}

// Query to fetch new items
$sql = "SELECT * FROM exchange_post WHERE AvailabilityStatus = 'Available'";
$result = $conn->query($sql);

// Format the fetched items as HTML
$html = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Check if the item is already displayed
        if (!isItemDisplayed($row['ISBN'])) {
            $html .= '
            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="shop-product-full.php">
                                <img class="default-img" src="' . $row["BookImage"] . '" alt="">
                                <img class="hover-img" src="' . $row["BookImage"] . '" alt="">
                            </a>
                        </div>
                        <!-- Product action buttons -->
                        <div class="product-action-1">
                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                <i class="fi-rs-search"></i>
                            </a>
                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.php">
                                <i class="fi-rs-heart"></i>
                            </a>
                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.php">
                                <i class="fi-rs-shuffle"></i>
                            </a>
                        </div>
                        <!-- Product badges based on condition -->
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="new">' . $row["Conditions"] . '</span>
                        </div>
                    </div>
                    <!-- Product content -->
                    <div class="product-content-wrap">
                        <!-- Genre -->
                        <div class="product-category">
                            <a href="shop-grid-right.php">' . $row["Genre"] . '</a>
                        </div>
                        <!-- Title -->
                        <h2><a href="shop-product-full.php">' . $row["Title"] . '</a></h2>
                        <!-- Rating -->
                        <div class="rating-result" title="90%">
                            <span>
                                <span>70%</span>
                            </span>
                        </div>
                        <!-- Price -->
                        <div class="product-price">
                            <span>Coins:500 </span>
                            <span class="old-price">600</span>
                        </div>
                        <!-- Add to Cart button -->
                        <div class="product-action-1 show">
                            <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.php">
                                <i class="fi-rs-shopping-bag-add"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
            // Add the ISBN of the displayed item to the list of displayed item ISBNs
            $_SESSION['displayed_item_isbns'][] = $row['ISBN'];
        }
    }
}

// Close the database connection
$conn->close();

// Echo the HTML content
echo $html;
?>