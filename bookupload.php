
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    
   <title>BookBridge Online</title>


   <!-- Favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.png">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/main.css?v=3.4">

   <!-- site Favicon -->
   <link rel="icon" href="assets/imgs/theme/favicon.png" sizes="32x32" />
   <link rel="apple-touch-icon" href="assets/imgs/theme/favicon.png" />
   <meta name="msapplication-TileImage" content="assets/imgs/theme/favicon.png" />

   <!-- css Icon Font -->
   <link rel="stylesheet" href="assets2/css/vendor/ecicons.min.css" />

   <!-- css All Plugins Files -->
   <!-- <link rel="stylesheet" href="assets2/css/plugins/animate.css" />
   <link rel="stylesheet" href="assets2/css/plugins/swiper-bundle.min.css" />
   <link rel="stylesheet" href="assets2/css/plugins/jquery-ui.min.css" />
   <link rel="stylesheet" href="assets2/css/plugins/countdownTimer.css" />
   <link rel="stylesheet" href="assets2/css/plugins/slick.min.css" />
   <link rel="stylesheet" href="assets2/css/plugins/nouislider.css" />
   <link rel="stylesheet" href="assets2/css/plugins/bootstrap.css" /> -->

    <!-- For api -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <!-- Main Style -->
   <link rel="stylesheet" href="assets2/css/style.css" />
   <link rel="stylesheet" href="assets2/css/responsive.css" />
   <?php include_once 'bookupload_handler.php';?> 
   <!-- Background css -->
   <link rel="stylesheet" id="bg-switcher-css" href="assets2/css/backgrounds/bg-4.css">
  
</head>
<body class="shop_page">

<?php
    include 'partials/header.php';
    include  'partials/mobile-header.php'
    ?>
  

  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.php" rel="nofollow">Home</a>
                    <span></span> Pages
                    <span></span> Account
                    <span></span> Contribute a book
                </div>
            </div>
        </div>

   <!-- Vendor upload section -->
   <section class="ec-page-content ec-vendor-uploads section-space-p">
       <div class="container">
           <div class="row">
               <!-- Sidebar Area Start -->
              
               <div class="ec-shop-rightside col-lg-9 col-md-12">
                   <div class="ec-vendor-dashboard-card">
                       <div class="ec-vendor-card-body">
                           <div class="row">
                                        
                               <div class="col-lg-8">
                                   <div class="ec-vendor-upload-detail">
                                       <form class="row g-3" method="POST" action="bookupload_handler.php" enctype="multipart/form-data">
                                           <div class="col-md-6">
                                               <label for="inputTitle" class="form-label">Book Title</label>
                                               <input type="text" class="form-control" id="inputTitle"  name="inputtitle">
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputName" class="form-label">Author Name</label>
                                               <input type="text" class="form-control" id="inputName" name="inputname">
                                           </div>
                                          
                                           <div class="col-md-6">
                                               <label  class="form-label">Book Category</label>
                                               <select name="categories" id="Categories" class="form-select">
                                                   
                                                       <option value="Scifi">Science Fiction</option>
                                                       <option value="cookBook">Cook book</option>
                                                       <option value="grafic">Grafic Novel</option>
                                                       <option value="memoir">Memoir</option>
                                                       <option value="academic">Academic</option>
                                                       <option value="fantasy">Fantasy</option>
                                                    
                                                       <option value="mystery">Mystery</option>
                                                       <option value="thriller">Thriller</option>
                                                       <option value="graphicnovel">Graphic novel</option>
                                                       <option value="romance">Romance</option>
                                                       <option value="horror">Horror</option>
                                                   
                                                  

                                                       <option value="adventure">Adventure</option>
                                                       <option value="bio">Biography</option>
                                                   
                                               </select>
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputisbn" class="form-label">ISBN</label>
                                               <input type="text" class="form-control" id="inputisbn" name="inputIsbn">
                                           </div>
                                           
                                           <div class="col-md-6">
                                               <label for="inputlang" class="form-label">Language</label>
                                               <input type="text" class="form-control" id="inputlang" name="inputLang">
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputpage" class="form-label">Page No</label>
                                               <input type="text" class="form-control" id="inputpage" name="inputPage">
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputedition" class="form-label">Edition</label>
                                               <input type="text" class="form-control" id="inputedition" name="inputEdition">
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputPublisher" class="form-label">Publisher</label>
                                               <input type="text" class="form-control" id="inputpublisher" name="inputPublisher">
                                           </div>
                                           <div class="col-md-6">
                                               <label for="inputdate" class="form-label">Publishing Date</label>
                                               <input type="text" class="form-control" id="inputdate" name="inputDate">
                                           </div>
                                          
                                           <div class="col-md-12">
                                               <label class="form-label">Short Description</label>
                                               <textarea class="form-control" rows="2" name="description"></textarea>

                                           </div>
                                          
                                       
                                    

                                           <div class="col-lg-4">
    <div class="ec-vendor-img-upload">
        <!-- Main Cover Image Upload -->
        <div class="avatar-upload">
        <div class="ec-vendor-main-img">
                                           <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' id="mainImageUpload" name="mainImageUpload" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                <label for="mainImageUpload"><img src="assets2/images/icons/edit.svg"
                                                           class="svg_img header_svg" alt="edit" /></label>
            </div>
            <div class="avatar-preview ec-preview">
                <div class="imagePreview ec-div-preview">
                    <img class="ec-image-preview" id="mainImagePreview" src="assets2/images/product-image/vender-upload-preview.jpg" alt="edit" />
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div> 
<div class="col-lg-8" style="margin-bottom: 20px;">
    <!-- Additional Images Upload -->
    <div class="ec-vendor-img-upload" style="border: 1px dashed #ccc; padding: 10px; text-align: center;">
        <label for="additionalImagesUpload" style="cursor: pointer;">
            <strong>Upload Additional Images</strong><br>
            (Multiple images allowed)
        </label>
        <!-- Single file input field for multiple images -->
        <input type="file" id="additionalImagesUpload" name="additionalImagesUpload[]" class="ec-image-upload" accept=".png, .jpg, .jpeg" multiple style="display: none;">
        <div id="additionalImagesPreview" class="avatar-preview ec-preview" style="margin-top: 10px;">
            <!-- Additional images preview will be shown here -->
        </div>
        <div id="imagePaths" style="margin-top: 10px;"></div>
    </div>
