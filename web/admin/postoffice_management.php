<?php include('controllers/retrieveController.php'); ?>
<?php include('controllers/adminAuthController.php'); ?>
<?php include('controllers/uploadController.php'); ?>

<main>
			<div class="head-title">
				<div class="left">
					<h1>Post Office Management</h1>
					<ul class="breadcrumb">
						<li>
							<a href="?page=home">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Post Office Management</a>
						</li>
					</ul>
				</div>
			</div>

			
      <?php if (isset($_SESSION['type'])): ?>
    <?php if ($_SESSION['type'] == 1): ?>
      <ul class="box-info">
      <li>
                <i class='bx bxs-buildings'></i>
					<span class="text">
						<h3><?php echo $mainPostOfficeCount['count']; ?></h3>
						<p>Main Branches</p>
					</span>
				</li>
				<li>
                <i class='bx bxs-building-house'></i>
					<span class="text">
						<h3><?php echo $subPostOfficeCount['count']; ?></h3>
						<p>Sub Branches</p>
					</span>
				</li>
                <li>
                <i class='bx bxs-home'></i>
					<span class="text">
						<h3><?php echo $agencyPostOfficeCount['count']; ?></h3>
						<p>Postal Agencies</p>
					</span>
				</li>
				<li>
                <i class='bx bxs-tree'></i>
					<span class="text">
						<h3><?php echo $otherPostOfficeCount['count']; ?></h3>
						<p>Rural/Estate</p>
					</span>
				</li>
    </ul>
    <?php elseif ($_SESSION['type'] == 2): ?>
      <ul class="box-info">
      <li>
                <i class='bx bxs-buildings'></i>
					<span class="text">
						<h3><?php echo $mainPostOfficeCount['count']; ?></h3>
						<p>Postal Staff</p>
					</span>
				</li>
				<li>
                <i class='bx bxs-building-house'></i>
					<span class="text">
						<h3><?php echo $subPostOfficeCount['count']; ?></h3>
						<p>Postmen</p>
					</span>
				</li>
                <li>
                <i class='bx bxs-home'></i>
					<span class="text">
						<h3><?php echo $agencyPostOfficeCount['count']; ?></h3>
						<p>Agency Postoffices</p>
					</span>
				</li>
				<li>
                <i class='bx bxs-tree'></i>
					<span class="text">
						<h3>6</h3>
						<p>Services</p>
					</span>
				</li>
        </ul>
    <?php elseif ($_SESSION['type'] == 3): ?>            
			
    <?php endif; ?>
<?php endif; ?>
				
			
            
<?php if (isset($_SESSION['type'])): ?>
    <?php if ($_SESSION['type'] == 1): ?>
      <div class="table-data-container">
  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>Recently Added Branches</h3>
      </div>
      <table>
        <thead>
          <tr>
            <th>Branch</th>
            <th>ZIP Code</th>
            <th>Contact Number</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
while ($row = mysqli_fetch_assoc($retrievePostOffice)): 
    ?>
      <tr>
        <td><?php echo $row['branch_shortcode']; ?> - <?php echo $row['branch_name']; ?></td>
        <td><?php echo $row['zip_code']; ?></td>
        <td><?php echo $row['contact']; ?></td>
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
        <h3>Add New Branch</h3>
      </div>
      <div class="wrapper">
	  <form method="post" id="add-branch-form">
  <div class="form">
    <div class="inputfield">
      <label>Branch Shortcode</label>
      <input type="text" class="input" name="branch_shortcode" id="branch_shortcode" required>
    </div>  
    <div class="inputfield">
      <label>Branch Name</label>
      <input type="text" class="input" name="branch_name" id="branch_name" required>
    </div>  
    <div class="inputfield">
      <label>Street</label>
      <input type="text" class="input" name="street" id="street" required>
    </div>  
    <div class="inputfield">
      <label>City</label>
      <input type="text" class="input" name="city" id="city" required>
    </div>  
    <div class="inputfield">
      <label>District</label>
      <div class="custom_select">
        <select name="district" id="district" required>
          <option value="Kandy">Kandy</option>
          <option value="Colombo">Colombo</option>
          <option value="Matale">Matale</option>
          <option value="Kalutara">Kalutara</option>
          <option value="Gampaha">Gampaha</option>
          <option value="Kegalle">Kegalle</option>
          <option value="Kurunegala">Kurunegala</option>
        </select>
      </div>
    </div> 
    <div class="inputfield">
      <label>Postal Code</label>
      <input type="text" class="input" name="zip_code" id="zip_code" required>
    </div> 
    <div class="inputfield">
      <label>Contact Number</label>
      <input type="text" class="input" name="contact" id="contact" required>
    </div> 
    <div class="inputfield">
      <label>Post Office Type</label>
      <div class="custom_select">
        <select name="type" id="type" required>
          <option value="1">Main Post Office</option>
          <option value="2">Sub Post Office</option>
          <option value="3">Agency Post Office</option>
          <option value="4">Rural Post Office</option>
          <option value="5">Estate Post Office</option>
        </select>
      </div>
    </div>   
    <div class="inputfield">
      <input type="submit" value="Add New Branch" class="btn" name="add_postoffice">
    </div>
  </div>
