<?php
require './aside-menu.php';
$request_id = filter_input(INPUT_GET, 'request_id', FILTER_SANITIZE_SPECIAL_CHARS);
$query = "SELECT *
          FROM contribution_request
          WHERE request_id = '$request_id'";
$query_execute = $connection->query($query);
$query_result = $query_execute->fetch_assoc();


$query_book = "SELECT *
               FROM book
               WHERE book_id = {$query_result['book_id']}";
$query_book_result = $connection->query($query_book);
$book_info = $query_book_result->fetch_assoc();
?>
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Contribution Request Detail</h2>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span>
                        <i class="material-icons md-calendar_today"></i> <b>Requested Date: <?= $query_result['date_of_request'] ?></b>
                    </span> <br>
                    <small class="text-muted">Request ID: <?= $query_result['request_id'] ?></small>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <select class="form-select d-inline-block mb-lg-0 mb-15 mw-200">
                        <option>Pending</option>
                        <option>Processing</option>
                        <option>Request to courier</option>
                        <option>Received the book</option>
                        <option>QC in progress</option>
                        <option>Published</option>
                    </select>
                    <a class="btn btn-primary" href="#">Save</a>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Contributor Information</h6>
                            <?php
                            $search_user = "SELECT *
                                            FROM user
                                            WHERE user_id = {$query_result['user_id']}";
                            $search_result = $connection->query($search_user);
                            $user_info = $search_result->fetch_assoc();
                            echo $user_info['f_name'] . " " . $user_info['l_name'] . "<br>" . $user_info['email'] . "<br>" . $user_info['phone_number'];
                            ?>
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-local_shipping"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Address</h6>
                            <p class="mb-1">
                                <?php
                                if (isset($user_info['appartment_num'])) {
                                    echo "Apart num: " . $user_info['appartment_num'] . ",";
                                }
                                if (isset($user_info['street_address'])) {
                                    echo "Street Address: " . $user_info['street_address'] . ",";
                                }
                                if (isset($user_info['postal_code'])) {
                                    echo "Postal code: " . $user_info['postal_code'] . "<br>";
                                }
                                if (isset($user_info['location_id'])) {
                                    $query_for_location = "SELECT * 
                                    FROM location 
                                    WHERE location_id = {$user_info['location_id']}";
                                    $query_execute_location = $connection->query($query_for_location);
                                    $query_result_location = $query_execute_location->fetch_assoc();
                                    echo "District: " . $query_result_location['district'] . "  " . "Division: " . $query_result_location['division'];
                                }
                                ?>
                            </p>
                        </div>
                    </article>
                </div> <!-- col// -->

                <div class="col-lg-4">
                    <label>Notes</label>
                    <textarea class="form-control" name="notes" id="notes" placeholder="Type some note"><?= isset($query_result['notes']) ? $query_result['notes'] : '' ?></textarea>
                </div>
            </div> <!-- row // -->
            <div class="row">
                <div class="col-9">
                    <div class="content-header">
                        <h4 class="content-title">Book Information</h4>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Basic</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-4">
                                    <label for="book_name" class="form-label">Book title</label>
                                    <input type="text" placeholder="Type here" class="form-control" id="book_name" value="<?= $book_info['title'] ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Full description</label>
                                    <textarea placeholder="Type here" class="form-control" rows="4"><?= $book_info['description'] ?></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">ISBN</label>
                                            <div class="row gx-2">
                                                <input type="text" class="form-control" value="<?= $book_info['isbn'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Edition</label>
                                            <input type="text" class="form-control" value="<?= $book_info['edition'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" name="category">
                                            <?php

                                            $query_cat = "SELECT * FROM category";
                                            $query_cat_result = $connection->query($query_cat);
                                            if ($query_cat_result) {
                                                while ($category = $query_cat_result->fetch_assoc()) {
                                                    $selected = ($book_info['categoryID'] == $category['categoryID']) ? 'selected' : '';
                                                    echo '<option value="' . $category['categoryID'] . '" ' . $selected . '>' . $category['categoryName'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Number of pages</label>
                                            <div class="row gx-2">
                                                <input value="<?= $book_info['num_of_pages'] ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">language</label>
                                            <input value="<?= $book_info['language'] ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Publisher</label>
                                            <input value="<?= $book_info['publisher'] ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Book Condition</label>
                                    <select class="form-select" name="book-condition">
                                        <option>Select Condition</option>
                                        <option> Like New </option>
                                        <option> Good </option>
                                        <option> Acceptable </option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div> <!-- card end// -->
                </div>
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Media</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-upload">
                                <img src="assets/imgs/theme/upload.svg" alt="">
                                <input class="form-control" type="file">
                            </div>
                        </div>
                    </div> <!-- card end// -->

                </div>
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->


<section class="content-main">

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