<?php

if(isset($_POST['add_postoffice'])){
    $branch_shortcode = $_POST['branch_shortcode'];
    $branch_name = $_POST['branch_name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    if ($district == 'Kandy' || $district == 'Matale') {
        $province = 'Central';
      } elseif ($district == 'Colombo' || $district == 'Kalutara' || $district == 'Gampaha') {
        $province = 'Western';
      } else {
        $province = 'Other Region';
      }
    $zip_code = $_POST['zip_code'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];


        //insert query
        $insert_postoffice = "INSERT INTO postoffice (branch_shortcode, branch_name, street, city, district, province,
            zip_code, contact, type, status) VALUES ('$branch_shortcode', '$branch_name', '$street', '$city', '$district', '$province', '$zip_code', '$contact', '$type', '1')";
        $result_query = mysqli_query($con, $insert_postoffice);
        if ($result_query) {
            // Display SweetAlert success message
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Added New Post Office Successfully!',
                showConfirmButton: false,
                timer: 1500
                
                }).then(function() {
                    window.location.replace('success.php'); // Replace with the desired URL
                });
            </script>";
        } else {
            // Handle error
            echo 'There was an error inserting the data into the database.';
        }
    }
?>



<?php

if(isset($_POST['add_postoffice'])){
    $branch_shortcode = $_POST['branch_shortcode'];
    $branch_name = $_POST['branch_name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    if ($district == 'Kandy' || $district == 'Matale') {
        $province = 'Central';
      } elseif ($district == 'Colombo' || $district == 'Kalutara' || $district == 'Gampaha') {
        $province = 'Western';
      } else {
        $province = 'Other Region';
      }
    $zip_code = $_POST['zip_code'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];


        //insert query
        $insert_postoffice = "INSERT INTO postoffice (branch_shortcode, branch_name, street, city, district, province,
            zip_code, contact, type, status) VALUES ('$branch_shortcode', '$branch_name', '$street', '$city', '$district', '$province', '$zip_code', '$contact', '$type', '1')";
        $result_query = mysqli_query($con, $insert_postoffice);
        if ($result_query) {
            // Display SweetAlert success message
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Added New Post Office Successfully!',
                showConfirmButton: false,
                timer: 1500
                
                }).then(function() {
                    window.location.replace('success.php'); // Replace with the desired URL
                });
            </script>";
        } else {
            // Handle error
            echo 'There was an error inserting the data into the database.';
        }
    }
?>


<?php

if(isset($_POST['add_adminuser'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    $branch_id = $_POST['branch_id'];
        //insert query
        $insert_admin = "INSERT INTO admin (fname, lname, email, password, type, status, code, branch_id) 
            VALUES ('$fname', '$lname', '$email', '$encpass', '2', 'verified', '0', '$branch_id')";
        $result_query = mysqli_query($con, $insert_admin);
        if ($result_query) {
            // Display SweetAlert success message
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                text: 'Added New Post Master Successfully!',
                showConfirmButton: false,
                timer: 1500
                
                }).then(function() {
                    window.location.replace('success.php'); // Replace with the desired URL
                });
            </script>";
        } else {
            // Handle error
            echo 'There was an error inserting the data into the database.';
        }
    }
?>


<?php

if(isset($_POST['add_agency'])){
    $agency_shortcode = $_POST['agency_shortcode'];
    $agency_name = $_POST['agency_name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $nearest_postoffice = $_POST['nearest_postoffice'];
    $zip_code = $_POST['zip_code'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encpass = md5($password);


        //insert query
        $insert_agency = "INSERT INTO agency (agency_shortcode, agency_name, street, city, nearest_postoffice,
            zip_code, contact, email, password, status) VALUES ('$agency_shortcode', '$agency_name', '$street', '$city', '$nearest_postoffice', '$zip_code', '$contact', '$email', '$encpass', '1')";
        $result_query = mysqli_query($con, $insert_agency);
        if ($result_query) {
            // Display SweetAlert success message
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Added New Agency Successfully!',
                showConfirmButton: false,
                timer: 1500
                
                }).then(function() {
                    window.location.replace('success.php'); // Replace with the desired URL
                });
            </script>";
        } else {
            // Handle error
            echo 'There was an error inserting the data into the database.';
        }
    }
?>


<?php

function generateUniqueCode($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    // Generate a random code by selecting random characters from the $characters string
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}

// Generate a unique code
$codeLength = 10;
$uniqueCode = generateUniqueCode($codeLength);

// Check if the generated code is unique
// Assuming you have a database connection variable $con
$unique_query = "SELECT * FROM packages WHERE tracking_number = '$uniqueCode'";
$result = mysqli_query($con, $unique_query);
if (mysqli_num_rows($result) > 0) {
    // If the code is not unique, generate a new one
    $uniqueCode = generateUniqueCode($codeLength);
}



