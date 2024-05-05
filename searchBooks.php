

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

 


?>






<!DOCTYPE html>
<html class="no-js" lang="en">

<head>


    <meta charset="utf-8">
    <title>BookBridge Online</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.png">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/main.css?v=3.4">
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>

<style>
        .wish-button {
            background-color: #0B8082;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .wish-button:hover {
            background-color: #45a049; /* Change background color on hover */
        }
    </style>
   

</head>

<body>




<?php
    include 'partials/header.php';
    include  'partials/mobile-header.php'
    ?>


    
      

                
                <div class="tab-content wow fadeIn animated" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">

    <!-- Add this line before the closing </body> tag -->
<!-- Bootstrap JS -->
<script src="path/to/bootstrap.min.js"></script>

<div class="row product-grid-4">
    <?php // Check if the search form is submitted
if(isset($_GET['search'])) {
    // Get the search term from the form
    $search_term = $_GET['search'];

    // SQL query to search for books by book name
    $sql = "SELECT * FROM global_book_collection 
            INNER JOIN book ON global_book_collection.book_id = book.book_id 
            INNER JOIN category ON book.categoryID = category.categoryID 
            WHERE book.title LIKE '%$search_term%'";

    $search_result = $conn->query($sql);

    // Check if there are any rows returned from the query
    if ($search_result->num_rows > 0) {
        // Loop through each row of the result set
        while ($row = $search_result->fetch_assoc()) {
            if($row["availability_status"] == "yes") { 
            ?>
            <!-- Card component for each book -->
            
            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="shop-product-full.php">
                                <?php if(!empty($row["cover_img"]) && file_exists($row["cover_img"])) { ?>
                                    <img class="default-img" src="<?php echo $row["cover_img"]; ?>" alt="">
                                <?php } else { ?>
                                    <img class="default-img" src="uploadedBooks/default_cover.png" alt="Default Book Cover">
                                <?php } ?>
                                <img class="hover-img" src="uploadedBooks/default_cover.png" alt="">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal<?php echo $row['book_id']; ?>"><i class="fi-rs-search"></i></a>
                            <!-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.php"><i class="fi-rs-heart"></i></a>
                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.php"><i class="fi-rs-shuffle"></i></a> -->
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="new"><?php echo $row["book_condition"]; ?></span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-category">
                            <a href="shop-grid-right.php"><?php echo $row["categoryName"]; ?></a>
                        </div>
                        <h2><a href="shop-product-full.php"><?php echo $row["title"]; ?></a></h2>
                        <!-- <div class="product-action-1 show">
                            <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
            
            <!-- Quick View Modal -->
            <div class="modal fade" id="quickViewModal<?php echo $row['book_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="quickViewModalLabel<?php echo $row['book_id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="quickViewModalLabel<?php echo $row['book_id']; ?>"><?php echo $row["title"]; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Additional details about the book can be displayed here -->
                        <div class="product-img product-img-zoom">
                                <?php if(!empty($row["cover_img"]) && file_exists($row["cover_img"])) { ?>
                                    <img class="default-img" src="<?php echo $row["cover_img"]; ?>" alt="">
                                <?php } else { ?>
                                    <img class="default-img" src="uploadedBooks/default_cover.png" alt="Default Book Cover">
                                <?php } ?>
                                
                            </a>
                        </div>

                            <p><?php echo $row["description"]; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Make a request</button>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- End Quick View Modal -->

            <?php
        } }
    } else { ?>
       <h3> <?php echo "Sorry!! No books found.";?></h3> 
       <button class="wish-button" onclick="wishForBook('Book Title')">Wish for this Book</button>

  <?php  }
}


?>
    

            
        
</div>







    </main>
    <?php
    include 'partials/footer.php'
    ?>