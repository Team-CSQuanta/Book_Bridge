<?php
require './aside-menu.php';
require './handler/fetch-data-by-id.php';
$moderator_id = $_GET['moderator_id'];

$query = "SELECT * 
          FROM bibliophile_club_admin
          WHERE club_admin_id = '$moderator_id'";

$query_result = $connection->query($query);
$query_result_associative_arr = $query_result->fetch_assoc();
$club_data = null;
$location_data = null;

if (isset($_GET['AssignOrRevoke'])) {
    if ($_GET['AssignOrRevoke'] == 'Assign') {
        if (isset($_GET['club_id_to_Assign']) && isset($_GET['moderator_id'])) {
            $club_id = filter_var($_GET['club_id_to_Assign'], FILTER_SANITIZE_NUMBER_INT);
            $moderator_id = filter_var($_GET['moderator_id'], FILTER_SANITIZE_NUMBER_INT);

            // Update bibliophile club table manager_id
            $query1 = "UPDATE bibliophile_club
                      SET club_manager_id = '$moderator_id'
                      WHERE club_id = '$club_id'";
            $result1 = $connection->query($query1);

            // Update bibliophile club admin table club_id
            $query2 = "UPDATE bibliophile_club_admin
                      SET club_id = '$club_id'
                      WHERE club_admin_id = '$moderator_id'";
            $result2 = $connection->query($query2);

            if ($result1 && $result2) {
                //redirect or display a success message here
                echo '<meta http-equiv="refresh" content="0;url=http://localhost/Book_Bridge/admin/page-moderator-detail.php?moderator_id=' . $moderator_id . '">';
               
                
            } else {
                // Handle error if any of the queries fail
            }
        }
    } elseif ($_GET['AssignOrRevoke'] == 'Revoke') {
        $club_id = filter_var($_GET['club_id_to_Revoke'], FILTER_SANITIZE_NUMBER_INT);
        $moderator_id = filter_var($_GET['moderator_id'], FILTER_SANITIZE_NUMBER_INT);

        // Update bibliophile club table manager_id
        $query1 = "UPDATE bibliophile_club
                   SET club_manager_id = null
                   WHERE club_id = '$club_id'";
        $result1 = $connection->query($query1);

        // Update bibliophile club admin table club_id
        $query2 = "UPDATE bibliophile_club_admin
                   SET club_id = null
                   WHERE club_admin_id = '$moderator_id'";
        $result2 = $connection->query($query2);

        if ($result1 && $result2) {
            //redirect or display a success message here
            echo '<meta http-equiv="refresh" content="0;url=http://localhost/Book_Bridge/admin/page-moderator-detail.php?moderator_id=' . $moderator_id . '">';

        } else {
            // Handle error if any of the queries fail
        }
    }
}

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
                        <img class="img-lg mb-3 img-avatar" id="previewImage" src="<?= './assets/imgs/people/' . $query_result_associative_arr['profile_img'] ?>" alt="User Photo">
                    </div>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <h3><?= $query_result_associative_arr['f_name'] . " " . $query_result_associative_arr['l_name'] ?></h3>

                    <p>
                        <?php
                        $club_id = $query_result_associative_arr['club_id'];
                        if ($club_id) {
                            $query = "SELECT * FROM bibliophile_club WHERE club_id = '$club_id'";
                            $result = $connection->query($query);
                            if ($result) {
                                $club_data = $result->fetch_assoc();
                                if ($club_data) {
                                    echo "<span class='badge rounded-pill alert-success'>" . $club_data['club_name'] . "</span>";
                                } else {
                                    echo "<span class='badge rounded-pill alert-danger'>No bibliophile club is assigned</span>";
                                }
                            } else {
                                echo "<span class='badge rounded-pill alert-danger'>Error retrieving club data</span>";
                            }
                        } else {
                            echo "<span class='badge rounded-pill alert-danger'>No bibliophile club is assigned</span>";
                        }

                        ?>
                    </p>

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
                        <p class="mb-0 text-muted">Total sales:</p>
                        <h5 class="text-success">238</h5>
                        <p class="mb-0 text-muted">Revenue:</p>
                        <h5 class="text-success mb-0">$2380</h5>
                    </article>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Contacts</h6>
                    <p>
                        <!-- Manager: Jerome Bell <br> -->
                        <?= $query_result_associative_arr['email'] ?> <br>
                        <?= $query_result_associative_arr['phone_number'] ?>
                    </p>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Address</h6>
                    <p>
                        Country: Bangladesh <br>
                        Address: <?= $query_result_associative_arr['address_line'] ?> <br>
                        <?php
                        $location_id = (int)$query_result_associative_arr['location_id'];
                        if ($location_id) {
                            $query = "SELECT * FROM location WHERE location_id = '$location_id'";
                            $result = $connection->query($query);
                            if ($result) {
                                $location_data = $result->fetch_assoc();
                                if ($location_data) {
                                    echo "District: " . $location_data['district'] . " <br>" . "Division: " . $location_data['division'];
                                } else {
                                    echo "No location data found!";
                                }
                            } else {
                                echo "Error retrieving location data!";
                            }
                        } else {
                            echo "<span class='badge rounded-pill alert-danger'>No bibliophile club is assigned</span>";
                        }
                        ?>

                    </p>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-xl-4 text-xl-end">
                    <map class="mapbox position-relative d-inline-block">
                        <img src="assets/imgs/misc/map.jpg" class="rounded2" height="120" alt="map">
                        <span class="map-pin" style="top:50px; left: 100px"></span>
                        <button class="btn btn-sm btn-brand position-absolute bottom-0 end-0 mb-15 mr-15 font-xs"> Large </button>
                    </map>
                </div> <!--  col.// -->
            </div>
            <hr class="my-4">
            <p><?= $club_data ? "<h4>Assigned club information :</h4>" : "<h4>Available club to assign in " . $location_data['district'] . ":</h4>" ?></p>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Club ID</th>
                            <th>Club description</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($club_data) {
                            // Handle the case when $club_data exists
                        ?>
                            <tr>
                                <td width="40%">
                                    <a href="page-user-detail.php?user_id=<?= $club_data['club_id'] ?>" class="itemside">
                                        <div class="left">
                                            <img src="./assets/imgs/club/<?= $club_data['club_img'] ?>" class="img-sm img-avatar" alt="Club Image">
                                        </div>
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title"><?= $club_data['club_name'] ?></h6>
                                            <small class="text-muted">Club ID: #<?= $club_data['club_id'] ?></small>
                                        </div>
                                    </a>
                                </td>
                                <td><?= $club_data['club_description'] ?></td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="page-moderator-detail.php?AssignOrRevoke=Revoke&club_id_to_Revoke=<?= $club_data['club_id'] ?>&moderator_id=<?= $moderator_id ?>">
                                                Revoke
                                            </a>
                                        </div>
                                    </div> <!-- dropdown //end -->
                                </td>
                            </tr>
                            <?php
                        } else {
                            $query_club_info = "SELECT * 
                        FROM bibliophile_club
                        WHERE district = '{$location_data['district']}' AND club_manager_id IS NULL";
                            $result_club_info = $connection->query($query_club_info);

                            if ($result_club_info->num_rows > 0) {
                                while ($club = $result_club_info->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td width="40%">
                                            <a href="page-user-detail.php?user_id=<?= $club['club_id'] ?>" class="itemside">
                                                <div class="left">
                                                    <img src="./assets/imgs/club/<?= $club['club_img'] ?>" class="img-sm img-avatar" alt="Club Image">
                                                </div>
                                                <div class="info pl-3">
                                                    <h6 class="mb-0 title"><?= $club['club_name'] ?></h6>
                                                    <small class="text-muted">Club ID: #<?= $club['club_id'] ?></small>
                                                </div>
                                            </a>
                                        </td>
                                        <td><?= $club['club_description'] ?></td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="page-moderator-detail.php?AssignOrRevoke=<?= (($club_data == $club['club_id']) ? 'Revoke' : 'Assign') ?>&club_id_to_<?= (($club_data == $club['club_id']) ? 'Remove' : 'Assign') ?>=<?= $club['club_id'] ?>&moderator_id=<?= $moderator_id ?>">
                                                        <?= ($club_data == $club['club_id']) ? 'Revoke' : 'Assign' ?>
                                                    </a>
                                                </div>
                                            </div> <!-- dropdown //end -->
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3">No result found!!</td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>
        </div>
    </div> <!--  card.// -->
    <!-- <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Products by seller</h5>
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/1.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/2.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div>
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/3.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Jeans short new model</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div>
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/4.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Travel Bag XL</a>
                            <div class="price mt-1">$179.00</div>
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/5.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/6.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/7.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/8.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Apple Airpods CB-133</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/9.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/10.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/11.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Jeans short new model</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/12.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Travel Bag XL</a>
                            <div class="price mt-1">$179.00</div>
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/1.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/2.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/3.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Jeans short new model</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/4.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Travel Bag XL</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/5.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/6.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/7.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/8.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Apple Airpods CB-133</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/9.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/10.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Product name</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/11.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Jeans short new model</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="assets/imgs/items/12.jpg" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">Travel Bag XL</a>
                            <div class="price mt-1">$179.00</div> 
                        </div>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>  -->
    <!-- <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
            </ul>
        </nav>
    </div> -->
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