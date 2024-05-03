<?php
require './aside-menu.php';
$club_id = filter_var($_GET['club_id'], FILTER_SANITIZE_NUMBER_INT);
$query =  "SELECT * 
           FROM bibliophile_club
           WHERE club_id = '$club_id'";
$result = $connection->query($query);
$club_assoc = $result->fetch_assoc();


$managerID =  $club_assoc['club_manager_id'];
$club_manager_info_query = "SELECT *
                                        FROM bibliophile_club_admin
                                        WHERE club_admin_id = '$managerID'";
$club_manager_info_result = $connection->query($club_manager_info_query);
$club_manager_info = $club_manager_info_result->fetch_assoc();




// Pagination parameters
$limit = 1;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;



// Fetch data with pagination
$fetch_collected_books = "SELECT * 
                          FROM global_book_collection NATURAL JOIN book
                          WHERE club_id ='$club_id'";


$fetch_collected_books .= " ORDER BY book.title LIMIT $start, $limit";

$fetch_collected_books_result = $connection->query($fetch_collected_books);
if (!$fetch_collected_books_result) {
    die("Error executing query: " . $connection->error);
}

// Get total number of records for pagination
$total_records_query = "SELECT COUNT(*) as total
                        FROM global_book_collection NATURAL JOIN book
                        WHERE club_id ='$club_id'";

$total_records_result = $connection->query($total_records_query);
$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);

?>
<section class="content-main">
    <div class="content-header">
        <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
    </div>
    <div class="card mb-4">
        <div class="card-header bg-primary" style="height:150px; background-color: #D0F3EC;
                                                   opacity: 0.8; background-image:  linear-gradient(135deg, #1D6963 25%, transparent 25%),
                                                   linear-gradient(225deg, #1D6963 25%, transparent 25%), linear-gradient(45deg, #1D6963 25%, transparent 25%),
                                                   linear-gradient(315deg, #1D6963 25%, #D0F3EC 25%);background-position:  10px 0, 10px 0, 0 0, 0 0;
                                                   background-size: 20px 20px;
                                                   background-repeat: repeat;">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                    <div class="img-thumbnail w-100  position-relative text-center" style="height:190px; width:200px; margin-top:-120px">
                        <img class="img-lg mb-3 img-avatar" id="previewImage" src="<?= './assets/imgs/club/' . $club_assoc['club_img'] ?>" alt="Club Photo">
                    </div>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <h3><?= $club_assoc['club_name'] ?></h3>
                    <p>
                        <?php

                        if ($club_manager_info_result->num_rows == 1) {
                            echo  "<span class='badge rounded-pill alert-success'>" . $club_manager_info['f_name'] . " " . $club_manager_info['l_name'] . "</span>";
                        } else {
                            echo "<span class='badge rounded-pill alert-danger'>No one assigned</span>";
                        }

                        ?>
                    </p>
                    <p><?= $club_assoc['club_description'] ?></p>
                </div> <!--  col.// -->
                <div class="col-xl-4 text-md-end">
                    <select class="form-select w-auto d-inline-block">
                        <option>Actions</option>
                        <option>Disable shop</option>
                        <option>Analyze</option>
                        <option>Something</option>
                    </select>
                    <a href="#" class="btn btn-primary"> View live <i class="material-icons md-launch"></i> </a>
                </div> <!--  col.// -->
            </div> <!-- card-body.// -->
            <hr class="my-4">
            <div class="row g-4">
                <div class="col-md-12 col-lg-4 col-xl-2">
                    <article class="box">
                        <p class="mb-0 text-muted">Total Collected Books:</p>
                        <h5 class="text-success">
                            <?php
                            $count_book_query = "SELECT COUNT(collection_id) as total_books
                                                 FROM global_book_collection
                                                 WHERE club_id = '$club_id'";
                            $count_book_resutl = $connection->query($count_book_query);
                            $count_book = $count_book_resutl->fetch_assoc();
                            if (isset($count_book['total_books'])) {
                                echo ($count_book['total_books']);
                            } else {
                                echo 0;
                            }
                            ?>

                        </h5>
                        <!-- <p class="mb-0 text-muted">Revenue:</p>
                        <h5 class="text-success mb-0">$2380</h5> -->
                    </article>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Contacts</h6>
                    <p>
                        <?php
                        if ($club_manager_info) {
                            echo "Manager : " . $club_manager_info['f_name'] . " " . $club_manager_info['l_name'] . "<br>";
                            echo "Email : " . $club_manager_info['email'] . "<br>";
                            echo "Phone : " . $club_manager_info['phone_number'];
                        } else {
                            echo "No one assigned to this club!";
                        }
                        ?>
                    </p>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Address</h6>
                    <p>
                        <?= $club_assoc['address_line'] ?> <br>
                        District : <?= $club_assoc['district'] ?>
                    </p>
                </div> <!--  col.// -->
            </div> <!--  row.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Book Collection</h5>
            <div class="row">

                <?php while ($books = $fetch_collected_books_result->fetch_assoc()) : ?>
                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="../uploadedBooks<?= $books['cover_img'] ?>" alt="Book"> </a>
                            <div class="info-wrap">
                                <a href="#" class="title"><?= $books['title'] ?></a>
                                <div class="price mt-1"><?= "Collected date: " . $books['date_added'] ?></div> <!-- price-wrap.// -->
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>

            </div> <!-- row.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item"><a class="page-link" href="?club_id=<?= $club_id ?>&page=<?= ($page - 1 > 0) ? $page - 1 : $page ?>"><i class="material-icons md-chevron_left"></i></a></li>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="?club_id=<?= $club_id ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item"><a class="page-link" href="?club_id=<?= $club_id ?>&page=<?= ($page + 1 <= $total_pages) ? $page + 1 : $page ?>"><i class="material-icons md-chevron_right"></i></a></li>


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