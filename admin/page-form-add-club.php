<?php
require './aside-menu.php';
$location_query = "SELECT *
                   FROM location";
$location_query_result = $connection->query($location_query);
?>
<section class="content-main">
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">Add New Club</h2>
                <div>
                    <button class="btn btn-md rounded font-sm hover-up">Add</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic info</h4>
                </div>
                <div class="card-body">
                    <form action="./handler/add-club.php" method="post">
                        <div class="mb-4">
                            <label for="club_name" class="form-label">Club name</label>
                            <input type="text" placeholder="Type here" class="form-control" id="club_name" name="club_name" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Full description</label>
                            <textarea placeholder="Type here" class="form-control" rows="4" name="club_description"></textarea>
                        </div>
                    </form>
                </div>
            </div> <!-- card end// -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Location</h4>
                </div>
                <div class="card-body">
                    <form action="./handler/add-club.php" method="post">
                        <div class="row">
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Address Line 1</label>
                                <input type="text" placeholder="" class="form-control" id="product_name" name="address-line" required>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">District</label>
                                <select class="form-select" name="district">
                                    <?php while ($district = $location_query_result->fetch_assoc()) : ?>
                                        <option> <?= $district['district'] ?> </option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Division</label>
                                    <select class="form-select">
                                        <?php while ($division = $location_query_result->fetch_assoc()) : ?>
                                            <option> <?= $division['division'] ?> </option>
                                        <?php endwhile ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Club Profile Picture</h4>
                </div>
                <div class="card-body">
                    <form action="./handler/add-club.php" method="post" enctype="multipart/form-data">
                        <div class="input-upload">
                            <img id="previewImage" src="assets/imgs/theme/upload.svg" alt="Preview Image">
                            <input class="form-control" type="file" id="clubImageInput" onchange="previewImage(event)">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->

</main>
<script>
    window.onload = function() {
        document.getElementById('clubImageInput').addEventListener('change', previewImage);
    };

    function previewImage(event) {
        const preview = document.getElementById('previewImage');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "assets/imgs/theme/upload.svg"; // Display default image if no file selected
        }
    }
</script>


<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendors/select2.min.js"></script>
<script src="assets/js/vendors/perfect-scrollbar.js"></script>
<script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
<!-- Main Script -->
<script src="assets/js/main.js" type="text/javascript"></script>
</body>

</html>