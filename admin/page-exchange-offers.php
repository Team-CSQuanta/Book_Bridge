<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './aside-menu.php';
$categoryQuery = "SELECT *
                  FROM category";
$categoryResult = $connection->query($categoryQuery);

if(isset($_GET['collection_id']) and isset($_GET['book_id'])){
    $collection_id = mysqli_real_escape_string($connection, $_GET['collection_id']);
    $book_id = mysqli_real_escape_string($connection, $_GET['book_id']);
    $deleteQuery = "DELETE FROM global_book_collection
                    WHERE collection_id = '$collection_id';";
    $connection->query($deleteQuery);
    $deleteBookQuery = "DELETE FROM book
                        WHERE book_id = '$book_id';";
    $connection->query($deleteBookQuery);
}
// Pagination
$limit = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;

// Search and category filtering
$search = isset($_GET['search-exchange-offers']) ? $_GET['search-exchange-offers'] : '';
$category_search = isset($_GET['category-name']) ? $_GET['category-name'] : '';

$search = urldecode($search);
$category_search = urldecode($category_search);

$exchange_offers_fetch = "SELECT gbc.*, b.*, c.*
                          FROM global_book_collection AS gbc
                          JOIN book AS b ON gbc.book_id = b.book_id
                          JOIN category AS c ON b.categoryID = c.categoryID 
                          WHERE gbc.availability_status = 'yes' ";
if($_SESSION['user-logged-role'] == "club-manager"){
    // get club id 
    $query_for_club_id = "SELECT club_id
                          FROM bibliophile_club
                          WHERE club_manager_id = {$_SESSION['user-logged-id']}";
    $club_id_result = $connection->query($query_for_club_id);
    $club_id_assoc = $club_id_result->fetch_assoc();
    $club_id = $club_id_assoc['club_id'];
    $exchange_offers_fetch .= " AND club_id = '$club_id' ";
}

if (!empty($search)) {
    $exchange_offers_fetch .= " AND (b.title LIKE '%$search%' OR b.isbn LIKE '%$search%' OR b.authors LIKE '%$search%')";
}
if (!empty($category_search) && $category_search !== 'All category') {
    $exchange_offers_fetch .= " AND c.categoryName = '$category_search'";
}

$exchange_offers_fetch .= " ORDER BY b.title LIMIT $start, $limit";

$exchange_offers_fetch_result = $connection->query($exchange_offers_fetch);
if (!$exchange_offers_fetch_result) {
    die("Error executing query: " . $connection->error);
}

$total_records_query = "SELECT COUNT(*) AS total
                        FROM global_book_collection AS gbc
                        JOIN book AS b ON gbc.book_id = b.book_id
                        JOIN category AS c ON b.categoryID = c.categoryID 
                        WHERE gbc.availability_status = 'yes' ";
if (!empty($search)) {
    $total_records_query .= " AND (b.title LIKE '%$search%' OR b.isbn LIKE '%$search%' OR b.authors LIKE '%$search%')";
}
if($_SESSION['user-logged-role'] == "club-manager"){
    // get club id 
    $query_for_club_id = "SELECT club_id
                          FROM bibliophile_club
                          WHERE club_manager_id = {$_SESSION['user-logged-id']}";
    $club_id_result = $connection->query($query_for_club_id);
    $club_id_assoc = $club_id_result->fetch_assoc();
    $club_id = $club_id_assoc['club_id'];
    $total_records_query .= " AND club_id = '$club_id' ";
}
if (!empty($category_search) && $category_search !== 'All category') {
    $total_records_query .= " AND c.categoryID = '$category_search'";
}

$total_records_result = $connection->query($total_records_query);
if (!$total_records_result) {
    die("Error executing total records query: " . $connection->error);
}

$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);

?>


<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Exchange offers</h2>
            <p>Plaforms Available Offers</p>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">

                <div class="col-lg-4 col-md-6 me-auto">
                    <form id="search-form" action="" method="GET" onsubmit="submitForms(); return false;">
                        <input type="text" placeholder="Search using title, isbn, authors...." class="form-control" name="search-exchange-offers" value="<?=isset($search) ? $search: ''?>">
                    </form>
                </div>

                <div class="col-lg-2 col-6 col-md-3">
                    <form id="category-form" action="" method="GET" onchange="submitForms()">
                        <select class="form-select" name="category-name">
                            <option>All category</option>
                            <?php while ($category = $categoryResult->fetch_assoc()) : ?>
                                <option><?= $category['categoryName'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </form>
                </div>

                <script>
                    function submitForms() {
                        var searchValue = document.getElementById('search-form').elements['search-exchange-offers'].value;
                        var categoryValue = document.getElementById('category-form').elements['category-name'].value;
                        var queryString = '?search-exchange-offers=' + encodeURIComponent(searchValue) + '&category-name=' + encodeURIComponent(categoryValue);
                        window.location.href = window.location.pathname + queryString;
                    }
                </script>

            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                <?php while ($exchange_offer = $exchange_offers_fetch_result->fetch_assoc()) : ?>
                    <div class="col">
                        <div class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="../uploadedBooks/<?=$exchange_offer['cover_img']?>" alt="Offers"> </a>
                            <div class="info-wrap">
                                <a href="#" class="title text-truncate"><?=$exchange_offer['title']?></a>
                                <div class="price mb-2"><?= $exchange_offer['book_condition']?></div> <!-- price.// -->
                                
                                <a href="?collection_id=<?= $exchange_offer['collection_id']?>&book_id=<?=$exchange_offer['book_id']?>" class="btn btn-sm font-sm btn-light rounded">
                                    <i class="material-icons md-delete_forever"></i> Delete
                                </a>
                            </div>
                        </div> <!-- card-product  end// -->
                    </div> <!-- col.// -->
                <?php endwhile; ?>

            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item"><a class="page-link" href="?page=<?= ($page - 1 > 0) ? $page - 1 : $page ?>"><i class="material-icons md-chevron_left"></i></a></li>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item"><a class="page-link" href="?page=<?= ($page + 1 <= $total_pages) ? $page + 1 : $page ?>"><i class="material-icons md-chevron_right"></i></a></li>


            </ul>
        </nav>
    </div>
</section>

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