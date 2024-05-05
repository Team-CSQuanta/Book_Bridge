<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require './config/database.php';

if (!isset($_SESSION['user-logged-email'])) {
    header("Location: http://localhost/Book_Bridge/admin-login.php");
    exit();
}
?>
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

    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.php" class="brand-wrap">
                <?php if ($_SESSION['user-logged-role'] == "admin") : ?>
                    <img src="assets/imgs/theme/Book-Bridge.svg" class="logo" alt="Book Bridge Dashboard">
                <?php elseif ($_SESSION['user-logged-role'] == "club-manager") : ?>
                    <img src="assets/imgs/theme/Book-Bridge-club.svg" class="logo" alt="Book Bridge Dashboard">
                <?php endif ?>
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
                    <a class="menu-link" href="page-exchange-offers.php"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text">Exchange offers</span>
                    </a>
                </li>

                <?php if ($_SESSION['user-logged-role'] == "club-manager") : ?>


                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="#"> <i class="icon material-icons md-swap_vert"></i>
                            <span class="text">Exchange Request</span>
                        </a>
                        <div class="submenu">
                            <a href="page-exchange-request.php">Exchange request list</a>
                            <a href="page-manage-exchange-request.php">Manage exchange request</a>
                        </div>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="#"> <i class="icon material-icons md-inbox"></i>
                            <span class="text">Contribution Request</span>
                        </a>
                        <div class="submenu">
                            <a href="page-contribution-request.php">Contribution Request List</a>
                            <a href="page-manage-contribution-request.php">Manage contribution request</a>
                        </div>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="page-orders-1.php"> <i class="icon material-icons md-swap_calls"></i>
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
                    <li class="menu-item">
                        <a class="menu-link" href="page-wishes-list.php"> <i class="icon material-icons md-person_add"></i>
                            <span class="text">Member Application</span>
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($_SESSION['user-logged-role'] == "admin") : ?>
                    <li class="menu-item">
                        <a class="menu-link" href="page-wishes-list.php"> <i class="icon material-icons md-star"></i>
                            <span class="text">Wishes</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="page-categories.php"> <i class="icon material-icons md-category"></i>
                            <span class="text">Categories</span>
                        </a>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href=""> <i class="icon material-icons md-business"></i>
                            <span class="text">Bibliophile Club</span>
                        </a>
                        <div class="submenu">
                            <a href="page-club-list.php">Club List</a>
                            <a href="page-form-add-club.php">Add Club</a>
                            <a href="page-club-request-list.php">Club Requests</a>
                        </div>
                    </li>
                    <li class="menu-item ">
                        <a class="menu-link" href="page-users-list.php"> <i class="icon material-icons md-people"></i>
                            <span class="text">Users</span>
                        </a>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="page-moderator-list.php"> <i class="icon material-icons md-supervised_user_circle"></i>
                            <span class="text">Moderators</span>
                        </a>
                        <div class="submenu">
                            <a href="page-add-moderator.php">Add Moderator</a>
                            <a href="page-moderator-list.php">Moderators List</a>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
            <hr>
            <ul class="menu-aside">
                <li class="menu-item">
                    <a class="menu-link" href="settings.php"> <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
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

            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
                <ul class="nav">
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="<?= './assets/imgs/people/' . $_SESSION['profile_img'] ?>" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="./settings.php"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="http://localhost/Book_Bridge/admin/handler/admin-logout.php"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>