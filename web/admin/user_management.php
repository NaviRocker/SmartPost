<!-- MAIN -->
<?php include('controllers/retrieveController.php'); ?>
<main>
			<div class="head-title">
				<div class="left">
					<h1>User Management</h1>
					<ul class="breadcrumb">
						<li>
							<a href="?page=home">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">User Management</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
                <i class='bx bxs-user-voice'></i>
					<span class="text">
						<h3><?php echo $PostMasterCount['count']; ?></h3>
						<p>Post Masters</p>
					</span>
				</li>
				<li>
                <i class='bx bxs-user-check' ></i>
					<span class="text">
						<h3><?php echo $PostalStaffCount['count']; ?></h3>
						<p>Postal Staff</p>
					</span>
				</li>
                <li>
                <i class='bx bx-user-plus' ></i>
					<span class="text">
						<h3><?php echo $PostManCount['count']; ?></h3>
						<p>Post Men</p>
					</span>
				</li>
				<li>
                <i class='bx bx-user-x' ></i>
					<span class="text">
						<h3><?php echo $MiddleAgentCount['count']; ?></h3>
						<p>Middle Agents</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recently Added Users</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Employee</th>
                                <th>Role</th>
								<th>Branch</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                        <?php 
// Query the database for the latest 5 verified admins and their associated branch names

while ($row = mysqli_fetch_assoc($retrieveEmployee)): 
?>
  <tr>
    <td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
    <td>
      <?php if ($row['type'] == 1) {
          echo 'Admin';
        } elseif ($row['type'] == 2) {
          echo 'Post Master';
        } elseif ($row['type'] == 3) {
          echo 'Postal Staff';
        } elseif ($row['type'] == 5) {
          echo 'Post Man';
        } else {
          echo 'Unknown Role';
        }
      ?>
    </td>
    <td>
      <?php if ($row['branch_name'] == null) {
          echo 'All Access';
        } else {
          echo $row['branch_name'];
        }
      ?>
    </td>
    <td><span class="status completed"> Completed</span></td>
  </tr>
<?php 
endwhile; 
?>

							
					
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Add New User</h3>
					</div>
					<div class="wrapper">
    	<div class="form">
			<div class="inputfield">
				<label>First Name</label>
				<input type="text" class="input">
			</div>  
				<div class="inputfield">
				<label>Last Name</label>
				<input type="text" class="input">
			</div>  
			<div class="inputfield">
				<label>Password</label>
				<input type="password" class="input">
			</div>  
			<div class="inputfield">
				<label>Confirm Password</label>
				<input type="password" class="input">
			</div> 
				<div class="inputfield">
				<label>Gender</label>
				<div class="custom_select">
					<select>
					<option value="">Select</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
					</select>
				</div>
			</div> 
			<div class="inputfield">
			<label>Email Address</label>
			<input type="text" class="input">
			</div> 
			<div class="inputfield">
				<label>Phone Number</label>
				<input type="text" class="input">
			</div> 
			<div class="inputfield">
				<label>Address</label>
				<textarea class="textarea"></textarea>
			</div> 
			<div class="inputfield">
				<label>Postal Code</label>
				<input type="text" class="input">
			</div>  
			<div class="inputfield">
				<input type="submit" value="Register" class="btn">
			</div>
    	</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->