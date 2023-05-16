<!-- MAIN -->
<?php include('controllers/retrieveController.php'); ?>
<?php include('controllers/uploadController.php'); ?>
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
      <?php if (isset($_SESSION['type'])): ?>
    <?php if ($_SESSION['type'] == 1): ?>
		
   

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
        } elseif ($row['type'] == 4) {
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
						<h3>Add New Post Master</h3>
					</div>
					<div class="wrapper">
					<form method="post" id="add-adminuser">
  <div class="form">
    <div class="inputfield">
      <label>First Name</label>
      <input type="text" class="input" name="fname" id="fname" required>
    </div>  
    <div class="inputfield">
      <label>Last Name</label>
      <input type="text" class="input" name="lname" id="lname" required>
    </div>  
    <div class="inputfield">
      <label>Email</label>
      <input type="email" class="input" name="email" id="email" required>
    </div>  
    <div class="inputfield">
      <label>Password</label>
      <input type="password" class="input" name="password" id="password" required>
    </div> 
	<div class="inputfield">
      <label>Confirm Password</label>
      <input type="password" class="input" name="confirm_password" id="confirm_password" required>
    </div>  
    <div class="inputfield">
      <label>Post Office</label>
      <div class="custom_select">
        <select name="branch_id" id="branch_id" required>
		<option value="" disabled selected>Please Select a Branch</option>
          <?php
						// Check if any branches were found
if (mysqli_num_rows($retrieveAvailablePostOffice) > 0) {
    // Generate the options for the select drop-down
    while ($row = mysqli_fetch_assoc($retrieveAvailablePostOffice)) {
        echo "<option value='" . $row['id'] . "'>" . $row['branch_name'] . "</option>";
    }
} else {
    echo "<option value=''>No branches found</option>";
}
						?>
        </select>
      </div>
    </div>  
    <div class="inputfield">
      <input type="submit" value="Add New User" class="btn" name="add_adminuser">
    </div>
  </div>
</form>

<script>
  document.getElementById("add-adminuser").addEventListener("submit", function(e) {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
		Swal.fire({
		position: 'top-end',
        icon: 'error',
        text: 'Password and Confirm Password do not match.',
        showConfirmButton: false,
		timer: 1500

      }); // Prevent form submission
      e.preventDefault();
	  
    }
  });
</script>
				</div>
			</div>

      <?php elseif ($_SESSION['type'] == 2): ?>
        
			
        <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Add New Postal Staff</h3>
					</div>
          <div class="wrapper">
					<form method="post" id="addstaff">
  <div class="form">
    <div class="inputfield">
      <label>First Name</label>
      <input type="text" class="input" name="fname" id="fname" required>
    </div>  
    <div class="inputfield">
      <label>Last Name</label>
      <input type="text" class="input" name="lname" id="lname" required>
    </div>  
    <div class="inputfield">
      <label>Email</label>
      <input type="email" class="input" name="email" id="email" required>
    </div>  
    <div class="inputfield">
      <label>Password</label>
      <input type="password" class="input" name="password" id="password" required>
    </div> 
	<div class="inputfield">
      <label>Confirm Password</label>
      <input type="password" class="input" name="confirm_password" id="confirm_password" required>
    </div>  
    
    <div class="inputfield">
      <input type="submit" value="Add New User" class="btn" name="add_staff">
    </div>
  </div>
</form>

<script>
  document.getElementById("add-staff").addEventListener("submit", function(e) {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
		Swal.fire({
		position: 'top-end',
        icon: 'error',
        text: 'Password and Confirm Password do not match.',
        showConfirmButton: false,
		timer: 1500

      }); // Prevent form submission
      e.preventDefault();
	  
    }
  });
</script>
				</div>
					
				</div>
				<div class="order">
        <div class="head">
						<h3>Add New Postman</h3>
					</div>

          <div class="wrapper">
					<form method="post" id="add-postman">
  <div class="form">
    <div class="inputfield">
      <label>First Name</label>
      <input type="text" class="input" name="fname" id="fname" required>
    </div>  
    <div class="inputfield">
      <label>Last Name</label>
      <input type="text" class="input" name="lname" id="lname" required>
    </div>  
    <div class="inputfield">
      <label>Email</label>
      <input type="email" class="input" name="email" id="email" required>
    </div>  
    <div class="inputfield">
      <label>Password</label>
      <input type="password" class="input" name="password" id="password" required>
    </div> 
	<div class="inputfield">
      <label>Confirm Password</label>
      <input type="password" class="input" name="confirm_password" id="confirm_password" required>
    </div>  
    <div class="inputfield">
      <input type="submit" value="Add New User" class="btn" name="add_postman">
    </div>
  </div>
</form>

<script>
  document.getElementById("add-postman").addEventListener("submit", function(e) {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
		Swal.fire({
		position: 'top-end',
        icon: 'error',
        text: 'Password and Confirm Password do not match.',
        showConfirmButton: false,
		timer: 1500

      }); // Prevent form submission
      e.preventDefault();
	  
    }
  });
</script>
				</div>
				</div>
			</div>           
          
        <?php endif; ?>
    <?php endif; ?>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->