<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
</head>
<body>
    <div class="container">
        <h2>Enter your email to reset your Password</h2>
        <form action="handle-forgot-password.php" method="POST">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
