<?php 
include './admin/config/constants.php';
$phone_email = $_SESSION['signin-data']['phone_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data'])
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
    <link rel="shortcut icon" type="image/x-icon" href="./admin/assets/imgs/theme/favicon.svg">
    <!-- Template CSS -->
    <link href="./admin/assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <main>
        <section class="content-main mt-80 mb-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form action="admin/logic/login-logic.php" method= "post">
                        <div class="mb-3">
                            <input class="form-control" name="phone_email" value="<?=$phone_email?> "placeholder="Phone number or email" type="text">
                        </div> 
                        <div class="mb-3">
                            <input class="form-control" name="password" value="<?=$password?>" placeholder="Password" type="password">
                        </div> 
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" checked="">
                                <span class="form-check-label">Remember</span>
                            </label>
                        </div>
                        <div class="mb-4">
                            <button type="submit" name="login" class="btn btn-primary w-100"> Login </button>
                        </div> 
                    </form>
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