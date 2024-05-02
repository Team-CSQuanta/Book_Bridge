
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
    <?php include_once 'login_register_handler.php'; ?>
</head>

<body>
<?php
    include 'partials/header.php';
    include  'partials/mobile-header.php'
    ?>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="page-account.php" rel="nofollow">Home</a>
                    <span></span> Pages
                    <span></span> Login / Register
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <!-- <div class="row"> -->
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Login</h3>
                                        </div>
                                        <form method="post" >
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Your Email ">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1" value="">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="forgot-password.php">Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Create an Account</h3>
                                        </div>
                                        <p class="mb-50 font-sm">
                                            Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy
                                        </p>

                                    

                                        <form id="registerForm" method="post" action="login_register_handler.php" enctype="multipart/form-data">
                                            <!-- <div class="form-group">
                                                <input type="text" required="" name="username" placeholder="Username">
                                            </div> -->
                                        
                                            
                                            <div class="form-group">
                                                <input type="text" required="" name="firstName" placeholder="First Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="lastName" placeholder="Last Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="phoneNumber" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="streetAddress" placeholder="Street Address">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="apartmentNo" placeholder="Apartment">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="postalCode" placeholder="Postal Code">
                                            </div>
                                             <div class="form-group">
                                                <input type="text" required="" name="distDiv" placeholder="Enter district,division">
                                            </div>
                                               
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="bio" placeholder="Bio">
                                        
                                            </div>
                                            
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Confirm password">
                                            </div>
                                            <div class="form-group">
                                           
                                           <input type="file" class="form-control-file" id="profileImage" name="profileImage">
                                              </div> 
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                   
                                                  </div>
                                                </div>
                                                <a href="page-privacy-policy.php"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" id="submitButton" name="register">Submit &amp; Register</button>
                                            </div>
                                        </form>

                                        <div class="divider-text-center mt-15 mb-15">
                                            <span> or</span>
                                        </div>
                                        <ul class="btn-login list_none text-center mb-15">
                                           
                                            <li><a href="#" class="btn btn-google hover-up">Login With Google</a></li>
                                        </ul>
                                        <div class="text-muted text-center">Already have an account? <a href="#">Sign in now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the form element
            var form = document.getElementById("registerForm");

            // Add submit event listener to the form
            form.addEventListener("submit", function(event) {
                // Select the checkbox element
                var checkBox = document.getElementById("exampleCheckbox12");

                // Check if it is checked
                if (!checkBox.checked) {
                    // Checkbox is not checked, show an alert
                    alert("Please agree to the terms & policy.");
                    // Prevent form submission
                    event.preventDefault();
                }
            });
        });
    </script>
    <?php
    include 'partials/footer.php'
    ?>
