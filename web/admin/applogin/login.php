<?php

if(isset($_POST['email']) && isset($_POST['password'])){
    require_once "connection.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encpass = md5($password);
    
    // Assuming you have established a connection to your MySQL database



// Check in the "agency" table
$query = "SELECT * FROM agency WHERE email = '$email' AND password = '$encpass'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // The entered email and password exist in the "agency" table
    echo "success";
} else {
    // Check in the "admin" table
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$encpass' AND type = 4";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // The entered email and password exist in the "admin" table with type = 4
        echo "success";
    } else {
        // No matching records found in both tables
        echo "failure";
    }
}


}

?>
