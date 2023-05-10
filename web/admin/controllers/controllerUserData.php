<?php 
session_start();
require "./connection/connection.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
// if(isset($_POST['signup'])){
//     $name = mysqli_real_escape_string($con, $_POST['name']);
//     $email = mysqli_real_escape_string($con, $_POST['email']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);
//     $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
//     if($password !== $cpassword){
//         $errors['password'] = "Please makesure your passwords match!";
//     }
//     $email_check = "SELECT * FROM admin WHERE email = '$email'";
//     $res = mysqli_query($con, $email_check);
//     if(mysqli_num_rows($res) > 0){
//         $errors['email'] = "An account with this email already exists!";
//     }
//     if(count($errors) === 0){
//         $encpass = password_hash($password, PASSWORD_BCRYPT);
//         $code = rand(999999, 111111);
//         $status = "notverified";
//         $insert_data = "INSERT INTO admin (name, email, password, code, status)
//                         values('$name', '$email', '$encpass', '$code', '$status')";
//         $data_check = mysqli_query($con, $insert_data);
//         if($data_check){
//             $subject = "Email Verification Code";
//             $message = "Your verification code is $code";
//             $sender = "From: naveen.sack@gmail@gmail.com";
//             if(mail($email, $subject, $message, $sender)){
//                 $info = "We've sent a verification code to your email - $email";
//                 $_SESSION['info'] = $info;
//                 $_SESSION['email'] = $email;
//                 $_SESSION['password'] = $password;
//                 header('location: ../user-otp.php');
//                 exit();
//             }else{
//                 $errors['otp-error'] = "Failed while sending code!";
//             }
//         }else{
//             $errors['db-error'] = "Failed while inserting data into database!";
//         }
//     }

// }
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM admin WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE admin SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['fname'] = $name;
                $_SESSION['email'] = $email;
                header('location: ./index.php?page=home');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $user_type = $fetch['type'];
                if ($user_type == 1 || $user_type == 2 || $user_type == 3) {
                    $status = $fetch['status'];
                    if ($status == 'verified') {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $_SESSION['type'] = $user_type; // set the user type here
                        header('location: ./index.php?page=home');
                    }else{
                        $info = "It looks like you haven't verified your email - $email";
                        $_SESSION['info'] = $info;
                        header('location: ./user-otp.php');
                    }
                } else {
                    $errors['email'] = "You don't have the necessary permissions to log in.";
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It looks like you don't have an account.";
        }
    }
    

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM admin WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE admin SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code - SmarPost Postal Management";
                $message = "Your password reset code is $code";
                $sender = "From: naveen.sack@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a password reset code to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: ./reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending the code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM admin WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you have never used on any other sites.";
            $_SESSION['info'] = $info;
            header('location: ./new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered the incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE admin SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: ./password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: ./login-user.php');
    }
?>