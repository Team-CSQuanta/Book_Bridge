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
                <h2 class="content-title">Transactions </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <header class="border-bottom mb-4 pb-4">
                                <div class="row">
                                    <div class="col-lg-5 col-6 me-auto">
                                        <input type="text" placeholder="Search..." class="form-control">
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <select class="form-select">
                                            <option>Method</option>
                                            <option>Master card</option>
                                            <option>Visa card</option>
                                            <option>Paypal</option>
                                        </select>
                                    </div>
                                </div>
                            </header> <!-- card-header end// -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Paid</th>
                                            <th>Method</th>
                                            <th>Date</th>
                                            <th class="text-end"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>#456667</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/1.png" alt="Payment">
                                                    <span class="text text-muted">Amex</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#134768</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/2.png" alt="Payment">
                                                    <span class="text text-muted">Master card</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#134768</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/3.png" alt="Payment">
                                                    <span class="text text-muted">Paypal</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#134768</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/4.png" alt="Payment">
                                                    <span class="text text-muted">Visa</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#887780</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/4.png" alt="Payment">
                                                    <span class="text text-muted">Visa</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#344556</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/4.png" alt="Payment">
                                                    <span class="text text-muted">Visa</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#134768</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/2.png" alt="Payment">
                                                    <span class="text text-muted">Master card</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#134768</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/2.png" alt="Payment">
                                                    <span class="text text-muted">Master card</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#998784</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/3.png" alt="Payment">
                                                    <span class="text text-muted">Paypal</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#556667</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/3.png" alt="Payment">
                                                    <span class="text text-muted">Paypal</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#098989</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/3.png" alt="Payment">
                                                    <span class="text text-muted">Paypal</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>#134768</b></td>
                                            <td>$294.00</td>
                                            <td>
                                                <div class="icontext">
                                                    <img class="icon border" src="assets/imgs/card-brands/4.png" alt="Payment">
                                                    <span class="text text-muted">Visa</span>
                                                </div>
                                            </td>
                                            <td>16.12.2022, 14:21</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- table-responsive.// -->
                        </div> <!-- col end// -->
                        <aside class="col-lg-3">
                            <div class="box bg-light" style="min-height:80%">
                                <p class="text-center text-muted my-5">Please select transaction <br> to see details</p>
                            </div>
                        </aside> <!-- col end// -->
                    </div> <!-- row end// -->
                </div> <!-- card-body // -->
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
        </section>

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