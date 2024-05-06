<?php 
session_start();
if(isset($_SESSION['user-logged-email'])){
    header("Location: http://localhost/Book_Bridge/admin/");
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BookBridge Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link href="./admin/assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <main>
        <section class="content-main mt-80 mb-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form action="./admin/handler/admin-login-handler.php" method= "post">
                        <div class="mb-3">
                            <input class="form-control" name="phone_email" value=""placeholder="Phone number or email" type="text" required>
                        </div> 
                        <div class="mb-3">
                            <input class="form-control" name="password" value="<?=$password?>" placeholder="Password" type="password" required>
                        </div> 
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                            <!-- <label class="form-check">
                                <input type="checkbox" class="form-check-input" checked="">
                                <span class="form-check-label">Remember</span>
                            </label> -->
                        </div>
                        <div class="mb-4">
                            <button type="submit" name="submit" class="btn btn-primary w-100"> Login </button>
                        </div> 
                    </form>
                    <!-- Error info -->
                    <?php if(isset($_SESSION['signin'])) :?>
                        <div class="d-grid gap-3 mb-4" style="  font-size: 14px;font-weight: 500;padding: 10px 40px;color: #ffffff;border: none;background-color: #FF0000;border-radius: 4px;">
                            <p style="text-align: center"> <?= $_SESSION['signin']; unset($_SESSION['signin'])?></p>
                        </div>
                    <?php endif ?>
                </div>
                
            </div>
        </section>

    </main>
    <script src="./admin/assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="./admin/assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="./admin/assets/js/vendors/jquery.fullscreen.min.js"></script>
    <!-- Main Script -->
    <script src="./admin/assets/js/main.js" type="text/javascript"></script>
</body>

</html>