if(isset($_POST['add_package'])){
    $sender_name = $_POST['sender_name'];
    $sender_nic = $_POST['sender_nic'];
    $sender_address = $_POST['sender_address'];
    $sender_phone = $_POST['sender_phone'];
    $sender_email = $_POST['sender_email'];
    $recipient_name = $_POST['recipient_name'];
    $recipient_address = $_POST['recipient_address'];
    $recipient_phone = $_POST['recipient_phone'];
    $recipient_email = $_POST['recipient_email'];
    $nearest_postoffice = $_POST['nearest_postoffice'];
    $delivery_type = $_POST['delivery_type'];
    $service_type = $_POST['service_type'];
    $size = $_POST['size'];
    $unit = $_POST['unit'];
    $weight = $_POST['weight'];
    $payment_type = $_POST['payment_type'];
    $sub_total = $_POST['sub_total'];
    $final_price = $_POST['final_price'];

    if (isset($_POST['subtotal']) && isset($_POST['total'])) {
        $sub_total = $_POST['subtotal'];
        $total = $_POST['total'];}

    $current_email = $_SESSION['email'];

    $current_query = "SELECT branch_id FROM admin WHERE email = '$current_email'";

$result_current = mysqli_query($con, $current_query);

if ($result_current && mysqli_num_rows($result_current) > 0) {
    // Fetch the branch ID from the query result
    $row = mysqli_fetch_assoc($result_current);
    $branchID = $row['branch_id'];

        //insert query
        $insert_package = "INSERT INTO packages (tracking_number, sender_name, sender_nic, sender_address, sender_phone, sender_email, recipient_name, recipient_phone, 
        recipient_address, recipient_email, nearest_postoffice, delivery_type, service_type, package_size, unit, 
        package_weight, payment_method, sub_total, final_price, status, current_location) 
            VALUES ('$uniqueCode', '$sender_name', '$sender_nic', '$sender_address', '$sender_phone', '$sender_email', '$recipient_name', '$recipient_phone', 
            '$recipient_address', '$recipient_email', '$nearest_postoffice', '$delivery_type', '$service_type', '$size', '$unit', 
            '$weight', '$payment_type', '$sub_total', '$final_price', '1', '$branchID')";
        $result_query = mysqli_query($con, $insert_package);
        if ($result_query) {
            // Display SweetAlert success message
            echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: 'Package Updated Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {

                
        var lol = 'success.php';
        window.location.href = lol;

                    // Redirect to success.php with the unique code
                    var uniqueCode = '$uniqueCode';
        var url = 'generatePrint.php?code=' + encodeURIComponent(uniqueCode);
        window.open(url, '_blank');


                    
                });
            </script>";
        }
         else {
            // Handle error
            echo 'There was an error inserting the data into the database.';
        }
    }
}
?>



<?php

if(isset($_POST['add_staff'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encpass = password_hash($password, PASSWORD_BCRYPT);

    $StaffQuery = "SELECT branch_id FROM admin WHERE email = '$email'";
    $StaffResult = mysqli_query($con, $StaffQuery);

    if ($StaffResult && mysqli_num_rows($StaffResult) > 0) {
        $StaffRow = mysqli_fetch_assoc($StaffResult);
        $branchId = $StaffRow['branch_id'];}


        //insert query
        $insert_adminuser = "INSERT INTO admin (fname, lname, email, password, type, status, code, branch_id) 
            VALUES ('$fname', '$lname', '$email', '$encpass', '3', 'verified', '0', '$branchId')";
        $result_query = mysqli_query($con, $insert_adminuser);
        if ($result_query) {
            // Display SweetAlert success message
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                text: 'Added New Postal Staff Successfully!',
                showConfirmButton: false,
                timer: 1500
                
                }).then(function() {
                    window.location.replace('success.php'); // Replace with the desired URL
                });
            </script>";
        } else {
            // Handle error
            echo 'There was an error inserting the data into the database.';
        }
    }

?>


<?php

if(isset($_POST['add_postman'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    $StaffQuery = "SELECT branch_id FROM admin WHERE email = '$email'";
    $StaffResult = mysqli_query($con, $StaffQuery);

    if ($StaffResult && mysqli_num_rows($StaffResult) > 0) {
        $StaffRow = mysqli_fetch_assoc($StaffResult);
        $branchId = $StaffRow['branch_id'];}
        //insert query
        $insert_adminpost = "INSERT INTO admin (fname, lname, email, password, type, status, code, branch_id) 
            VALUES ('$fname', '$lname', '$email', '$encpass', '4', 'verified', '0', '$branchId')";
        $result_query = mysqli_query($con, $insert_adminpost);
        if ($result_query) {
            // Display SweetAlert success message
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                text: 'Added New Postman Successfully!',
                showConfirmButton: false,
                timer: 1500
                
                }).then(function() {
                    window.location.replace('success.php'); // Replace with the desired URL
                });
            </script>";
        } else {
            // Handle error
            echo 'There was an error inserting the data into the database.';
        }
    }
?>

