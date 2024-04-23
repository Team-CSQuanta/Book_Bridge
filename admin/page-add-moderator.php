<?php
require './aside-menu.php';
$location_query = "SELECT *
                   FROM location";
$location_query_result = $connection->query($location_query);
$location_query_division = "SELECT distinct division
                            FROM location";
$location_query_division_result = $connection->query($location_query_division);

?>
<section class="content-main">
    <form action="./handler/add-moderator.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Add New Moderator</h2>
                    <div>
                        <button class="btn btn-md rounded font-sm hover-up" name="add-moderator">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Basic Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" placeholder="Type here" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone-number" class="form-label">Phone Number</label>
                            <input type="text" placeholder="Type here" class="form-control" id="phone-number" name="phone-number" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">First name</label>
                                    <div class="row gx-2">
                                        <input placeholder="" type="text" class="form-control" name="f_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Last Name</label>
                                    <input placeholder="" type="text" class="form-control" name="l_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" placeholder="Type here" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Location</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-4">
                                <label for="address-line" class="form-label">Address Line 1</label>
                                <input type="text" placeholder="" class="form-control" id="address-line" name="address-line" required>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">District</label>
                                <select class="form-select" name="district" required>
                                    <?php while ($district = $location_query_result->fetch_assoc()) : ?>
                                        <option> <?= $district['district'] ?> </option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Division</label>
                                    <select class="form-select" required name="division" id="division-selected">
                                        <?php while ($division = $location_query_division_result->fetch_assoc()) : ?>
                                            <option> <?= $division['division'] ?> </option>
                                        <?php endwhile ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Profile picture</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img id="previewImage" src="assets/imgs/theme/upload.svg" alt="Preview Image">
                            <input class="form-control" type="file" id="moderatorImg" name="moderator-img" onchange="previewImage(event)">
                        </div>
                    </div>
                </div> <!-- card end// -->
            </div>
        </div>
    </form>

</section> <!-- content-main end// -->

</main>
<script>
    window.onload = function() {
        document.getElementById('moderatorImg').addEventListener('change', previewImage);
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