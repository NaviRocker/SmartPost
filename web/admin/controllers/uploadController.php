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
