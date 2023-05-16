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
    <div class="" style="max-width:100%">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-primary" style="text-decoration:none;">Customers</a>
            <a href="transactions.php" class="btn btn-secondary" style="text-decoration:none;">Transactions</a>
        </div>
        <hr>
        <h2>Customers</h2>
        <center><table class="table table-striped" id="myTable">
            <thead style="background-color: red; color:white">
                <tr>
                    <th>Customer ID</th>
                    <th>Account Number</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $c): ?>
                    <tr>
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td><?php echo $c['accNo']; ?></td>
                    <td><?php echo $c['fname']; ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['amount']; ?></td>
                    <td><?php echo isset($c['created_at']) ? $c['created_at'] : ''; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table></center>
        <br>
        <p><a href="index.php">Pay Page</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="../js/charge.js"></script>
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