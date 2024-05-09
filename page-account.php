<!DOCTYPE html>
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php include_once 'account_handler.php'; ?>
</head>

<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
                                         <a class="nav-link" id="not-published-tab" data-bs-toggle="tab" href="#not-published" role="tab" aria-controls="not-published" aria-selected="false"><i class="fi-rs-marker mr-10"></i>Yet to Publish</a>
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
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello <?php echo $first_name; ?>! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#history">recent requests</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                         </div> <!-- card end -->
                                    </div> <!--  -->
                                   
                           
                       

                <div class="tab-pane fade" id="contribution" role="tabpanel" aria-labelledby="contribution-tab">
                        <div class="row justify-content-center">
                        <div class="col-lg-6 mx-auto">

                      <div class="card mb-3 mb-lg-0" style="width: 700px; height: 530px; overflow-y: auto;">
                 <div class="card-header">
                     <h5 class="mb-0">My Book Contribution</h5>
                 </div>
                 <div class="card-body">
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary" onclick="window.location.href='bookupload.php'">Contribute a Book</button>
                    </div>
                    <hr>
                    <h6 class="mt-4" style="margin-top: 10px;">Total Books Contributed: <strong> <?php echo $result_books->num_rows; ?></p></strong></h6>
                    <?php if ($result_books->num_rows > 0) : ?>
                        <table class="table" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr style="background-color: #6AB187;">
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Book Title</th>
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Author</th>
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $row_color = true; ?>
                                <?php while ($row_book = $result_books->fetch_assoc()) : ?>
                                    <tr style="background-color: <?php echo $row_color ? 'white' : '#CED2CC'; ?>;">
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row_book['book_title']; ?></td>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><i><?php echo $row_book['authors']; ?></i></td>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row_book['categoryName']; ?></td>
                                    </tr>
                                    <?php $row_color = !$row_color; ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                
                    <?php else : ?>
                        <p>No books contributed yet.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
 

<div class="tab-pane fade" id="not-published" role="tabpanel" aria-labelledby="not-published-tab">
   <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto">
            <div class="card mb-3 mb-lg-0" style="width: 700px; height: 530px; overflow-y: auto;">
                <div class="card-header">
                    <h5 class="mb-0">Books Yet to Publish</h5>
                </div>
                <div class="card-body" >
                    <?php if ($result_not_published_books->num_rows > 0) : ?>
                        <table class="table" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr style="background-color: #6AB187;">
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Book Title</th>
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Author</th>
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Category</th>
                                     <th style="border: 1px solid #dddddd; padding: 8px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $row_color = true; ?>
                                <?php while ($row_not_published_book = $result_not_published_books->fetch_assoc()) : ?>
                                    <tr style="background-color: <?php echo $row_color ? 'white' : '#CED2CC'; ?>;">
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row_not_published_book['book_title']; ?></td>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><i><?php echo $row_not_published_book['authors']; ?></i></td>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row_not_published_book['categoryName']; ?></td>
                                         <td style="border: 1px solid #dddddd; padding: 8px;"><span class="badge badge-primary"><?php echo $row_not_published_book['status']; ?></span></td>
                                    </tr>
                                    <?php $row_color = !$row_color; ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No books with status not published.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Container for Activity History -->
<div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto">
            <div class="card mb-3 mb-lg-0" style="width: 700px; height: 530px; overflow-y: auto;">
                <div class="card-header">
                    <h5 class="mb-0">Activity History</h5>
                </div>
                <div class="card-body">
                    <?php if ($Activityresult->num_rows > 0) : ?>
                        <table class="table" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr style="background-color: #6AB187;">
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Time</th>
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row =$Activityresult->fetch_assoc()) : ?>
                                    <tr>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row['timestamp']; ?></td>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row['activity_description']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No activity recorded yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="tab-pane fade" id="request" role="tabpanel" aria-labelledby="request-tab">
<div class="row justify-content-center">
        <div class="col-lg-6 mx-auto">
         <div class="card mb-3 mb-lg-0" style="width: 700px; height: 530px; overflow-y: auto;">
                <div class="card-header">
                    <h5 class="mb-0">Your Book Request History!</h5>
                </div>
                 <div class="card-body">
                 <div class="text-center">
               <button id="BookRequestButton"  type="submit" class="btn btn-primary">Request a Book</button>
             </div>
             <hr>
       <?php if($result_exchange_request ->num_rows > 0) : ?>
                        <table class="table" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr style="background-color: #6AB187;">
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Book Title</th>
                                    <th style="border: 1px solid #dddddd; padding: 8px;">Author</th>
                                     <th style="border: 1px solid #dddddd; padding: 8px;">Category</th>
                                      <th style="border: 1px solid #dddddd; padding: 8px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row_result_exchange_request =$result_exchange_request ->fetch_assoc()) : ?>
                                    <tr>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row_result_exchange_request['title']; ?></td>
                                        <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row_result_exchange_request['authors']; ?></td>
                                         <td style="border: 1px solid #dddddd; padding: 8px;"><?php echo $row_result_exchange_request['categoryName']; ?></td>
                                          <td style="border: 1px solid #dddddd; padding: 8px;"><span class="badge badge-primary"><?php echo $row_result_exchange_request['status']; ?></span></td>
                                        
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No exchange activity recorded yet.</p>
                    <?php endif; ?>


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

                               
                                                    
                                                    <div class="text-center">  
                                                 
                                                            <button type="submit" class="btn btn-primary" onclick="location.href='wishABook.php'">Wish a Book</button>
                                                  

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
                                                        <h5 class="mb-0">Shipping Address</h5>
                                                    </div>
                                                    <!-- <div class="card-body">
                                                        <address>3522 Interstate<br> 75 Business Spur,<br> Sault Ste. <br>Marie, MI 49783</address>
                                                        <p>New York</p>
                                                        <a href="#" class="btn-small">Edit</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-6">
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
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Update Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- <p>Already have an account? <a href="page-login-register.php">Log in instead!</a></p> -->
                                                <form method="post" name="enq">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>First Name <span class="required"></span></label>
                                                            <input class="form-control square" name="FName" type="FName" value="<?php echo $firstName; ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Last Name <span class="required"></span></label>
                                                            <input class="form-control square" name="LName" type="LName"value="<?php echo  $lastName; ?>">
                                                        </div>
                                                        <!-- <div class="form-group col-md-12">
                                                            <label>Display Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="dname" type="text">
                                                        </div> -->
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span class="required"></span></label>
                                                            <input  class="form-control square" name="email" type="email" value="<?php echo  $email; ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Current Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="password" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>New Password <span class="required"></span></label>
                                                            <input  class="form-control square" name="npassword" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Confirm Password <span class="required"></span></label>
                                                            <input  class="form-control square" name="cpassword" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Bio <span class="required"></span></label>
                                                            <input  class="form-control square" name="Bio" type="bio" value="<?php echo  $bio; ?>">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Address <span class="required"></span></label>
                                                            <input  class="form-control square" name="address" type="address" value="<?php echo  $address; ?>">
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

    

    <!-- Bootstrap JS (optional) -->
<script> 

    function checkWallet() { 
  
     var walletValue = <?php echo $wallet_value; ?>;

    
        if(walletValue<2){
        
      alert('You do not have enough points in your wallet to request a book!'); 
    }
    else {
        window.location.href = 'index.php'; 
    }
    
     }
 
    var button = document.getElementById('BookRequestButton'); 
    button.addEventListener('click', checkWallet); 
  </script>

</body>
</html>



    <?php
    include 'partials/footer.php';

    mysqli_close($con);
    ?>