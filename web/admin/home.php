<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<?php include('controllers/retrieveController.php'); ?>
<!-- MAIN -->
<main>
			<div class="head-title">
				<div class="left">
					<h1>Welcome <?php echo $fetch_info['fname'] ?>!</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
</h3>
					</ul>
				</div>
			</div>
			<?php if (isset($_SESSION['type'])): ?>
    <?php if ($_SESSION['type'] == 1): ?>
		
    <?php elseif ($_SESSION['type'] == 2): ?>
        
		<h2>You are here to Manage <?php echo $branchName; ?></h2>
              
			
    <?php endif; ?>
<?php endif; ?>
			


			<ul class="box-info">
			<?php if (isset($_SESSION['type'])): ?>
    <?php if ($_SESSION['type'] == 1): ?>
		<li>
				<i class='bx bxs-buildings'></i>
					<span class="text">
						<h3><?php echo $postofficeCount ?> / 4738</h3>
						<p>Post Offices</p>
					</span>
				</li>
    <?php elseif ($_SESSION['type'] == 2): ?>
        
		<li>
				<i class='bx bxs-buildings'></i>
					<span class="text">
						<h3><?php echo $rowCountEmp ?></h3>
						<p>Branch Employees</p>
					</span>
				</li>
               
			
    <?php endif; ?>
<?php endif; ?>
				
				<li>
				<i class='bx bxs-building-house'></i>
					<span class="text">
						<h3><?php echo $agencyCount ?></h3>
						<p>Agencies</p>
					</span>
				</li>
				<?php if (isset($_SESSION['type'])): ?>
    <?php if ($_SESSION['type'] == 1): ?>
		<li>
				<i class='bx bxs-book-add' ></i>
					<span class="text">
						<h3>12</h3>
						<p>Complains</p>
					</span>
				</li>
    <?php elseif ($_SESSION['type'] == 2): ?>
        <li>
				<i class='bx bxs-book-add' ></i>
					<span class="text">
						<h3>02</h3>
						<p>Branch Complains</p>
					</span>
				</li>
			
    
    <?php endif; ?>
<?php endif; ?>
				
			</ul>


			<div class="table-data">
				<div class="order">
					
						<h3>Newly Added Post Master</h3>
					
					<table>
						<tbody>
							<tr><?php
							if ($adminResult && mysqli_num_rows($adminResult) > 0) {
    // Fetch the row data
    $adminRow = mysqli_fetch_assoc($adminResult);

    
    
    // Print the data of the last entry
    echo '<td><p>' . $adminRow['fname'] . ' ' . $adminRow['lname'] . '</p></td>
<td><p>' . $adminRow['branch_name'] . '</p></td>';


} ?>
								<td><span class="status completed">View</span></td>
							</tr>
						</tbody>
						
					</table>
					<br>
						<h3>Newly Added Post Office</h3>
					
					<table>
						<tbody>
							<tr><?php
							if ($postofficeResult && mysqli_num_rows($postofficeResult) > 0) {
    // Fetch the row data
    $postofficeRow = mysqli_fetch_assoc($postofficeResult);

    
    
    // Print the data of the last entry
    echo '<td><p>' . $postofficeRow['branch_shortcode'] . ' - ' . $postofficeRow['branch_name'] . '</p></td>
<td><p>' . $postofficeRow['zip_code'] . '</p></td>
<td><p>' . $postofficeRow['contact'] . '</p></td>';


} ?>
								
								
								<td><span class="status completed">View</span></td>
							</tr>
						</tbody>
						
					</table>
					<br>
						<h3>Newly Added Middle Agency</h3>
					
					<table>
						<tbody>
							<tr>
								<?php
							if ($agencyResult && mysqli_num_rows($agencyResult) > 0) {
    // Fetch the row data
    $agencyRow = mysqli_fetch_assoc($agencyResult);

    
    
    // Print the data of the last entry
    echo '<td><p>' . $agencyRow['agency_shortcode'] . ' - ' . $agencyRow['agency_name'] . '</p></td>
<td><p>' . $agencyRow['zip_code'] . '</p></td>
<td><p>' . $agencyRow['contact'] . '</p></td>';


} ?>
								<td><label class="status completed btnn" for="modal-1">View</label></td>
							</tr>
						</tbody>
					</table>
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

	<input class="modal-state" id="modal-1" type="checkbox" />
<div class="modal">
  <label class="modal__bg" for="modal-1"></label>
  <div class="modal__inner">
    <label class="modal__close" for="modal-1"></label>
    <h2>Caaaats FTW!</h2>
    Aliquam in sagittis nulla. Curabitur euismod diam eget risus venenatis, sed dictum lectus bibendum. Nunc nunc nisi, hendrerit eget nisi id, rhoncus rutrum velit. Nunc vel mauris dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam fringilla quis nisi eget imperdiet.</p>
  </div>
</div>