<?php
require './aside-menu.php';
// Pagination parameters
$limit = 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;


$search = isset($_GET['search-user']) ? $_GET['search-user'] : '';
// Fetch data with pagination
$user_fetch = "SELECT * 
                FROM user";

if (!empty($search)) {
    $user_fetch .= " WHERE f_name LIKE '%$search%' or l_name LIKE '%$search%' or email LIKE '%$search%'";
}

$user_fetch .= " ORDER BY f_name LIMIT $start, $limit";

$user_fetch_result = $connection->query($user_fetch);
if (!$user_fetch_result) {
    die("Error executing query: " . $connection->error);
}

// Get total number of records for pagination
$total_records_query = "SELECT COUNT(*) AS total FROM user";
if (!empty($search)) {
    $total_records_query .= " WHERE f_name LIKE '%$search%' or l_name LIKE '%$search%' or email LIKE '%$search%'";
}
$total_records_result = $connection->query($total_records_query);
$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);

?>
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Users list</h2>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <form action="">
                        <input type="text" placeholder="Search..." class="form-control" name="search-user" value="<?= isset($search) ? $search : '' ?>">
                    </form>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user = $user_fetch_result->fetch_assoc()) : ?>
                            <tr>
                                <td width="40%">
                                    <a href="page-user-detail.php?user_id=<?= $user['user_id'] ?>" class="itemside">
                                        <div class="left">
                                            <img src="../assets/imgs/people/<?= $user['profile_img'] ?>" class="img-sm img-avatar" alt="Userpic">
                                        </div>
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title"><?= $user['f_name'] . " " . $user['l_name'] ?></h6>
                                            <small class="text-muted">User ID: #<?= $user['user_id'] ?></small>
                                        </div>
                                    </a>
                                </td>
                                <td><?= $user['email'] ?></td>
                                <td><span class="badge rounded-pill <?= ($user['status'] === 'Active') ? 'alert-success' : 'alert-danger' ?>"><?= $user['status'] ?></span></td>
                                <td><?= $user['reg_date'] ?></td>
                                <td class="text-end">
                                    <a href="page-user-detail.php?user_id=<?= $user['user_id'] ?>" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                </td>
                            </tr>
                        <?php endwhile ?>

                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>
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