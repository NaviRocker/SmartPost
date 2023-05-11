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

if(isset($_POST['add_agency'])){
    $agency_shortcode = $_POST['agency_shortcode'];
    $agency_name = $_POST['agency_name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $nearest_postoffice = $_POST['nearest_postoffice'];
    $zip_code = $_POST['zip_code'];
    $contact = $_POST['contact'];


        //insert query
        $insert_agency = "INSERT INTO agency (agency_shortcode, agency_name, street, city, nearest_postoffice,
            zip_code, contact, status) VALUES ('$agency_shortcode', '$agency_name', '$street', '$city', '$nearest_postoffice', '$zip_code', '$contact', '1')";
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

