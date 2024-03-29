<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
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
                        <a href="page-sellers-cards.php">Sellers cards</a>
                        <a href="page-sellers-list.php">Sellers list</a>
                        <a href="page-seller-detail.php" class="active">Seller profile</a>
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
                <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-primary" style="height:150px">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                            <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height:190px; width:200px; margin-top:-120px">
                                <img src="assets/imgs/brands/brand-3.jpg" class="center-xy img-fluid" alt="Logo Brand">
                            </div>
                        </div> <!--  col.// -->
                        <div class="col-xl col-lg">
                            <h3>Cocorico sports shop</h3>
                            <p>3891 Ranchview Dr. Richardson, California 62639</p>
                        </div> <!--  col.// -->
                        <div class="col-xl-4 text-md-end">
                            <select class="form-select w-auto d-inline-block">
                                <option>Actions</option>
                                <option>Disable shop</option>
                                <option>Analyze</option>
                                <option>Something</option>
                            </select>
                            <a href="#" class="btn btn-primary"> View live <i class="material-icons md-launch"></i> </a>
                        </div> <!--  col.// -->
                    </div> <!-- card-body.// -->
                    <hr class="my-4">
                    <div class="row g-4">
                        <div class="col-md-12 col-lg-4 col-xl-2">
                            <article class="box">
                                <p class="mb-0 text-muted">Total sales:</p>
                                <h5 class="text-success">238</h5>
                                <p class="mb-0 text-muted">Revenue:</p>
                                <h5 class="text-success mb-0">$2380</h5>
                            </article>
                        </div> <!--  col.// -->
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <h6>Contacts</h6>
                            <p>
                                Manager: Jerome Bell <br>
                                info@example.com <br>
                                (229) 555-0109, (808) 555-0111
                            </p>
                        </div> <!--  col.// -->
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <h6>Address</h6>
                            <p>
                                Country: California <br>
                                Address: Ranchview Dr. Richardson <br>
                                Postal code: 62639
                            </p>
                        </div> <!--  col.// -->
                        <div class="col-sm-6 col-xl-4 text-xl-end">
                            <map class="mapbox position-relative d-inline-block">
                                <img src="assets/imgs/misc/map.jpg" class="rounded2" height="120" alt="map">
                                <span class="map-pin" style="top:50px; left: 100px"></span>
                                <button class="btn btn-sm btn-brand position-absolute bottom-0 end-0 mb-15 mr-15 font-xs"> Large </button>
                            </map>
                        </div> <!--  col.// -->
                    </div> <!--  row.// -->
                </div> <!--  card-body.// -->
            </div> <!--  card.// -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Products by seller</h5>
                    <div class="row">
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/1.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/2.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/3.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Jeans short new model</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/4.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Travel Bag XL</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/5.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/6.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/7.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/8.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Apple Airpods CB-133</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/9.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/10.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/11.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Jeans short new model</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/12.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Travel Bag XL</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/1.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/2.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/3.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Jeans short new model</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/4.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Travel Bag XL</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/5.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/6.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/7.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/8.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Apple Airpods CB-133</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/9.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/10.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Product name</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/11.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Jeans short new model</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="assets/imgs/items/12.jpg" alt="Product"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title">Travel Bag XL</a>
                                    <div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
                                </div>
                            </div> <!-- card-product  end// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!--  card-body.// -->
            </div> <!--  card.// -->
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