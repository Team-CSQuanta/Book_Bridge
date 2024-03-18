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
                <div>
                    <h2 class="content-title card-title">Reviews</h2>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div>
                    <input type="text" placeholder="Search by name" class="form-control bg-white">
                </div>
            </div>
            <div class="card mb-4">
                <header class="card-header">
                    <div class="row gx-3">
                        <div class="col-lg-4 col-md-6 me-auto">
                            <input type="text" placeholder="Search..." class="form-control" />
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
                </header>
                <!-- card-header end// -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </th>
                                    <th>#ID</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Date</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>23</td>
                                    <td><b>A-Line Mini Dress in Blue</b></td>
                                    <td>Devon Lane</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 60%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>10.03.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>24</td>
                                    <td><b>Fashion Woman Bag</b></td>
                                    <td>Guy Hawkins</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 80%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>04.12.2019</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>25</td>
                                    <td><b>Air Jordan 1 Top 3 Sneaker (DS)</b></td>
                                    <td>Savannah Nguyen</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 90%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>25.05.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>26</td>
                                    <td><b>Samsung Galaxy S20 (SM-G980F/DS) Dual SIM</b></td>
                                    <td>Kristin Watson</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 90%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>01.06.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>27</td>
                                    <td><b>Macbook Pro 16 inch (2022 ) For Sale</b></td>
                                    <td>Jane Cooper</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 100%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>28</td>
                                    <td><b>Gaming Chair, local pickup only</b></td>
                                    <td>Courtney Henry</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 100%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>29</td>
                                    <td><b>Coach Tabby 26 for sale</b></td>
                                    <td>Ralph Edwards</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 90%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>30</td>
                                    <td><b>Oneplus 7 Pro GM1910 256GB</b></td>
                                    <td>Courtney Henry</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 70%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>20.02.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>31</td>
                                    <td><b>DJI Mavic Pro 2</b></td>
                                    <td>Theresa Webb</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 20%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>10.03.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>32</td>
                                    <td><b>Heimer Miller Sofa (Mint Condition)</b></td>
                                    <td>Darrell Steward</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 80%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>10.04.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>33</td>
                                    <td><b>Dell XPS 13 9380, 13.3" 4K UHD (3840X2160) </b></td>
                                    <td>Leslie Alexander</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 50%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>25.05.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>34</td>
                                    <td><b>Fashion Woman Bag</b></td>
                                    <td>Esther Howard</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 100%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>07.04.2022</td>
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
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>35</td>
                                    <td><b>iPad Pro 2017 Model</b></td>
                                    <td>Savannah Nguyen</td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width: 100%;" class="stars-active">
                                                <img src="assets/imgs/icons/stars-active.svg" alt="stars" />
                                            </li>
                                            <li>
                                                <img src="assets/imgs/icons/starts-disable.svg" alt="stars" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>10.10.2019</td>
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
                    </div> <!-- table-responsive//end -->
                </div>
                <!-- card-body end// -->
            </div>
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