</div>



                                           <div class="col-md-12">
                                               <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
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
   </section>

<script>
// Define the Google Books API key
var apiKey = 'AIzaSyA_WqP9b3wEH0Ei7kW2Efh-GBbq2oX_PQk';
// Initialize the autocomplete on the input field
$(function() {
    // Initialize the autocomplete on the input field
    $('#inputTitle').autocomplete({
        source: function(request, response) {
            var apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(request.term)}&key=${apiKey}`;

            // Fetch data from the Google Books API
            $.get(apiUrl, function(data) {
                if (data.items) {
                    // Create an array of suggestions based on book titles
                    var suggestions = data.items.map((item) => ({
                        label: item.volumeInfo.title, // Use the book title as the label
                        value: item.volumeInfo.title, // Also use the book title as the value
                        bookInfo: item.volumeInfo // Store the book information
                    }));
                    response(suggestions);
                } else {
                    response([]);
                }
            }).fail(function() {
                response([]); // Handle API request failure
            });
        },
        minLength: 2, // Minimum number of characters before triggering autocomplete
        select: function(event, ui) {
            // When a book is selected from the autocomplete, populate the form fields
            populateBookFields(ui.item.bookInfo);
        }
    });
});

// Function to populate book fields based on the selected book info
function populateBookFields(bookInfo) {
    if (bookInfo) {
    // Populate the input fields with the book information
    $('#inputTitle').val(bookInfo.title || 'N/A');
    $('#inputName').val(bookInfo.authors ? bookInfo.authors.join(', ') : 'N/A');
    // $('#Categories').val(bookInfo.categories ? bookInfo.categories.join(', ') : 'N/A');
    $('#inputisbn').val(bookInfo.industryIdentifiers ? bookInfo.industryIdentifiers[0].identifier : 'N/A');
    $('#inputdate').val(bookInfo.publishedDate ? bookInfo.publishedDate : 'N/A'); // Changed to Publishing Date
    $('#inputlang').val(getLanguageName(bookInfo.language || ''));

    // Populate the text area with the book description
    $('textarea').val(bookInfo.description || 'N/A');

    // // Set the main book cover image
    // const mainImgSrc = bookInfo.imageLinks ? bookInfo.imageLinks.thumbnail : '';
    // if (mainImgSrc) {
    //     $('.avatar-preview img').attr('src', mainImgSrc);
    //     //.attr('style', 'width: 200px; height: 400px; object-fit: cover;')
    // }

    // Additional fields
    $('#inputpage').val(bookInfo.pageCount || 'N/A');
    $('#inputedition').val(bookInfo.edition || 'N/A');
    $('#inputpublisher').val(bookInfo.publisher || 'N/A');
}

}

// Function to get the full language name from the language code
function getLanguageName(languageCode) {
    const languageNames = {
        'en': 'English',
        'es': 'Spanish',
        'fr': 'French',
        'bn': 'Bangla',
        // Add more language codes and names as needed
    };
    return languageNames[languageCode] || 'N/A';
}
</script>
<!-- Script for google book api, ends here. -->
   <!-- End Vendor upload section -->
   <script>
   $(document).ready(function() {
    $('#additionalImagesUpload').on('change', function() {
        // Get the selected files
        var files = $(this).prop('files');
        var paths = [];
        // Loop through each selected file and get its path
        $.each(files, function(index, file) {
            paths.push(file.name);
        });
        // Display the paths as comma-separated values
        $('#imagePaths').text(paths.join(', '));
    });
});

</script>


   <!-- Vendor JS -->
   <script src="assets2/js/vendor/popper.min.js"></script>
     <script src="assets2/js/vendor/bootstrap.min.js"></script> 
  <script src="assets2/js/vendor/bootstrap-tagsinput.js"></script>
   <script src="assets2/js/vendor/jquery-migrate-3.3.0.min.js"></script>
   <script src="assets2/js/vendor/modernizr-3.11.2.min.js"></script> 
 <script src="assets2/js/vendor/jquery.magnific-popup.min.js"></script>

   <!--Plugins JS-->
   <script src="assets2/js/plugins/swiper-bundle.min.js"></script>
   <script src="assets2/js/plugins/nouislider.js"></script>
   <script src="assets2/js/plugins/countdownTimer.min.js"></script>
   <script src="assets2/js/plugins/scrollup.js"></script>
   <script src="assets2/js/plugins/jquery.zoom.min.js"></script>
   <script src="assets2/js/plugins/slick.min.js"></script>
   <script src="assets2/js/plugins/infiniteslidev2.js"></script>
   <script src="assets2/js/plugins/jquery.sticky-sidebar.js"></script>
  
   <!-- Main Js -->
   <script src="assets2/js/main.js"></script>

</body>
</html>
<?php
    include 'partials/footer.php'
    ?>
