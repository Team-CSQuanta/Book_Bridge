<?php
require './aside-menu.php';
?>
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Edit Category </h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Name</label>
                            <input type="text" placeholder="Type here" class="form-control" id="product_name" />
                        </div>
                        <div class="mb-4">
                            <label for="product_slug" class="form-label">Slug</label>
                            <input type="text" placeholder="Type here" class="form-control" id="product_slug" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Parent</label>
                            <select class="form-select">
                                <option>Clothes</option>
                                <option>T-Shirts</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" class="form-control"></textarea>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Create category</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                </div> <!-- .col// -->
            </div> <!-- .row // -->
        </div> <!-- card body .// -->
    </div> <!-- card .// -->
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