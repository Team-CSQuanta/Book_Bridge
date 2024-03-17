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
                <li class="menu-item">
                    <a class="menu-link" href="index.php"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item has-submenu active">
                    <a class="menu-link" href="page-products-list.php"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">
                        <a href="page-products-list.php">Product List</a>
                        <a href="page-products-grid.php" class="active">Product grid</a>
                        <a href="page-products-grid-2.php">Product grid 2</a>
                        <a href="page-categories.php">Categories</a>
                    </div>
                </li>
                <li class="menu-item has-submenu ">
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
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-sellers-cards.php"> <i class="icon material-icons md-store"></i>
                        <span class="text">Sellers</span>
                    </a>
                    <div class="submenu">
                        <a href="page-sellers-cards.php">Sellers cards</a>
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
        <header class="main-header navbar">
            <div class="col-search">
                <form class="searchform">
                    <div class="input-group">
                        <input list="search_terms" type="text" class="form-control" placeholder="Search term">
                        <button class="btn btn-light bg" type="button"> <i class="material-icons md-search"></i></button>
                    </div>
                    <datalist id="search_terms">
                        <option value="Products">
                        <option value="New orders">
                        <option value="Apple iphone">
                        <option value="Ahmed Hassan">
                    </datalist>
                </form>
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#">
                            <i class="material-icons md-notifications animation-shake"></i>
                            <span class="badge rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                            <a class="dropdown-item text-brand" href="#"><img src="assets/imgs/theme/flag-us.png" alt="English">English</a>
                            <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-fr.png" alt="Français">Français</a>
                            <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-jp.png" alt="Français">日本語</a>
                            <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-cn.png" alt="Français">中国人</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="assets/imgs/people/avatar2.jpg" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">Products grid</h2>
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
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> ©, Evara - HTML Ecommerce Template .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        All rights reserved
                    </div>
                </div>
            </div>
        </footer>
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