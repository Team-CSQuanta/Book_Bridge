
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
    <?php include_once 'login_register_handler.php'; ?>
</head>

<body>
<?php
    include 'partials/header.php';
    include  'partials/mobile-header.php'
    ?>
    <main class="main">

                            <section class="pt-50 pb-50">
            
                                   <div class="ec-vendor-upload-detail">
                                       <form class="row g-3" style="padding-left: 50px; padding-right: 50px;">
                                           <div class="col-md-6">
                                               <label for="inputName" class="form-label">Name and Surname <span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputName" placeholder="Your Full Name..." required>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputEmail" class="form-label">Contact Email <span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputEmail" placeholder="Enter Your profile email..." required>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputAddress1" class="form-label"> Address line 1 <span style="color: red;">*</span></label>
                                               <textarea class="form-control form-control-lg" id="inputAddress1" placeholder="" style="height: 100px; font-size: 18px; vertical-align: top;" required></textarea>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputAddress2" class="form-label">Address Line 2 <span style="color: red;">*</span></label>
                                               <textarea class="form-control form-control-lg" id="inputAddress2" placeholder="" style="height: 100px; font-size: 18px; vertical-align: top;" ></textarea>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputCountry" class="form-label">Country <span style="color: red;">*</span></label>
                                               <select class="form-select form-select-lg" id="inputCountry" required>
                                                      <option value="">Select a country...</option>
                                                      <option value="Bangladesh">Bangladesh</option>
          
                                                </select>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputDis" class="form-label">District<span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputDis" placeholder="" required>
                                           </div>

                                           <div class="col-md-6">
                                               <label for="inputCity" class="form-label">City/ Upazila/ Thana<span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputCity" placeholder="" required>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputVillage" class="form-label">Village/ Area<span style="color: red;">*</span></label>
                                               <input type="text" class="form-control" id="inputVillage" placeholder="" required>
                                           </div>
                                        
                                          
                               
                                           <div class="col-md-12">
                                               <label class="form-label">Your Comment <span style="color: red;">*</span></label>
                                               <textarea class="form-control form-control-lg" id="InputComment" placeholder="Write the reason for your application..." style="height: 100px; font-size: 15px; vertical-align: top;" ></textarea>

                                           </div>
                                          
                                       

                                           <div class="col-md-12">
                                               <button type="submit" class="btn btn-primary">Submit</button>
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
