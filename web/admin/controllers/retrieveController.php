<?php
  // Query the database to retrieve the data
  $retrievePostOffice = mysqli_query($con, 'SELECT branch_shortcode, branch_name, zip_code, contact FROM postoffice WHERE status = 1 ORDER BY id DESC LIMIT 7');
  $mainPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type = 1"));
  $subPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type = 2"));
  $agencyPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type = 3"));
  $otherPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type IN (4, 5)"));

  $PostMasterCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 2"));
  $PostalStaffCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 3"));
  $PostManCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 4"));
  $MiddleAgentCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 5"));
  $retrieveEmployee = mysqli_query($con, 'SELECT admin.fname, admin.lname, admin.type, PostOffice.branch_name FROM admin LEFT JOIN PostOffice ON admin.branch_id = PostOffice.id WHERE admin.status = "verified" ORDER BY admin.id DESC LIMIT 5');

  $retrieveAvailablePostOffice = mysqli_query($con, 'SELECT id, branch_name FROM postoffice WHERE id NOT IN (SELECT branch_id FROM admin)');
  $retrievePostOfficeLOL = mysqli_query($con, 'SELECT branch_shortcode, branch_name, zip_code, contact FROM postoffice WHERE status = 1');




?>

<?php
// Execute SELECT query to fetch branches from the database
$postOfficeDropdown = mysqli_query($con, "SELECT id, branch_name FROM postoffice WHERE status = '1'");
?>

<?php
// Assuming you have established a connection to your MySQL database
// Query to get the number of entries in the postoffice table
$postofficeQuery = "SELECT COUNT(*) AS entry_count FROM postoffice";
$postofficeResult = mysqli_query($con, $postofficeQuery);

// Query to get the number of entries in the agency table
$agencyQuery = "SELECT COUNT(*) AS entry_count FROM agency";
$agencyResult = mysqli_query($con, $agencyQuery);

// Fetch the result from the postoffice query
if ($postofficeResult) {
    $postofficeRow = mysqli_fetch_assoc($postofficeResult);
    $postofficeCount = $postofficeRow['entry_count'];
}

// Fetch the result from the agency query
if ($agencyResult) {
    $agencyRow = mysqli_fetch_assoc($agencyResult);
    $agencyCount = $agencyRow['entry_count'];
}

?>

<?php
// Assuming you have established a connection to your MySQL database

// Query to retrieve the last entry from the postoffice table
$postofficeQuery = "SELECT * FROM postoffice ORDER BY id DESC LIMIT 1";
$postofficeResult = mysqli_query($con, $postofficeQuery);

// Check if the query was successful
$adminQuery = "SELECT admin.*, postoffice.branch_name
               FROM admin
               INNER JOIN postoffice ON admin.branch_id = postoffice.id
               WHERE admin.type = 2
               ORDER BY admin.id DESC
               LIMIT 1";
$adminResult = mysqli_query($con, $adminQuery);

$agencyQuery = "SELECT * FROM agency ORDER BY id DESC LIMIT 1";
$agencyResult = mysqli_query($con, $agencyQuery);

?>

<?php

date_default_timezone_set('Asia/Colombo');
$currentDate = date('Y-m-d');

// Construct the SQL query
$countRegularQuery = "SELECT COUNT(*) AS count FROM packages WHERE service_type = 1 AND DATE(date_created) = '$currentDate'";
// Execute the query
$resultRegular = mysqli_query($con, $countRegularQuery);
// Check if the query was successful
if ($resultRegular) {
    // Fetch the row data
    $row = mysqli_fetch_assoc($resultRegular);
    // Get the count
    $count_regular = $row['count'];
}

$countSpeedQuery = "SELECT COUNT(*) AS count FROM packages WHERE service_type = 2 AND DATE(date_created) = '$currentDate'";
// Execute the query
$resultSpeed = mysqli_query($con, $countSpeedQuery);
// Check if the query was successful
if ($resultSpeed) {
    // Fetch the row data
    $row = mysqli_fetch_assoc($resultSpeed);
    // Get the count
    $count_speed = $row['count'];
}

$countRegisterQuery = "SELECT COUNT(*) AS count FROM packages WHERE service_type = 3 AND DATE(date_created) = '$currentDate'";
// Execute the query
$resultRegister = mysqli_query($con, $countRegisterQuery);
// Check if the query was successful
if ($resultRegister) {
    // Fetch the row data
    $row = mysqli_fetch_assoc($resultRegister);
    // Get the count
    $count_register = $row['count'];
}

$countLogiQuery = "SELECT COUNT(*) AS count FROM packages WHERE service_type = 4 AND DATE(date_created) = '$currentDate'";
// Execute the query
$resultLogi = mysqli_query($con, $countLogiQuery);
// Check if the query was successful
if ($resultLogi) {
    // Fetch the row data
    $row = mysqli_fetch_assoc($resultLogi);
    // Get the count
    $count_logi = $row['count'];
}

?>


<?php

$packages_query = "SELECT * FROM packages ORDER BY id DESC LIMIT 4";
$packages_result = mysqli_query($con, $packages_query);

?>

<?php
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Get the branch_id from the admin table
    $adminQueryA = "SELECT branch_id FROM admin WHERE email = '$email'";
    $adminResultA = mysqli_query($con, $adminQueryA);

    if ($adminResultA && mysqli_num_rows($adminResultA) > 0) {
        $adminRowA = mysqli_fetch_assoc($adminResultA);
        $branchId = $adminRowA['branch_id'];

        // Get the branch_name from the postoffice table
        $postOfficeQuery = "SELECT branch_name FROM postoffice WHERE id = '$branchId'";
        $postOfficeResult = mysqli_query($con, $postOfficeQuery);

        if ($postOfficeResult && mysqli_num_rows($postOfficeResult) > 0) {
            $postOfficeRow = mysqli_fetch_assoc($postOfficeResult);
            $branchName = $postOfficeRow['branch_name'];

            // Use the $branchName as needed
            $countQueryA = "SELECT COUNT(*) AS count FROM postoffice WHERE id = '$branchId'";
            $countResultA = mysqli_query($con, $countQueryA);

            if ($countResultA && mysqli_num_rows($countResultA) > 0) {
                $countRowA = mysqli_fetch_assoc($countResultA);
                $rowCountEmp = $countRowA['count'];
           
        } 
    } 
} 
}
?>




<?php
// Retrieve the 6 latest updated agencies
$agencyQueryA = "SELECT * FROM agency ORDER BY id DESC LIMIT 6";
$agencyResultA = mysqli_query($con, $agencyQueryA);

// Check if there are any agencies

?>
