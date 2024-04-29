<?php
require './aside-menu.php';
// Pagination parameters
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;


$search = isset($_GET['search-club']) ? $_GET['search-club'] : '';
// Fetch data with pagination
$club_fetch = "SELECT * 
                FROM bibliophile_club";

if (!empty($search)) {
    $club_fetch .= " WHERE club_name LIKE '%$search%' or district LIKE '%$search%'";
}

$club_fetch .= " ORDER BY club_name LIMIT $start, $limit";

$club_fetch_result = $connection->query($club_fetch);
if (!$club_fetch_result) {
    die("Error executing query: " . $connection->error);
}

// Get total number of records for pagination
$total_records_query = "SELECT COUNT(*) AS total FROM bibliophile_club";
if (!empty($search)) {
    $total_records_query .= " WHERE club_name LIKE '%$search%' or district LIKE '%$search%'";
}
$total_records_result = $connection->query($total_records_query);
$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);

?>
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Bibliophile Club list</h2>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <form action="">
                        <input type="text" placeholder="Search..." class="form-control" name="search-club" value="<?= isset($search) ? $search : '' ?>">
                    </form>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Club</th>
                            <th>City</th>
                            <th>Club Manager</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($club_fetch_result->num_rows  > 0):?>
                        <?php while ($club = $club_fetch_result->fetch_assoc()) : ?>
                            <tr>
                                <td width="40%">
                                    <a href="page-club-detail.php?club_id=<?= $club['club_id'] ?>" class="itemside">
                                        <div class="left">
                                            <img src="./assets/imgs/club/<?= $club['club_img'] ?>" class="img-sm img-avatar" alt="ClubIMG">
                                        </div>
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title"><?= $club['club_name'] ?></h6>
                                            <small class="text-muted">Club ID: #<?= $club['club_id'] ?></small>
                                        </div>
                                    </a>
                                </td>
                                <td><?= $club['district'] ?></td>
                                <td><?php
                                    $managerID =  $club['club_manager_id'];
                                    $club_manager_info_query = "SELECT *
                                                                FROM bibliophile_club_admin
                                                                WHERE club_admin_id = '$managerID'";
                                    $club_manager_info_result = $connection->query($club_manager_info_query);
                                    $club_manager_info = $club_manager_info_result->fetch_assoc();
                                    if($club_manager_info_result->num_rows == 1){
                                        echo $club_manager_info['f_name'] . " ". $club_manager_info['l_name'];
                                    }else{
                                        echo "No one assigned";
                                    }
                                    
                                    ?>
                                </td>
                                <td class="text-end">
                                    <a href="page-club-detail.php?club_id=<?= $club['club_id']?>" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                        <?php else: ?>
                            <tr>
                                <p><span class='badge rounded-pill alert-danger'>No bibliophile club is found!</span></p>
                            </tr>
                        <?php endif ?>
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