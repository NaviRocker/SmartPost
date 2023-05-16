<!-- MAIN -->
<?php include('controllers/retrieveController.php'); ?>
<?php include('controllers/uploadController.php'); ?>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Add Domestic Post</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="?page=home">Home</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Add Package</a>
                </li>
            </ul>
        </div>
        
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h4>Sender's Information</h4>
            </div>
            <div class="wrapper">
            <div class="form">
            <form method="post" id="add_package">
            <div class="inputfield">
                <label>Display Name</label>
                <input type="text" class="input" name="sender_name" id="sender_name" required>
            </div>
            <div class="inputfield">
                <label>NIC Number</label>
                <input type="text" class="input" name="sender_nic" id="sender_nic" required>
            </div>
            <div class="inputfield">
                <label>Address</label>
                <input type="text" class="input" name="sender_address" id="sender_address" required>
            </div>
            <div class="inputfield">
                <label>Phone Number</label>
                <input type="text" class="input" name="sender_phone" id="sender_phone" required>
            </div>
            <div class="inputfield">
                <label>Email</label>
                <input type="email" class="input" name="sender_email" id="sender_email" required>
            </div>
            </div>
            </div>
        </div>
        <div class="order">
            <div class="head">
                <h4>Receiver's Information</h4>
            </div>
            <div class="wrapper">
            <div class="form">
            <div class="inputfield">
                <label>Display Name</label>
                <input type="text" class="input" name="recipient_name" id="recipient_name" required>
            </div>
            <div class="inputfield">
                <label>Address</label>
                <input type="text" class="input" name="recipient_address" id="recipient_address" required>
            </div>
            <div class="inputfield">
                <label>Phone Number</label>
                <input type="text" class="input" name="recipient_phone" id="recipient_phone" required>
            </div>
            <div class="inputfield">
                <label>Email</label>
                <input type="email" class="input" name="recipient_email" id="recipient_email" required>
            </div>
            <div class="inputfield">
                <label>Final Post Office</label>
                <div class="custom_select">
            <select name="nearest_postoffice" id="nearest_postoffice" required>
            <option value="" disabled selected>Please Select a Branch</option>
          <?php
						// Check if any branches were found
if (mysqli_num_rows($retrievePostOfficeLOL) > 0) {
    // Generate the options for the select drop-down
    while ($row = mysqli_fetch_assoc($retrievePostOfficeLOL)) {
        echo "<option value='" . $row['branch_shortcode'] . "'>" . $row['zip_code'] . " - " . $row['branch_name'] . "</option>";
    }
} else {
    echo "<option value=''>No Branches Found</option>";
}
						?>
            </select>
        </div>
        </div>
            </div>
            </div>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h4>Post Specification</h4>
            </div>
            <div class="wrapper">
            <div class="form">
        <div class="inputfield">
        <label>Delivery Type</label>
        <div class="custom_select">
            <select name="delivery_type" id="delivery_type" required>
                <option value="" disabled selected>Please Select a Delivery Type</option>
                <option value="1">Deliver to Receiver's Address</option>
                <option value="2" >Pickup from Nearest Post Office</option>
            </select>
        </div>
        </div>
        <div class="inputfield">
        <label>Service Type</label>
        <div class="custom_select">
            <select name="service_type" id="service_type" required>
                <option value="" disabled selected>Please Select a Service Type</option>
                <option value="1">Regular Mail</option>
                <option value="2" >Speed Post</option>
                <option value="3" >Registered Post</option>
                <option value="4" >Logi Post</option>
            </select>
        </div>
        </div>  
        <div class="inputfield">
        <label>Dimensions</label>
        <div class="custom_select">
            <select name="size" id="size" required>
                <option value="" disabled selected>Please Select a Size Type</option>
                <option value="1">Under 610mm x 300mm x 300mm</option>
                <option value="2" >Under 1070mm x 500mm x 500mm</option>
                <option value="3" >Over Sized</option>
            </select>
        </div>
        </div>  
        <div class="inputfield">
            <label>Unit</label>
            <div class="custom_select">
            <select name="unit" id="unit" required>
                <option value="" disabled selected>Please Select a Weight Class</option>
                <option value="1">In Grams</option>
                <option value="2" >In Kilograms</option>
            </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Weight</label>
            <input type="text" class="input" name="weight" id="weight" required>
        </div>
    </div>  
            </div>
            </div>

            <div class="order">
            <div class="head">
                <h4>Summary</h4>
            </div>
            <div class="wrapper">
            <div class="form">
            <div class="inputfield">
            <label>Payment Method</label>
            <div class="custom_select">
            <select name="payment_type" id="payment_type" required>
                <option value="" disabled selected>Please Select a Payment Method</option>
                <option value="1">Card</option>
                <option value="2" >Cash</option>
            </select>
            </div>
        </div>
        <div class="inputfield">
        <h3 id = "output1"></h3>
        </div>
        <div class="inputfield">
        <h3 id = "output2"></h3>
        </div>
        <div class="inputfield">
        <h3 id = "output3"></h3>
        </div>
        <div class="inputfield">
        <h4 id = "output4"></h4>
        </div>
        <input type="hidden" name="sub_total" id="sub_total">
        <input type="hidden" name="final_price" id="final_price">
        
        
            <div class="inputfield">
                <input type="submit" value="Add Package" class="btn" name="add_package">
            </div>   
        
            </div>
            </div>
</form>
        </div>
        
        </div>

        
    </div>
    <script src="assets/js/postal_calculations.js"></script>

    <script>
  document.getElementById("add_package").addEventListener("submit", function(e) {
  e.preventDefault();

  Swal.fire({
    position: 'top-end',
    icon: 'question',
    title: 'Confirmation',
    text: 'Make sure that the Payment is Received',
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonText: 'Received',
    confirmButtonColor: '#28A745', // Success color
    cancelButtonText: 'Not Yet',
    cancelButtonColor: '#DC3545'
  }).then((result) => {
    if (result.isConfirmed) {
  // Remove the submit event listener
  document.getElementById("add_package").removeEventListener("submit", submitHandler);
  
  // Submit the form
  document.getElementById("add_package").submit();
} else {
  Swal.fire({
    position: 'top-end',
    icon: 'info',
    title: 'Adding Package Cancelled',
    showConfirmButton: false,
    timer: 1500
  });
} else {
      Swal.fire({
        position: 'top-end',
        icon: 'info',
        title: 'Adding Package Cancelled',
        showConfirmButton: false,
        timer: 1500
      });
    }
  });
});

</script>


            
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->