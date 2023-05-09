<?php
  include('header.php');
  include('sidebar.php');
?>

<?php
  $page = $_GET['page']; // Get the page parameter from the URL
  
  // Define the file path for the main content based on the page parameter
  $file = "./{$page}.php";
  
  // Check if the file exists, and include it if it does
  if (file_exists($file)) {
    include($file);
  } else {
    include('404.php'); // If the file doesn't exist, show a 404 page
  }
?>

<?php
  include('footer.php');
?>