</form>


	</div>
    </div>
  </div>
  
</div>
<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recently Added Agencies</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Agency</th>
								<th>City</th>
								<th>Contact</th>
							</tr>
						</thead>
						<tbody>
          <?php  if ($agencyResultA && mysqli_num_rows($agencyResultA) > 0) {
    // Loop through the agencies and print the details
    while ($agencyRowA = mysqli_fetch_assoc($agencyResultA)) {
        $agencyId = $agencyRowA['agency_shortcode'];
        $agencyName = $agencyRowA['agency_name'];
        $agencyCity = $agencyRowA['city'];
        $agencyContact = $agencyRowA['contact'];

        echo '<tr>
        <td>
          <p>'.$agencyId.' - '.$agencyName.'</p>
        </td>
        <td>'.$agencyCity.'</td>
        <td>'.$agencyContact.'</td>
      </tr>';
        // Print the agency details
      
    }
} else {
    // No agencies found
    echo "No agencies found.";
} ?>
							
							
							
						</tbody>
					</table>
				</div>
				<div class="todo">
      <div class="head">
        <h3>Add New Agency</h3>
      </div>
      <div class="wrapper">
	  <form method="post" id="add-agency">
  <div class="form">
    <div class="inputfield">
      <label>Agency Shortcode</label>
      <input type="text" class="input" name="agency_shortcode" id="agency_shortcode" required>
    </div>  
    <div class="inputfield">
      <label>Agency Name</label>
      <input type="text" class="input" name="agency_name" id="agency_name" required>
    </div>  
    <div class="inputfield">
      <label>Street</label>
      <input type="text" class="input" name="street" id="street" required>
    </div>  
    <div class="inputfield">
      <label>City</label>
      <input type="text" class="input" name="city" id="city" required>
    </div>  
    <div class="inputfield">
      <label>Nearest Post Office</label>
      <div class="custom_select">
        <select name="nearest_postoffice" id="nearest_postoffice" required>
          <?php
						// Check if any branches were found
if (mysqli_num_rows($postOfficeDropdown) > 0) {
    // Generate the options for the select drop-down
    while ($row = mysqli_fetch_assoc($postOfficeDropdown)) {
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
      <label>Postal Code</label>
      <input type="text" class="input" name="zip_code" id="zip_code" required>
    </div> 
    <div class="inputfield">
      <label>Contact Number</label>
      <input type="text" class="input" name="contact" id="contact" required>
    </div>
	<div class="inputfield">
      <label>Email Address</label>
      <input type="email" class="input" name="email" id="email" required>
    </div>
	<div class="inputfield">
      <label>Agency Password</label>
      <input type="password" class="input" name="password" id="password" required>
    </div>  
    <div class="inputfield">
      <input type="submit" value="Add New Agency" class="btn" name="add_agency">
    </div>
  </div>
</form>


	</div>
    </div>
				
			</div>
    <?php elseif ($_SESSION['type'] == 2): ?>
        
			
                
			
    <?php endif; ?>
<?php endif; ?>



		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	