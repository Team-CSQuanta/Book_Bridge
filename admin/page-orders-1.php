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
                    <h2 class="content-title card-title">Order List </h2>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div>
                    <input type="text" placeholder="Search order ID" class="form-control bg-white">
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
                                <option>Status</option>
                                <option>Active</option>
                                <option>Disabled</option>
                                <option>Show all</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-6 col-md-3">
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
                                    <th>#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col" class="text-end"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0901</td>
                                    <td><b>Marvin McKinney</b></td>
                                    <td>marvin@example.com</td>
                                    <td>$9.00</td>
                                    <td><span class="badge rounded-pill alert-warning">Pending</span></td>
                                    <td>03.12.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2323</td>
                                    <td><b>Leslie Alexander</b></td>
                                    <td>leslie@example.com</td>
                                    <td>$46.61</td>
                                    <td><span class="badge rounded-pill alert-warning">Pending</span></td>
                                    <td>21.02.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>1233</td>
                                    <td><b>Esther Howard</b></td>
                                    <td>esther@example.com</td>
                                    <td>$12.00</td>
                                    <td><span class="badge rounded-pill alert-danger">Canceled</span></td>
                                    <td>03.07.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>1233</td>
                                    <td><b>Esther Howard</b></td>
                                    <td>esther@example.com</td>
                                    <td>$12.00</td>
                                    <td><span class="badge rounded-pill alert-danger">Canceled</span></td>
                                    <td>03.07.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2323</td>
                                    <td><b>Jenny Wilson</b></td>
                                    <td>jenny@example.com</td>
                                    <td>$589.99</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>22.05.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2112</td>
                                    <td><b>Marvin McKinney</b></td>
                                    <td>marvin@example.com</td>
                                    <td>$16.58</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>23.04.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>7897</td>
                                    <td><b>Albert Flores</b></td>
                                    <td>albert@example.com</td>
                                    <td>$10.00</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>13.03.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2323</td>
                                    <td><b>Wade Warren</b></td>
                                    <td>wade@example.com</td>
                                    <td>$105.55</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>23.09.2019</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2324</td>
                                    <td><b>Jane Cooper</b></td>
                                    <td>jane@example.com</td>
                                    <td>$710.68</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>28.04.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2325</td>
                                    <td><b>Savannah Nguyen</b></td>
                                    <td>savannah@example.com</td>
                                    <td>$710.68</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>23.03.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2326</td>
                                    <td><b>Guy Hawkins</b></td>
                                    <td>guy@example.com</td>
                                    <td>$767.50</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>28.04.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2327</td>
                                    <td><b>Darrell Steward</b></td>
                                    <td>darrel@example.com</td>
                                    <td>$406.27</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>14.07.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2328</td>
                                    <td><b>Jane Cooper</b></td>
                                    <td>jane@example.com</td>
                                    <td>$601.13</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>18.03.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>2329</td>
                                    <td><b>Darlene Robertson</b></td>
                                    <td>deriene@example.com</td>
                                    <td>$948.55</td>
                                    <td><span class="badge rounded-pill alert-success">Received</span></td>
                                    <td>03.07.2022</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- table-responsive //end -->
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