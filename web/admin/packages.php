<!-- MAIN -->
<?php include('controllers/adminAuthController.php'); ?>
<?php include('controllers/retrieveController.php'); ?>
<main>
			<div class="head-title">
				<div class="left">
					<h1>Package Management</h1>
					<ul class="breadcrumb">
						<li>
							<a href="?page=home">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Package Management</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Packages</h3>
					</div>
					<?php
if ($packages_result && $packages_result->num_rows > 0) {
  echo '<table>';
  echo '<tr><th>Tracking No.</th><th>From</th><th>Payment Method</th><th>Receiver</th></tr>';

  while ($row = $packages_result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['tracking_number'] . '</td>';
    echo '<td>' . $row['sender_name'] . '</td>';
    echo '<td>';
    if ($row['payment_method'] == 1) {
      echo 'Card';
    } elseif ($row['payment_method'] == 2) {
      echo 'Cash';
    }
    echo '</td>';
    echo '<td>' . $row['recipient_name'] . '</td>';
    echo '</tr>';
  }

  echo '</table>';
}
?>

				</div>
				<div class="todo">
					
						<h3>Statistics (<?php echo $currentDate ?>)</h3>
						<br>
						
					
					<ul class="todo-list">
						<li class="">
							<p>Regular Mail: <?php echo $count_regular ?></p>
						</li>
						<li class="">
							<p>Speed Post: <?php echo $count_speed ?></p>
						</li>
						<li class="">
							<p>Registered Post: <?php echo $count_register ?></p>
						</li>
						<li class="">
							<p>Logi Post: <?php echo $count_logi ?></p>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->