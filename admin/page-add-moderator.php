<?php
        require './aside-menu.php';
        
?>
        <section class="content-main">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add new moderator</h4>
                    <form >
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" placeholder="Your email" type="text">
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <div class="row gx-2">
                                <div class="col-4"> <input class="form-control" value="+998" type="text"> </div>
                                <div class="col-8"> <input class="form-control" placeholder="Phone" type="text"> </div>
                            </div>
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <label class="form-label">Create password</label>
                            <input class="form-control" placeholder="Password" type="password">
                        </div> <!-- form-group// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                </div>
            </div>
        </section>

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