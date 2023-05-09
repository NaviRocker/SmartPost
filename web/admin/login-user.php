<?php require_once "controllers/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <title>Admin Login | SmartPost Service Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Admin Login</span>
                <form action="login-user.php" method="POST" autocomplete="">
                <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="login" value="Login">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Forgot Password?
                        <a href="forgot-password.php" class="text login-link">Reset Password Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>