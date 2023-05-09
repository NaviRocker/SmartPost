<?php require_once "controllers/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/form.css">
         
    <title>Forgot Password | SmartPost Service Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Forgot Password</span>
                <form action="forgot-password.php" method="POST" autocomplete="">
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
                        <input type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="check-email" value="Continue">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Remember Password?
                        <a href="login-user.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>