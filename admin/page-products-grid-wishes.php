<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Evara Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg">
    <!-- Template CSS -->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.php" class="brand-wrap">
                <img src="assets/imgs/theme/Book-Bridge.svg" class="logo" alt="Evara Dashboard">
            </a>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item">
                    <a class="menu-link" href="index.php"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-products-grid.php"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text">Exchange offers</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-products-grid-wishes.php"> <i class="icon material-icons md-star"></i>
                        <span class="text">Wishes</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-categories.php"> <i class="icon material-icons md-category"></i>
                        <span class="text">Categories</span>
                    </a>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-orders-1.php"> <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">On going exchange</span>
                    </a>
                    <div class="submenu">
                        <a href="page-orders-1.php">Order list 1</a>
                        <a href="page-orders-2.php">Order list 2</a>
                        <a href="page-orders-detail.php">Order detail</a>
                        <a href="page-orders-tracking.php">Order tracking</a>
                        <a href="page-invoice.php">Invoice</a>
                    </div>
                </li>
                <li class="menu-item ">
                    <a class="menu-link" href="page-sellers-list.php"> <i class="icon material-icons md-people"></i>
                        <span class="text">Users</span>
                    </a>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-form-product-1.php"> <i class="icon material-icons md-add_box"></i>
                        <span class="text">Add product</span>
                    </a>
                    <div class="submenu">
                        <a href="page-form-product-1.php">Add product 1</a>
                        <a href="page-form-product-2.php">Add product 2</a>
                        <a href="page-form-product-3.php">Add product 3</a>
                        <a href="page-form-product-4.php">Add product 4</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-transactions-1.php"> <i class="icon material-icons md-monetization_on"></i>
                        <span class="text">Transactions</span>
                    </a>
                    <div class="submenu">
                        <a href="page-transactions-1.php">Transaction 1</a>
                        <a href="page-transactions-2.php">Transaction 2</a>
                        <a href="page-transactions-details.php">Transaction Details</a>
                    </div>
                </li>
                <!-- <li class="menu-item has-submenu">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-person"></i>
                        <span class="text">Account</span>
                    </a>
                    <div class="submenu">
                        <a href="page-account-login.php">User login</a>
                        <a href="page-account-register.php">User registration</a>
                        <a href="page-error-404.php">Error 404</a>
                    </div>
                </li> -->
                <li class="menu-item">
                    <a class="menu-link" href="page-reviews.php"> <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>

            </ul>
            <hr>
            <ul class="menu-aside">
                <li class="menu-item">
                    <a class="menu-link" href="page-settings-1.php"> <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                </li>
            </ul>
            <br>
            <br>
        </nav>
    </aside>
    <main class="main-wrap">
    <?php 
        include 'partials/header-admin.php'
        ?>
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">All wishes</h2>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div>
                    <a href="#" class="btn btn-light rounded font-md">Export</a>
                    <a href="#" class="btn btn-light rounded  font-md">Import</a>
                    <a href="#" class="btn btn-primary btn-sm rounded">Create new</a>
                </div>
            </div>
            <div class="card mb-4">
                <header class="card-header">
                    <div class="row gx-3">
                        <div class="col-lg-4 col-md-6 me-auto">
                            <input type="text" placeholder="Search..." class="form-control">
                        </div>
                        <div class="col-lg-2 col-6 col-md-3">
                            <select class="form-select">
                                <option>All category</option>
                                <option>Electronics</option>
                                <option>Clothings</option>
                                <option>Something else</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-6 col-md-3">
                            <select class="form-select">
                                <option>Latest added</option>
                                <option>Cheap first</option>
                                <option>Most viewed</option>
                            </select>
                        </div>
                    </div>
                </header> <!-- card-header end// -->
                <div class="card-body">
                    <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/1.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Just another product name</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/2.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Brown Winter Jacket for Men</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/3.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Jeans short new model</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/4.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Travel Bag XL</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/5.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Just another product name</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/6.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Just another product name</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/7.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Just another product name</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/8.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Apple Airpods CB-133</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/9.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Apple Airpods CB-133</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/10.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate">Apple Airpods CB-133</a>
                                    <div class="price mb-2">$179.00</div> <!-- price.// -->
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                        <i class="material-icons md-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                        <i class="material-icons md-delete_forever"></i> Delete
                                    </a>
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card-body end// -->
            </div> <!-- card end// -->
            <div class="pagination-area mt-30 mb-50">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">16</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </section> <!-- content-main end// -->
 
    </main>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/perfect-scrollbar.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <!-- Main Script -->
    <script src="assets/js/main.js" type="text/javascript"></script>
</body>

</html>