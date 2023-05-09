<?php 
  // Start the session

  // Check if the user is logged in
  if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    // If the user is not logged in, redirect them to the login page
    header('Location: login-user.php');
    exit();
  }
?>
<title>Home | SmartPost</title>
</head>
<body>
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <img src="./assets/img/logo.png" alt="SmartPost Logo" class="brand-img">
        <span class="text">SmartPost</span>
    </a>
		<ul class="side-menu top">
			<li class="" id="home">
				<a href="?page=home">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="" id="postoffice_management">
				<a href="?page=postoffice_management">
                    <i class='bx bxs-buildings' ></i>
					<span class="text">Post Office Management</span>
				</a>
			</li>
			<li class="" id="user_management">
				<a href="?page=user_management">
                    <i class='bx bxs-user-detail' ></i>
					<span class="text">User Management</span>
				</a>
			</li>
			<li class="" id="packages">
				<a href="?page=packages">
                    <i class='bx bxs-package' ></i>
					<span class="text">Packages</span>
				</a>
			</li>
            <li class="" id="track">
				<a href="?page=track">
                <i class='bx bx-qr-scan' ></i>
					<span class="text">Track a Package</span>
				</a>
			</li>
			<li class="" id="postage">
				<a href="?page=postage">
                <i class='bx bxs-envelope' ></i>
					<span class="text">Postage</span>
				</a>
			</li>
            <li class="" id="services">
				<a href="?page=services">
                <i class='bx bx-list-ul' ></i>
					<span class="text">Services</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
            <li class="" id="reports">
				<a href="?page=reports">
                <i class='bx bxs-report' ></i>
					<span class="text">Reports</span>
				</a>
			</li>
            <li class="" id="analytics">
				<a href="?page=analytics">
                <i class='bx bx-stats' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
            <li class="" id="customer_support">
				<a href="?page=customer_support">
                <i class='bx bx-support' ></i>
					<span class="text">Customer Support</span>
				</a>
			</li>
			<li class="" id="settings">
				<a href="?page=settings">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
            <li class="" id="help">
				<a href="?page=help">
                <i class='bx bxs-help-circle' ></i>
					<span class="text">Help</span>
				</a>
			</li>
			<li>
				<a href="./logout-user.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Get the value of the "page" parameter from the URL
    var page = '<?php echo $_GET["page"]; ?>';
    
    // Add the "active" class to the list item with the corresponding id
    $('#' + page).addClass('active');
    
    // Add a click event listener to the list items
    $('.sidebar-menu li').click(function() {
      // Remove the "active" class from all list items
      $('.sidebar-menu li').removeClass('active');
      
      // Add the "active" class to the clicked list item
      $(this).addClass('active');
    });
  });
</script>
