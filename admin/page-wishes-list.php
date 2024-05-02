<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './aside-menu.php';
$categoryQuery = "SELECT *
                  FROM category";
$categoryResult = $connection->query($categoryQuery);

if (isset($_GET['book_wishes_id']) and isset($_GET['book_id'])) {
    $book_wishes_id = mysqli_real_escape_string($connection, $_GET['book_wishes_id']);
    $book_id = mysqli_real_escape_string($connection, $_GET['book_id']);
    // user count for a book
    $count_query = "SELECT COUNT(DISTINCT user_id) as total
                    FROM users_wishes
                    where book_wishes_id = '$book_wishes_id'";
    $count_result = $connection->query($count_query);
    $count_assoc = $count_result->fetch_assoc();

    // delete from wishes_list
    $deleteQuery = "DELETE FROM wishes_list
                    WHERE book_wishes_id = '$book_wishes_id';";
    $connection->query($deleteQuery);
    if ($count_result->num_rows == 1) {
        $deleteBookQuery = "DELETE FROM book
                            WHERE book_id = '$book_id';";
        $connection->query($deleteBookQuery);
    }
}
// Pagination
$limit = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;

// Search and category filtering
$search = isset($_GET['search-wishes']) ? $_GET['search-wishes'] : '';
$category_search = isset($_GET['category-name']) ? $_GET['category-name'] : '';

$search = urldecode($search);
$category_search = urldecode($category_search);

$wishes_book_fetch = "SELECT wl.*, b.*, c.*
                      FROM wishes_list AS wl
                      NATURAL JOIN book AS b
                      NATURAL JOIN category AS c";


if (!empty($search)) {
    $wishes_book_fetch .= " WHERE (b.title LIKE '%$search%' OR b.isbn LIKE '%$search%' OR b.authors LIKE '%$search%')";
    if (!empty($category_search) && $category_search !== 'All category') {
        $wishes_book_fetch .= " AND c.categoryName = '$category_search' ";
    }
} else if (!empty($category_search) &&  $category_search !== 'All category') {
    $wishes_book_fetch .= " WHERE c.categoryName = '$category_search' ";
}

$wishes_book_fetch .= " ORDER BY b.title LIMIT $start, $limit";

$wishes_book_fetch_result = $connection->query($wishes_book_fetch);
if (!$wishes_book_fetch_result) {
    die("Error executing query: " . $connection->error);
}

$total_records_query = "SELECT COUNT(*) AS total
                        FROM wishes_list AS wl
                        NATURAL JOIN book AS b
                        NATURAL JOIN category AS c";
if (!empty($search)) {
    $total_records_query .= " WHERE (b.title LIKE '%$search%' OR b.isbn LIKE '%$search%' OR b.authors LIKE '%$search%')";
    if (!empty($category_search) && $category_search !== 'All category') {
        $total_records_query .= " AND c.categoryName = '$category_search' ";
    }
} else if (!empty($category_search) &&  $category_search !== 'All category') {
    $total_records_query .= " WHERE c.categoryName = '$category_search' ";
}

$total_records_result = $connection->query($total_records_query);
if (!$total_records_result) {
    die("Error executing total records query: " . $connection->error);
}

$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);
?>

<?php if ($_SESSION['user-logged-role'] == "admin") : ?>
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Book wishes</h2>
                <p>Plaforms Available Offers</p>
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row gx-3">

                    <div class="col-lg-4 col-md-6 me-auto">
                        <form id="search-form" action="" method="GET" onsubmit="submitForms(); return false;">
                            <input type="text" placeholder="Search...." class="form-control" name="search-wishes" value="<?= isset($search) ? $search : '' ?>">
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
                            var searchValue = document.getElementById('search-form').elements['search-wishes'].value;
                            var categoryValue = document.getElementById('category-form').elements['category-name'].value;
                            var queryString = '?search-wishes=' + encodeURIComponent(searchValue) + '&category-name=' + encodeURIComponent(categoryValue);
                            window.location.href = window.location.pathname + queryString;
                        }
                    </script>

                </div>
            </header> <!-- card-header end// -->
            <div class="card-body">
                <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                    <?php while ($book_wishes = $wishes_book_fetch_result->fetch_assoc()) : ?>
                        <div class="col">
                            <div class="card card-product-grid">
                                <a href="#" class="img-wrap"> <img src="../uploadedBooks/<?= $book_wishes['cover_img'] ?>" alt="Offers"> </a>
                                <div class="info-wrap">
                                    <a href="#" class="title text-truncate"><?= $book_wishes['title'] ?></a>
                                    <div class="price mb-2"><?php
                                                            $wishers_count_query = "SELECT COUNT(DISTINCT user_id) as total
                                                                                FROM users_wishes
                                                                                WHERE book_wishes_id = {$book_wishes['book_wishes_id']}";
                                                            $wishers_count_result = $connection->query($wishers_count_query);
                                                            $wishes_count_assoc = $wishers_count_result->fetch_assoc();
                                                            if ($wishes_count_assoc['total'] !== null) {
                                                                echo    "<span class='badge rounded-pill alert-success'>", "Total : " . $wishes_count_assoc['total'] . "</span>";
                                                            } else {
                                                                echo "<span class='badge rounded-pill alert-danger'>" . 0 . "</span>";;
                                                            }
                                                            ?>

                                    </div>
                                    <a href="?book_wishes_id=<?= $book_wishes['book_wishes_id'] ?>&book_id=<?= $book_wishes['book_id'] ?>" class="btn btn-sm font-sm btn-light rounded">
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
<?php else : ?>
    <section class="content-main">
        <div class="row mt-60">
            <div class="col-sm-12">
                <div class="w-50 mx-auto text-center">
                    <img src="assets/imgs/theme/404.png" width="350" alt="Page Not Found">
                    <h3 class="mt-40 mb-15">Oops! Page not found</h3>
                    <p>It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. Here's a little tip that might help you get back on track.</p>
                    <a href="index.php" class="btn btn-primary mt-4"><i class="material-icons md-keyboard_return"></i> Back to main</a>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

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