<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './aside-menu.php';


// Pagination parameters
$limit = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;


$search = isset($_GET['search-exchange-request']) ? $connection->real_escape_string($_GET['search-exchange-request']) : '';


$exchange_fetch = "SELECT er.*, u.*, er.status AS er_status
               FROM exchange_request AS er 
               JOIN user AS u ON er.user_id = u.user_id
               WHERE er.status = 'pending' AND er.processed_by IS NULL AND  u.location_id = {$_SESSION['user-location-id']} ";


if (!empty($search)) {
    $searchCondition = "%" . $search . "%";
    $exchange_fetch .= " AND (u.f_name LIKE '$searchCondition' OR u.l_name LIKE '$searchCondition' OR u.email LIKE '$searchCondition')";
}

$exchange_fetch .= " ORDER BY er.date_of_request DESC LIMIT $start, $limit";


$exchange_fetch_result = $connection->query($exchange_fetch);
if (!$exchange_fetch_result) {
    die("Error executing query: " . $connection->error);
}


$total_records_query = "SELECT COUNT(*) AS total 
                        FROM exchange_request AS er 
                        JOIN user AS u ON er.user_id = u.user_id
                        WHERE er.status = 'pending' AND er.processed_by IS NULL AND  u.location_id = {$_SESSION['user-location-id']} ";


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


// $requester_email = "";
// // Retrieve requester's email
// $query_requester_email = "SELECT user.email
//                           FROM user
//                           JOIN exchange_request ON user.user_id = exchange_request.user_id
//                           WHERE exchange_request.request_id = '$request_id'";
// $query_requester_result = $connection->query($query_requester_email);
// if ($query_requester_result) {
//     $requester_row = $query_requester_result->fetch_assoc();
//     $requester_email = $requester_row['email'];
    
// }

if (isset($_GET['exchange_id'])) {
    $exchange_id = filter_input(INPUT_GET, 'exchange_id', FILTER_SANITIZE_NUMBER_INT);
    $query_for_update = "UPDATE exchange_request
                        set processed_by = {$_SESSION['user-logged-id']} , status = 'Processing'
                        WHERE exchange_id = {$exchange_id}";
    // Execute the query
    if ($connection->query($query_for_update) === TRUE) {
        //  handleStatusChange( $requester_email , 'Processing');
        echo "<script>window.location.href = 'http://localhost/Book_Bridge/admin/page-exchange-request.php';</script>";
        exit();
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connection->error;
    }
}

?>

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Exchange Request list</h2>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <form action="">
                        <input type="text" placeholder="Search..." class="form-control" name="search-exchange-request" value="<?= isset($search) ? $search : '' ?>">
                    </form>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Exchange Request ID</th>
                            <th>Requested User</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($exchange = $exchange_fetch_result->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $exchange['exchange_id'] ?></td>
                                <td><?= $exchange['f_name'] . $exchange['l_name'] ?></td>
                                <td><?= $exchange['email'] ?></td>
                                <td>
                                    <?php
                                    if (isset($exchange['appartment_num'])) {
                                        echo "Apart num: " . $exchange['appartment_num'] . ",";
                                    }
                                    if (isset($exchange['street_address'])) {
                                        echo "Street Address: " . $exchange['street_address'] . ",";
                                    }
                                    if (isset($exchange['postal_code'])) {
                                        echo "Postal code: " . $exchange['postal_code'] . "<br>";
                                    }
                                    if (isset($exchange['location_id'])) {
                                        $query_for_location = "SELECT * 
                                        FROM location 
                                        WHERE location_id = {$exchange['location_id']}";
                                        $query_execute = $connection->query($query_for_location);
                                        $query_result = $query_execute->fetch_assoc();
                                        echo "District: " . $query_result['district'] . "  " . "Division: " . $query_result['division'];
                                    }
                                    ?>
                                </td>
                                <td><?= $exchange['date_of_request'] ?></td>

                                <td><span class="badge rounded-pill alert-danger"><?= $exchange['er_status'] ?></span></td>
                                <td class="text-end">
                                    <a href="?exchange_id=<?= $exchange['exchange_id'] ?>" class="btn btn-sm btn-brand rounded font-sm mt-15">Accept</a>
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