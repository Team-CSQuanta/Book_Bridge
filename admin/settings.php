<?php
require './aside-menu.php';
?>
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Profile settings</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row gx-5">
                <!-- <aside class="col-lg-3 border-end">
                    <nav class="nav nav-pills flex-lg-column mb-4">
                        <a class="nav-link active" aria-current="page" href="#">General</a>
                        <a class="nav-link" href="#">Moderators</a>
                        <a class="nav-link" href="#">Admin account</a>
                        <a class="nav-link" href="#">SEO settings</a>
                        <a class="nav-link" href="#">Mail settings</a>
                        <a class="nav-link" href="#">Newsletter</a>
                    </nav>
                </aside> -->
                <div class="col-lg-9">
                    <section class="content-body p-xl-4">
                        <form action="./handler/settings-handler.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row gx-3">
                                        <div class="col-6  mb-3">
                                            <label class="form-label">First name</label>
                                            <input class="form-control" type="text" placeholder="Type here" name="f_name" value="<?=$_SESSION['user-first-name']?>">
                                        </div> <!-- col .// -->
                                        <div class="col-6  mb-3">
                                            <label class="form-label">Last name</label>
                                            <input class="form-control" type="text" placeholder="Type here" name="l_name" value="<?=$_SESSION['user-last-name']?>">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" name="email" value="<?=$_SESSION['user-logged-email']?>">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">Phone</label>
                                            <input class="form-control" type="tel" name="phone_number" value="<?=$_SESSION['user-phone-number']?>">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-12  mb-3">
                                            <label class="form-label">Address</label>
                                            <input class="form-control" type="text" name="address" value="<?=$_SESSION['user-address']?>">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-12  mb-3">
                                            <label class="form-label">Old Password</label>
                                            <input class="form-control" type="password" name="old_pass">
                                        </div> <!-- col .// -->
                                        <div class="col-lg-12  mb-3">
                                            <label class="form-label">New Password</label>
                                            <input class="form-control" type="password" name="new_pass">
                                        </div> 
                                        <div class="col-lg-12  mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control" type="password" name="new_pass">
                                        </div> 
                                        <!-- <div class="col-lg-6  mb-3">
                                            <label class="form-label">Birthday</label>
                                            <input class="form-control" type="date">
                                        </div>  -->
                                    </div> <!-- row.// -->
                                </div> <!-- col.// -->
                                <aside class="col-lg-4">
                                    <figure class="text-lg-center">
                                        <img class="img-lg mb-3 img-avatar" id="previewImage" src="<?= './assets/imgs/people/' . $_SESSION['profile_img'] ?>" alt="User Photo">
                                        <figcaption>
                                        <input class="form-control" type="file" id="profile_img" name="profile_img" accept="image/*" onchange="previewImage(event)">
                                        </figcaption>
                                    </figure>
                                </aside> <!-- col.// -->
                            </div> <!-- row.// -->
                            <br>
                            <button class="btn btn-primary" type="submit" name ="save-changes">Save changes</button>
                        </form>
                        <hr class="my-5">
                        <!-- <div class="row" style="max-width:920px">
                            <div class="col-md">
                                <article class="box mb-3 bg-light">
                                    <a class="btn float-end btn-light btn-sm rounded font-md" href="#">Change</a>
                                    <h6>Password</h6>
                                    <small class="text-muted d-block" style="width:100%">You can reset or change your password by clicking here</small>
                                </article>
                            </div> 
                            <div class="col-md">
                                <article class="box mb-3 bg-light">
                                    <a class="btn float-end btn-light rounded btn-sm font-md" href="#">Deactivate</a>
                                    <h6>Remove account</h6>
                                    <small class="text-muted d-block" style="width:70%">Once you delete your account, there is no going back.</small>
                                </article>
                            </div> 
                        </div>  -->
                    </section> <!-- content-body .// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->

</main>
<script>
    window.onload = function() {
        document.getElementById('profile_img').addEventListener('change', previewImage);
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
            preview.src = "<?= './assets/imgs/people/' . $_SESSION['profile_img'] ?>";
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