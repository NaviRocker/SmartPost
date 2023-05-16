<?php
    require_once('../lib/db.php');
    require_once('Customer.php');

    //Instantiate customer
    $customer = new Customer();

    //Get customer
    $customers = $customer->getCustomers();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>View Customers</title>
</head>
<body>
    <div class="container mt-4">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-primary" style="text-decoration:none;">Customers</a>
            <a href="transactions.php" class="btn btn-secondary" style="text-decoration:none;">Transactions</a>
        </div>
        <hr>
        <h2>Customers</h2>
        <table class="table table-striped" id="myTable">
            <thead style="background-color:red; color:white">
                <tr>
                    <th>Customer ID</th>
                    <th>Vehicle Number</th>
                    <th>address</th>
                    <th>date</th>
                    <th>DLNo</th>
                    <th>PStation</th>
                    <th>NIC</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $c): ?>
                    <tr>
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo $c['vehicleNo']; ?></td>
                    <td><?php echo $c['address']; ?></td>
                    <td><?php echo $c['date']; ?></td>
                    <td><?php echo $c['DLNo']; ?></td>
                    <td><?php echo $c['PStation']; ?></td>
                    <td><?php echo $c['NIC']; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['amount']; ?></td>
                    <td><?php echo isset($c['created_at']) ? $c['created_at'] : ''; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <p><a href="index.php">Pay Page</p>
    </div>
    <script>
	$(document).ready(function() {
		let table = $('#myTable').DataTable({
			"searching": true,
			"language": {
				"searchPlaceholder": "Search table data"
			}
		});
	});
</script>
</body>
</html>