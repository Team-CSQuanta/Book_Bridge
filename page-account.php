﻿<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>BookBridge Online</title>
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
    <link rel="stylesheet" href="assets/css/main.css?v=3.4">
</head>

<body>
<?php
    include 'partials/header.php';
    include  'partials/mobile-header.php';


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book_bridge";


    // Assume you have a database connection named $con
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

           // Retrieve the number of book contributions
           $num_Contribution_query = "SELECT COUNT(*) as total FROM exchangerequest";
           $num_Contribution_query_run = mysqli_query($conn, $num_Contribution_query);
   
           // Check if query executed successfully
           if ($num_Contribution_query_run) {
               $row = mysqli_fetch_assoc($num_Contribution_query_run);
               $total_num = $row['total'];
               $message = "You have contributed " . $total_num . " books.";
           } else {
               $message = "Error in fetching contribution data.";
           }

    ?>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.php" rel="nofollow">Home</a>
                    <span></span> Pages
                    <span></span> Account
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contribution-tab" data-bs-toggle="tab" href="#contribution" role="tab" aria-controls="contribution" aria-selected="true"><i class="fi-rs-marker mr-10"></i>Contribute a Book</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="wishes-tab" data-bs-toggle="tab" href="#wishes" role="tab" aria-controls="wishes" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Wish a Book</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="request-tab" data-bs-toggle="tab" href="#request" role="tab" aria-controls="request" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Request a Book</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>History</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="page-login-register.php"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello Rakib! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#history">recent requests</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="contribution" role="tabpanel" aria-labelledby="contribution-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 mx-auto">
                                                <div class="card mb-3 mb-lg-0" style="width: 400px; height: 300px;">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">My Book Contribution</h5>
                                                    </div>
                                                    <div class="card-body d-flex flex-column justify-content-between">

                               
                                                    <?php echo $message; ?>

                                                    <div class="text-center">  
                                                    <form action="bookupload.php" method="post">
                                                            <button type="submit" class="btn btn-primary">Contribute a Book</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                                    <div class="tab-pane fade" id="wishes" role="tabpanel" aria-labelledby="wishes-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 mx-auto">
                                                <div class="card mb-3 mb-lg-0" style="width: 400px; height: 300px;">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">My WishList</h5>
                                                    </div>
                                                    <div class="card-body d-flex flex-column justify-content-between">

                               
                                                    <?php echo $message; ?>

                                                    <div class="text-center">  
                                                    <form action="wishABook.php" method="post">
                                                            <button type="submit" class="btn btn-primary">Wish a Book</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                                 


                                    <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Orders tracking</h5>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                            <div class="input-style mb-20">
                                                                <label>Order ID</label>
                                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>Billing email</label>
                                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Billing Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>3522 Interstate<br> 75 Business Spur,<br> Sault Ste. <br>Marie, MI 49783</address>
                                                        <p>New York</p>
                                                        <a href="#" class="btn-small">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Shipping Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>4299 Express Lane<br>
                                                            Sarasota, <br>FL 34249 USA <br>Phone: 1.941.227.4444</address>
                                                        <p>Sarasota</p>
                                                        <a href="#" class="btn-small">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Already have an account? <a href="page-login-register.php">Log in instead!</a></p>
                                                <form method="post" name="enq">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>First Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="name" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Last Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="phone">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Display Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="dname" type="text">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="email" type="email">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Current Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="password" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>New Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="npassword" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Confirm Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="cpassword" type="password">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>



    <?php
    include 'partials/footer.php';

    mysqli_close($con);
    ?>