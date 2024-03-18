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
                <img src="assets/imgs/theme/logo.svg" class="logo" alt="Evara Dashboard">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item ">
                    <a class="menu-link" href="index.php"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.php"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">
                        <a href="page-products-list.php">Product List</a>
                        <a href="page-products-grid.php">Product grid</a>
                        <a href="page-products-grid-2.php">Product grid 2</a>
                        <a href="page-categories.php">Categories</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-orders-1.php"> <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">Orders</span>
                    </a>
                    <div class="submenu">
                        <a href="page-orders-1.php">Order list 1</a>
                        <a href="page-orders-2.php">Order list 2</a>
                        <a href="page-orders-detail.php">Order detail</a>
                        <a href="page-orders-tracking.php">Order tracking</a>
<a href="page-invoice.php">Invoice</a>
                    </div>
                </li>
                <li class="menu-item has-submenu active">
                    <a class="menu-link" href="page-sellers-cards.php"> <i class="icon material-icons md-store"></i>
                        <span class="text">Sellers</span>
                    </a>
                    <div class="submenu">
                        <a href="page-sellers-cards.php" class="active">Sellers cards</a>
                        <a href="page-sellers-list.php">Sellers list</a>
                        <a href="page-seller-detail.php">Seller profile</a>
                    </div>
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
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-person"></i>
                        <span class="text">Account</span>
                    </a>
                    <div class="submenu">
                        <a href="page-account-login.php">User login</a>
                        <a href="page-account-register.php">User registration</a>
                        <a href="page-error-404.php">Error 404</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-reviews.php"> <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-brands.php"> <i class="icon material-icons md-stars"></i>
                        <span class="text">Brands</span> </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" disabled href="#"> <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">Statistics</span>
                    </a>
                </li>
            </ul>
            <hr>
            <ul class="menu-aside">
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                    <div class="submenu">
                        <a href="page-settings-1.php">Setting sample 1</a>
                        <a href="page-settings-2.php">Setting sample 2</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-blank.php"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text"> Starter page </span>
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
                <h2 class="content-title">Sellers cards</h2>
                <div>
                    <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
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
                                <option>Show 20</option>
                                <option>Show 30</option>
                                <option>Show 40</option>
                                <option>Show all</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-6 col-md-3">
                            <select class="form-select">
                                <option>Status: all</option>
                                <option>Active only</option>
                                <option>Disabled</option>
                            </select>
                        </div>
                    </div>
                </header> <!-- card-header end// -->
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar1.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">Mary Sandra</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #409</p>
                                        <p>mary90@example.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar2.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">Leslie Alexander</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #478</p>
                                        <p>leslie@example.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar3.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">Leslie Alexander</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #478</p>
                                        <p>leslie@example.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar4.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">Floyd Miles</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #171</p>
                                        <p>fedor12@example.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar1.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">John Alexander</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #987</p>
                                        <p>john@mymail.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar3.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">Albert Flores</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #478</p>
                                        <p>leslie@example.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar4.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">Leslie Alexander</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #478</p>
                                        <p>leslie@example.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="col">
                            <div class="card card-user">
                                <div class="card-header">
                                    <img class="img-md img-avatar" src="assets/imgs/people/avatar1.jpg" alt="User pic">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mt-50">Marx Alberto</h5>
                                    <div class="card-text text-muted">
                                        <p class="m-0">Seller ID: #478</p>
                                        <p>leslie@example.com</p>
                                        <a href="#" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card-body end// -->
            </div> <!-- card end// -->
            <div class="pagination-area mt-15 mb-50">
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