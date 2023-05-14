<?php
if (isset($_POST['email']) && isset($_POST['trackingNumber'])) {
    // Get the user email and tracking number from the request
    $email = $_POST['email'];
    $trackingNumber = $_POST['trackingNumber'];
    
    // Assuming you have established a connection to your MySQL database
    require_once "connection.php";

    // First, retrieve the package ID from the packages table using the tracking number
    $packageQuery = "SELECT id FROM packages WHERE tracking_number = '$trackingNumber'";
    $packageResult = mysqli_query($con, $packageQuery);
    
    if (mysqli_num_rows($packageResult) > 0) {
        $packageRow = mysqli_fetch_assoc($packageResult);
        $packageId = $packageRow['id'];
        
        // Second, retrieve the agency ID from the agency table using the email
        $agencyQuery = "SELECT id FROM agency WHERE email = '$email'";
        $agencyResult = mysqli_query($con, $agencyQuery);
        
        if (mysqli_num_rows($agencyResult) > 0) {
            $agencyRow = mysqli_fetch_assoc($agencyResult);
            $agencyId = $agencyRow['id'];
            
            // Insert a new record into the trackings table
            $insertQuery = "INSERT INTO trackings (package_id, current_location, status) VALUES ('$packageId', '$agencyId', 1)";
            if (mysqli_query($con, $insertQuery)) {
                // Receive operation successful
                echo "success";
            } else {
                // Error occurred while inserting the record
                echo "failure 1";
            }
        } else {
            // No matching agency found for the email
            echo "failure 3";
        }
    } else {
        // No matching package found for the tracking number
        echo "failure 4";
    }
} else {
    // Invalid request parameters
    echo "failure 5";
}
?>
