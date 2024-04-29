<?php
require './aside-menu.php';

// Pagination parameters
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;


$search = isset($_GET['search-categories']) ? $_GET['search-categories'] : '';
// Fetch data with pagination
$category_fetch = "SELECT * 
                   FROM category";

if (!empty($search)) {
    $category_fetch .= " WHERE categoryName LIKE '%$search%'";
}

$category_fetch .= " ORDER BY categoryName LIMIT $start, $limit";

$category_fetch_result = $connection->query($category_fetch);
if (!$category_fetch_result) {
    die("Error executing query: " . $connection->error);
}

// Get total number of records for pagination
$total_records_query = "SELECT COUNT(*) AS total FROM category";
if (!empty($search)) {
    $total_records_query .= " WHERE categoryName LIKE '%$search%'";
}
$total_records_result = $connection->query($total_records_query);
$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);
?>
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Categories </h2>
            <p>Add, edit or delete a category</p>
        </div>
        <div style="display: flex; align-items: center; justify-content: center; row-gap: 5px;">
            <form>
                <input type="text" placeholder="Search Categories" class="form-control bg-white" name="search-categories" value="<?= isset($search) ? $search : '' ?>">
            </form>
            <?php if ($search != '') : ?>
                <a href="?reset-search" class="btn btn-primary btn-sm rounded">Reset</a>
            <?php endif; ?>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="./handler/create-category-handler.php" method="post">
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Name</label>
                            <input type="text" placeholder="Type here" class="form-control" id="product_name" name="category-name" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" class="form-control" name="description"></textarea>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" name="create-category">Create category</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>No. Available Books</th>
                                    <th>No. Desired Books</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($category = $category_fetch_result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $category['categoryID'] ?></td>
                                        <td><b><?= $category['categoryName'] ?></b></td>
                                        <td>
                                            <?php
                                            // Query to get the count of distinct book category IDs for the current category ID
                                            $categoryId = $category['categoryID'];
                                            $query = "SELECT COUNT(DISTINCT book.categoryID) AS bookCount 
                                                      FROM global_book_collection
                                                      JOIN book ON global_book_collection.book_id = book.book_id
                                                      WHERE book.categoryID = '$categoryId' AND global_book_collection.availability_status = 'yes'";
                                            $result = $connection->query($query);

                                            if ($result) {
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    echo $row['bookCount'];
                                                } else {
                                                    echo "0";
                                                }
                                            } else {
                                                echo "Error executing the query: " . $connection->error;
                                            }
                                            ?>

                                        </td>
                                        <td><?= $category['numDesiredBooks'] ?></td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit info</a>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div> <!-- dropdown //end -->
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- .col// -->
            </div> <!-- .row // -->
        </div> <!-- card body .// -->
    </div> <!-- card .// -->
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