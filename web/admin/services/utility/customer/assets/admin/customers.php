<?php
    require_once('../config/db.php');
    require_once('../lib/pdo_db.php');
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $c): ?>
                    <tr>
                        <td><?php echo $c->id; ?></td>
                        <td><?php echo $c->name; ?></td>
                        <td><?php echo $c->email; ?></td>
                        <td><?php echo $c->amount; ?></td>
                        <td><?php echo $c->created_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <p><a href="index.php">Pay Page</p>
    </div>

</body>
</html>