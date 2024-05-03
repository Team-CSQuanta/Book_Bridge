
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


// Pagination variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12; // Maximum number of cards per page
$offset = ($page - 1) * $limit;

 
$sql= "SELECT gbc.*, b.*, c.categoryName
        FROM global_book_collection gbc
        JOIN book b ON gbc.book_id = b.book_id
        LEFT JOIN category c ON b.categoryID = c.categoryID
        LIMIT $limit OFFSET $offset ";
       $result = $conn->query($sql);
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
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>


</head>

<body>




<?php
    include 'partials/header.php';
    include  'partials/mobile-header.php'
    ?>


    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-2.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-1.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-3.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-4.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-5.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-6.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <main class="main">


        <!-- <section class="home-slider position-relative pt-25 pb-20">
            <div class="container">
                <div class="row" style="justify-content: center;">
                    <div class="col-lg-9">
                        <div class="position-relative">
                            <div class="hero-slider-1 style-3 dot-style-1 dot-style-1-position-1">
                                <div class="single-hero-slider single-animation-wrap">
                                    <div class="container">
                                        <div class="slider-1-height-3 slider-animated-1">
                                            <div class="hero-slider-content-2">
                                                <h4 class="animated">Trade-In Offer</h4>
                                                <h2 class="animated fw-900">Supper Value Deals</h2>
                                                <h1 class="animated fw-900 text-brand">On All Products</h1>
                                                <p class="animated">Save more with coupons & up to 70% off</p>
                                                <a class="animated btn btn-brush btn-brush-3" href="shop-product-full.php"> Shop Now </a>
                                            </div>
                                            <div class="slider-img">
                                                <img src="assets/imgs/slider/slider-4.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-hero-slider single-animation-wrap">
                                    <div class="container">
                                        <div class="slider-1-height-3 slider-animated-1">
                                            <div class="hero-slider-content-2">
                                                <h4 class="animated">Lorem ipsum</h4>
                                                <h2 class="animated fw-900">Concortica</h2>
                                                <h1 class="animated fw-900 text-brand">Great Collection</h1>
                                                <p class="animated">Save more with coupons & up to 20% off</p>
                                                <a class="animated btn btn-brush btn-brush-3" href="shop-product-full.php"> Shop Now </a>
                                            </div>
                                            <div class="slider-img">
                                                <img src="assets/imgs/slider/slider-5.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-arrow hero-slider-1-arrow style-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up animated">
                            <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">Ontime Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up animated">
                            <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up animated">
                            <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up animated">
                            <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">Boost in Career</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up animated">
                            <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">Happy Exchange</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up animated">
                            <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs section-padding wow fadeIn animated">
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                        </li>
                    </ul>
                    <a href="shop-grid-right.php" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->

                
                <div class="tab-content wow fadeIn animated" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">

    <!-- Add this line before the closing </body> tag -->
<!-- Bootstrap JS -->
<script src="path/to/bootstrap.min.js"></script>

<div class="row product-grid-4">

    <?php 
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
        if($row["availability_status"] == "yes") { ?>
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
                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.php"><i class="fi-rs-heart"></i></a>
                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.php"><i class="fi-rs-shuffle"></i></a>
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
                        <div class="product-action-1 show">
                            <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                        </div>
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
            
        <?php } }} ?>
</div>





<?php
// Calculate total number of pages
$total_pages_sql = "SELECT COUNT(*) as count FROM global_book_collection";
$total_pages_result = $conn->query($total_pages_sql);
$total_pages_row = $total_pages_result->fetch_assoc();
$total_pages = ceil($total_pages_row['count'] / $limit);

// Previous and next page numbers
$prev_page = $page - 1;
$next_page = $page + 1;

// Display pagination links
echo "<ul class='pagination'>";
if ($prev_page > 0) {
    echo "<li><a href='?page=$prev_page'>Previous</a></li>";
}

for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li " . ($page == $i ? "class='active'" : "") . "><a href='?page=$i'>$i</a></li>";
}

if ($page < $total_pages) {
    echo "<li><a href='?page=$next_page'>Next</a></li>";
}
echo "</ul>";
?>








    </main>
    <?php
    include 'partials/footer.php'
    ?>