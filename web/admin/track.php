<!-- MAIN -->
<link rel="stylesheet" href="assets/css/track.css">
<main>
	<div class="head-title">
		<div class="left">
			<h1>Track Packages</h1>
			<ul class="breadcrumb">
				<li>
					<a href="?page=home">Home</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a class="active" href="#">Track Packages</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="table-data">
				<div class="order">
					<div class="head">
						
						<h3>Search for Tracking ID</h3>
						<br>
					</div>
					<div class="row">
				<form action="#" method="POST">
				<div style = "width: 80%;">
					<div class="search">
						<input type="text" name = "tracking_number" class="searchTerm" placeholder="Enter Tracking ID">
						<button type="submit" name = "search" class="searchButton">
							<i class='bx bx-search-alt'></i>
						</button>
					</div>
				</div>
			</form>
		</div>
  

				</div>
<?php if (isset($_POST['search'])) { 
    $trackingNumber = $_POST['tracking_number'];
	echo '
				<div class="order">
					<div class="head">
						
						<h3>Tracking Number: </h3>
						
					</div>
					<div class="row">
				
				<h3> '. $trackingNumber.' </h3>
		</div>
  

				</div>';}
				?>
			</div>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Tracking Details</h3>
						
					</div>


					<div class="row">

    
      <div id="tracking-pre"></div>
      <div id="tracking">
        <div class="tracking-list">
			
					<?php
if (isset($_POST['search'])) {
    $trackingNumber = $_POST['tracking_number'];
    
    // Perform a query to fetch the package ID based on the tracking number from the packages table
    $query = "SELECT id FROM packages WHERE tracking_number = '$trackingNumber'";
    $result = mysqli_query($con, $query);
    
    // Check if the package ID is found
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $packageID = $row['id'];
        
        // Perform a query to fetch the instances from the tracks table based on the package ID
        $query = "SELECT * FROM trackings WHERE package_id = '$packageID'";
        $result = mysqli_query($con, $query);



		$query_packages = "SELECT current_location, date_created 
		FROM packages 
		WHERE tracking_number = '$trackingNumber'";
$result_packages = mysqli_query($con, $query_packages);

if ($result_packages && mysqli_num_rows($result_packages) > 0) {
// Fetch the data from the query result
$row_packages = mysqli_fetch_assoc($result_packages);
$currentLocation = $row_packages['current_location'];
$dateCreated = $row_packages['date_created'];

// Query to fetch the branch_name from postoffice table based on the current_location
$query_postoffice = "SELECT branch_name 
			  FROM postoffice 
			  WHERE id = '$currentLocation'";
$result_postoffice = mysqli_query($con, $query_postoffice);

if ($result_postoffice && mysqli_num_rows($result_postoffice) > 0) {
// Fetch the branch_name from the query result
$row_postoffice = mysqli_fetch_assoc($result_postoffice);
$branchName = $row_postoffice['branch_name'];

// Print the branch_name and date_created
echo '<div class="tracking-item">
<div class="tracking-icon status-intransit">
	<svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
		<path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
	</svg>
</div>
<div class="tracking-date">
	<img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" />
</div>
<div class="tracking-content"> Accepted By ' . $branchName . '<span>' . $dateCreated . '</span></div>
</div>';
} else {
// No matching entry found in postoffice table
echo "No entry found in postoffice table for the current_location: " . $currentLocation;
}
} else {
// No matching entry found in packages table
echo "No entry found for the tracking number: " . $trackingNumber;
}

 


        
        // Check if any results were found
        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and display the data

			
            while ($row = mysqli_fetch_assoc($result)) {
                // Access the relevant fields from the row
                $id = $row['id'];
				$package_id = $row['package_id'];
				$current_location = $row['current_location'];
				$time = $row['date_created'];
				$status = $row['status'];

				$agency_name = '';
				$statusLabel = '';
				if ($status == 1) {
					$statusLabel = "Received By";
				} elseif ($status == 2) {
					$statusLabel = "Delivered By";
				} else {
					$statusLabel = "On the Way from";
				}

// Retrieve the agency name based on the current_location ID
$agency_query = "SELECT agency_name FROM agency WHERE id = '$current_location'";
$agency_result = mysqli_query($con, $agency_query);

if ($agency_result && mysqli_num_rows($agency_result) > 0) {
    $agency = mysqli_fetch_assoc($agency_result);
    $agency_name = $agency['agency_name'];
}

				
                // ... access other fields as needed
                echo '<div class="tracking-item">
    <div class="tracking-icon status-intransit">
        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
        </svg>
    </div>
    <div class="tracking-date">
        <img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" />
    </div>
    <div class="tracking-content">' . $statusLabel . ' '. $agency_name . '<span>' . $time . '</span></div>
</div>';
                // Display the data
        
            }
        } else {
            // No results found
            echo "No results found.";
        }
    } else {
        // Package ID not found
        echo "Invalid tracking number.";
    }
}
?>

					
  
          
          
          

          
          
        </div>
      </div>
    
  </div>

 
				</div>
				<div class="todo">
					<div class="head">
						<h3>Package Details</h3>
						
					</div>


					<?php
if (isset($_POST['search'])) {
    // Get the submitted tracking number
    $trackingNumber = $_POST['tracking_number'];

    // Query to fetch the desired data from the packages table
    $query_details = "SELECT sender_name, recipient_name, delivery_type, service_type, package_weight, unit
              FROM packages
              WHERE tracking_number = '$trackingNumber'";
    $result_details = mysqli_query($con, $query_details);

    if ($result_details && mysqli_num_rows($result_details) > 0) {
        // Fetch the data from the query result
        $row = mysqli_fetch_assoc($result_details);
        $senderName = $row['sender_name'];
        $receiverName = $row['recipient_name'];
        $deliveryType = $row['delivery_type'];
        $serviceType = $row['service_type'];
        $weight = $row['package_weight'];
        $unit = $row['unit'];

		if ($deliveryType == 1) {
            $deliveryTypeT = "Deliver to Receiver's Address";
        } elseif ($deliveryType == 2) {
            $deliveryTypeT = "Pickup from Nearest Post Office";
        }

		if ($serviceType == 1) {
            $serviceTypeT = "Regular Mail";
        } elseif ($serviceType == 2) {
            $serviceTypeT = "Speed Post";
        } elseif ($serviceType == 3) {
            $serviceTypeT = "Registered Post";
        } else {
			$serviceTypeT = "Logi Post";
		}

		if ($unit == 1) {
            $unitT = "g";
        } elseif ($serviceType == 2) {
            $unitT = "kg";
        }

		echo '<ul class="todo-list">
    <li class="">
        <h4>Sender: ' . $senderName . '</h4>
    </li>
    <li class="">
        <h4>Receiver: ' . $receiverName . ' </h4>
    </li>
    <li class="">
        <h4>Delivery Type: ' . $deliveryTypeT . ' </h4>
    </li>
    <li class="">
        <h4>Service Type: ' . $serviceTypeT . ' </h4>
    </li>
    <li class="">
        <h4>Weight: ' . $weight . $unitT . ' </h4>
    </li>
</ul>';

        // Print the retrieved data
    
    } else {
        // No matching entry found in the packages table
        echo "No package found for the tracking number: " . $trackingNumber;
    }
}
?>




					
				</div>
				
				
			</div>
</main>
		<!-- MAIN -->
</section>
	<!-- CONTENT -->