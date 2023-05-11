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
            <div class="inputfield">
                <label>Display Name</label>
                <input type="text" class="input" name="fname" id="fname" required>
            </div>
            <div class="inputfield">
                <label>Address</label>
                <input type="text" class="input" name="fname" id="fname" required>
            </div>
            <div class="inputfield">
                <label>Phone Number</label>
                <input type="email" class="input" name="fname" id="fname" required>
            </div>
            <div class="inputfield">
                <label>Email</label>
                <input type="text" class="input" name="fname" id="fname" required>
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
                <input type="text" class="input" name="fname" id="fname" required>
            </div>
            <div class="inputfield">
                <label>Address</label>
                <input type="text" class="input" name="fname" id="fname" required>
            </div>
            <div class="inputfield">
                <label>Phone Number</label>
                <input type="email" class="input" name="fname" id="fname" required>
            </div>
            <div class="inputfield">
                <label>Email</label>
                <input type="text" class="input" name="fname" id="fname" required>
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
            <form method="post" id="add-package">
            <div class="form">
        <div class="inputfield">
        <label>Delivery Type</label>
        <div class="custom_select">
            <select name="branch_id" id="branch_id" required>
                <option value="" disabled selected>Please Select a Delivery Type</option>
                <option value="">Deliver to Receiver's Address</option>
                <option value="" >Pickup from Nearest Post Office</option>
            </select>
        </div>
        </div>
        <div class="inputfield">
        <label>Service Type</label>
        <div class="custom_select">
            <select name="branch_id" id="branch_id" required>
                <option value="" disabled selected>Please Select a Service Type</option>
                <option value="">Regular Mail</option>
                <option value="" >Speed Post</option>
                <option value="" >Registered Post</option>
                <option value="" >Logi Post</option>
            </select>
        </div>
        </div>  
        <div class="inputfield">
        <label>Size</label>
        <div class="custom_select">
            <select name="branch_id" id="branch_id" required>
                <option value="" disabled selected>Please Select a Size Type</option>
                <option value="">Regular Mail</option>
                <option value="" >Speed Post</option>
                <option value="" >Registered Post</option>
                <option value="" >Logi Post</option>
            </select>
        </div>
        </div>  
        <div class="inputfield">
            <label>Unit</label>
            <div class="custom_select">
            <select name="branch_id" id="branch_id" required>
                <option value="" disabled selected>Please Select a Weight Class</option>
                <option value="">In Grams</option>
                <option value="" >In Kilograms</option>
            </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Weight</label>
            <input type="text" class="input" name="fname" id="fname" required>
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
            <select name="branch_id" id="branch_id" required>
                <option value="" disabled selected>Please Select a Payment Method</option>
                <option value="">Card</option>
                <option value="" >Cash</option>
            </select>
            </div>
        </div>
        <div class="inputfield">
        <h3>Sub Total - Rs. 500.00 </h3>
        </div>
        <div class="inputfield">
        <h3>VAT % -  10%</h3>
        </div>
        <div class="inputfield">
        <h3>Total - Rs. 550.00</h3>
        </div>
        <div class="inputfield">
        <h4>Delivery Time - Package will be Delivered within 24 Hours</h4>
        </div>
        
        
        
            <div class="inputfield">
                <input type="submit" value="Add Package" class="btn" name="add_package">
            </div>    
            </div>
            </div>
</form>
        </div>
        
        </div>

        
    </div>
    <script>
  document.getElementById("add-package").addEventListener("submit", function(e) {
    e.preventDefault();

    Swal.fire({
      position: 'top-end',
      icon: 'question',
      title: 'Confirmation',
      text: 'Make sure that the Payment is Received before Adding',
      showConfirmButton: true,
      showCancelButton: true,
      confirmButtonText: 'Received',
  confirmButtonColor: '#28A745', // Success color
  cancelButtonText: 'Not Yet',
  cancelButtonColor: '#DC3545'
    }).then((result) => {
      if (result.isConfirmed) {
        // Proceed with form submission
        e.target.submit();
      } else {
        Swal.fire({
          position: 'top-end',
          icon: 'info',
          title: 'Adding Package Canceled',
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