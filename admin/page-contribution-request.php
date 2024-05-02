<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './aside-menu.php';

// Pagination parameters
$limit = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;


$search = isset($_GET['search-contribution-request']) ? $connection->real_escape_string($_GET['search-contribution-request']) : '';


$contribution_fetch = "SELECT cr.*, u.*, cr.status AS cr_status
               FROM contribution_request AS cr 
               JOIN user AS u ON cr.user_id = u.user_id
               WHERE cr.status = 'pending' ";


if (!empty($search)) {
    $searchCondition = "%" . $search . "%";
    $contribution_fetch .= " AND (u.f_name LIKE '$searchCondition' OR u.l_name LIKE '$searchCondition' OR u.email LIKE '$searchCondition')";
}

$contribution_fetch .= " ORDER BY cr.date_of_request DESC LIMIT $start, $limit";


$contribution_fetch_result = $connection->query($contribution_fetch);
if (!$contribution_fetch_result) {
    die("Error executing query: " . $connection->error);
}


$total_records_query = "SELECT COUNT(*) AS total 
                        FROM contribution_request AS cr 
                        JOIN user AS u ON cr.user_id = u.user_id
                        WHERE cr.status = 'pending' ";


if (!empty($search)) {
    $total_records_query .= " AND (u.f_name LIKE '$searchCondition' OR u.l_name LIKE '$searchCondition' OR u.email LIKE '$searchCondition')";
}


$total_records_result = $connection->query($total_records_query);
if (!$total_records_result) {
    die("Error executing query: " . $connection->error);
}


$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];


$total_pages = ceil($total_records / $limit);
?>

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Contribution Request list</h2>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <form action="">
                        <input type="text" placeholder="Search..." class="form-control" name="search-contribution-request" value="<?= isset($search) ? $search : '' ?>">
                    </form>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Requested User</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($contribution = $contribution_fetch_result->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $contribution['request_id'] ?></td>
                                <td><?= $contribution['f_name'] . $contribution['l_name'] ?></td>
                                <td><?= $contribution['email'] ?></td>
                                <td>
                                    <?php
                                    if (isset($contribution['appartment_num'])) {
                                        echo "Apart num: " . $contribution['appartment_num'] . ",";
                                    }
                                    if (isset($contribution['street_address'])) {
                                        echo "Street Address: " . $contribution['street_address'] . ",";
                                    }
                                    if (isset($contribution['postal_code'])) {
                                        echo "Postal code: " . $contribution['postal_code'] . "<br>";
                                    }
                                    if (isset($contribution['location_id'])) {
                                        $query_for_location = "SELECT * 
                                        FROM location 
                                        WHERE location_id = {$contribution['location_id']}";
                                        $query_execute = $connection->query($query_for_location);
                                        $query_result = $query_execute->fetch_assoc();
                                        echo "District: " . $query_result['district'] . "  " . "Division: " . $query_result['division'];
                                    }
                                    ?>
                                </td>
                                <td><?=$contribution['date_of_request'] ?></td>

                                <td><span class="badge rounded-pill alert-danger"><?= $contribution['cr_status'] ?></span></td>
                                <td class="text-end">
                                    <a href="page-user-detail.php?user_id=<?= $contribution['request_id'] ?>" class="btn btn-sm btn-brand rounded font-sm mt-15">Accept</a>
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