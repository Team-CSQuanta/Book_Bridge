
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Application for creating Litera Hub</title>
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
    <?php include_once 'ReqToSetUpLiteraHub_Handler.php'; ?>
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
                    <a href="index.php" rel="nofollow">Home</a>
                    <span></span> Others
                    <span></span> Apply for Litera Hub
                </div>
            </div>
        </div>
                            <section class="pt-50 pb-50">
            
                                   <div class="ec-vendor-upload-detail">
                                   <div class="heading_s1" style="padding-left: 50px; padding-right: 50px;">
                                            <h3 class="mb-30">Apply for Litera Hub</h3>
                                        </div>
                                        <p class="mb-50 font-sm" style="padding-left: 100px; padding-right: 100px;">
                                               <span style="color: red;">*</span>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.
                                        </p>

                                    
                                       <form class="row g-3" style="padding-left: 200px; padding-right: 200px;"  method="post" action="ReqToSetUpLiteraHub_Handler.php">
                                           <div class="col-md-6">
                                               <label for="inputName" class="form-label">Name and Surname <span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputName" name="fullName" placeholder="Your Full Name..." required>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputEmail" class="form-label">Contact Email <span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Enter Your profile email..." required>
                                           </div>
                                           
                                           <div class="col-md-6">
                                               <label for="inputCountry" class="form-label">Country <span style="color: red;">*</span></label>
                                               <select class="form-select form-select-lg" id="inputCountry" name="country" required>
                                                      <option value="">Select a country...</option>
                                                      <option value="Bangladesh">Bangladesh</option>
          
                                                </select>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputDis" class="form-label">District<span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputDis" name="district" placeholder="" required>
                                           </div>

                                           <div class="col-md-6">
                                               <label for="inputCity" class="form-label">City/ Upazila/ Thana<span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputCity" name="upazila"   placeholder="" required>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputVillage" class="form-label">Village/ Area<span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputVillage" name="village" placeholder="" required>
                                           </div>
                                        
                                           <div class="col-md-6">
                                               <label for="inputMobile" class="form-label">Phone Number<span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputMobile" name="phoneNum1" placeholder="" required>
                                           </div>
                                        
                                           <div class="col-md-6">
                                               <label for="inputVillage" class="form-label">Additional phone number</label>
                                               <input type="text" class="form-control" id="inputVillage" name="phoneNum2" placeholder="" >
                                           </div>
                                        
                                          
                               
                                           <div class="col-md-12">
                                               <label class="form-label">Your Comment <span style="color: red;">*</span></label>
                                               <textarea class="form-control form-control-lg" id="InputComment" name="comment" placeholder="Write the reason for your application..." style="height: 100px; font-size: 15px; vertical-align: top;" ></textarea>

                                           </div>
                                          
                                       

                                           <div class="col-md-12 text-center">
                                               <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                                           </div>
                                       </form>
                                   </div>
                               </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include 'partials/footer.php'
    ?>
