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
                <img src="assets/imgs/theme/Book-Bridge.svg" class="logo" alt="Evara Dashboard">
            </a>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item ">
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
                <h2 class="content-title">Profile setting </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row gx-5">
                        <aside class="col-lg-3 border-end">
                            <nav class="nav nav-pills flex-lg-column mb-4">
                                <a class="nav-link active" aria-current="page" href="#">General</a>
                                <a class="nav-link" href="#">Moderators</a>
                                <a class="nav-link" href="#">Admin account</a>
                                <a class="nav-link" href="#">SEO settings</a>
                                <a class="nav-link" href="#">Mail settings</a>
                                <a class="nav-link" href="#">Newsletter</a>
                            </nav>
                        </aside>
                        <div class="col-lg-9">
                            <section class="content-body p-xl-4">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row gx-3">
                                                <div class="col-6  mb-3">
                                                    <label class="form-label">First name</label>
                                                    <input class="form-control" type="text" placeholder="Type here">
                                                </div> <!-- col .// -->
                                                <div class="col-6  mb-3">
                                                    <label class="form-label">Last name</label>
                                                    <input class="form-control" type="text" placeholder="Type here">
                                                </div> <!-- col .// -->
                                                <div class="col-lg-6  mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input class="form-control" type="email" placeholder="example@mail.com">
                                                </div> <!-- col .// -->
                                                <div class="col-lg-6  mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input class="form-control" type="tel" placeholder="+1234567890">
                                                </div> <!-- col .// -->
                                                <div class="col-lg-12  mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input class="form-control" type="text" placeholder="Type here">
                                                </div> <!-- col .// -->
                                                <div class="col-lg-6  mb-3">
                                                    <label class="form-label">Birthday</label>
                                                    <input class="form-control" type="date">
                                                </div> <!-- col .// -->
                                            </div> <!-- row.// -->
                                        </div> <!-- col.// -->
                                        <aside class="col-lg-4">
                                            <figure class="text-lg-center">
                                                <img class="img-lg mb-3 img-avatar" src="assets/imgs/people/avatar1.jpg" alt="User Photo">
                                                <figcaption>
                                                    <a class="btn btn-light rounded font-md" href="#">
                                                        <i class="icons material-icons md-backup font-md"></i> Upload
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </aside> <!-- col.// -->
                                    </div> <!-- row.// -->
                                    <br>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </form>
                                <hr class="my-5">
                                <div class="row" style="max-width:920px">
                                    <div class="col-md">
                                        <article class="box mb-3 bg-light">
                                            <a class="btn float-end btn-light btn-sm rounded font-md" href="#">Change</a>
                                            <h6>Password</h6>
                                            <small class="text-muted d-block" style="width:70%">You can reset or change your password by clicking here</small>
                                        </article>
                                    </div> <!-- col.// -->
                                    <div class="col-md">
                                        <article class="box mb-3 bg-light">
                                            <a class="btn float-end btn-light rounded btn-sm font-md" href="#">Deactivate</a>
                                            <h6>Remove account</h6>
                                            <small class="text-muted d-block" style="width:70%">Once you delete your account, there is no going back.</small>
                                        </article>
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                            </section> <!-- content-body .// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card body end// -->
            </div> <!-- card end// -->
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