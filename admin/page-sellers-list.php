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
                <h2 class="content-title">Sellers list</h2>
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
                        <div class="col-lg-2 col-md-3 col-6">
                            <select class="form-select">
                                <option>Status</option>
                                <option>Active</option>
                                <option>Disabled</option>
                                <option>Show all</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">
                            <select class="form-select">
                                <option>Show 20</option>
                                <option>Show 30</option>
                                <option>Show 40</option>
                            </select>
                        </div>
                    </div>
                </header> <!-- card-header end// -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Seller</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Registered</th>
                                    <th class="text-end"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar1.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Eleanor Pena</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>eleanor2022@example.com</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar2.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Mary Monasa</h6>
                                                <small class="text-muted">Seller ID: #129</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>monalisa@example.com</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>11.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar3.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Jonatan Ive</h6>
                                                <small class="text-muted">Seller ID: #400</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>mrjohn@example.com</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar4.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Eleanor Pena</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>eleanor2022@example.com</td>
                                    <td><span class="badge rounded-pill alert-danger">Inactive</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar1.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Albert Pushkin</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>someone@mymail.com</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>20.11.2019</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar2.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Alexandra Pena</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>eleanor2022@example.com</td>
                                    <td><span class="badge rounded-pill alert-danger">Inactive</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar3.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Eleanor Pena</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>eleanor2022@example.com</td>
                                    <td><span class="badge rounded-pill alert-danger">Inactive</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar4.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Alex Pushkina</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>alex@gmail.org</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar1.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Eleanor Pena</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>eleanor2022@example.com</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar2.jpg" class="img-sm img-avatar" alt="Userpic">
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">Eleanor Pena</h6>
                                                <small class="text-muted">Seller ID: #439</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>eleanor2022@example.com</td>
                                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                                    <td>08.07.2022</td>
                                    <td class="text-end">
                                        <a href="page-seller-detail.php" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <!-- table-responsive.// -->
                    </div>
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