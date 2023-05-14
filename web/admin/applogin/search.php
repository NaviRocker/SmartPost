<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the trackingId parameter is present in the POST request
    if (isset($_POST['trackingId'])) {
        $trackingId = $_POST['trackingId'];
        
        // Connect to your MySQL database
        require_once "connection.php";

        if (!$con) {
            // Failed to connect to the database
            echo "failure";
        } else {
            // Perform the database query to retrieve the package_id based on the trackingId
            $packageQuery = "SELECT id FROM packages WHERE tracking_id = '$trackingId'";
            $packageResult = mysqli_query($conn, $packageQuery);

            if (mysqli_num_rows($packageResult) > 0) {
                // Get the package_id from the result
                $row = mysqli_fetch_assoc($packageResult);
                $packageId = $row['id'];

                // Perform the database query on the tracking table using the package_id
                $trackingQuery = "SELECT * FROM tracking WHERE package_id = '$packageId'";
                $trackingResult = mysqli_query($con, $trackingQuery);

                if (mysqli_num_rows($trackingResult) > 0) {
                    // The tracking information exists in the table
                    echo "success";
                } else {
                    // The tracking information does not exist in the table
                    echo "failure 1";
                }
            } else {
                // The tracking ID does not exist in the packages table
                echo "failure 2";
            }

            // Close the database connection
            mysqli_close($con);
        }
    } else {
        // Required parameter is missing
        echo "failure 3";
    }
} else {
    // Invalid request method
    echo "failure 4";
}

?>
