<?php
  // Query the database to retrieve the data
  $retrievePostOffice = mysqli_query($con, 'SELECT branch_shortcode, branch_name, zip_code, contact FROM postoffice WHERE status = 1 ORDER BY id DESC LIMIT 7');
  $mainPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type = 1"));
  $subPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type = 2"));
  $agencyPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type = 3"));
  $otherPostOfficeCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM postoffice WHERE type IN (4, 5)"));

  $PostMasterCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 2"));
  $PostalStaffCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 3"));
  $PostManCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 4"));
  $MiddleAgentCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM admin WHERE type = 5"));
  $retrieveEmployee = mysqli_query($con, 'SELECT admin.fname, admin.lname, admin.type, PostOffice.branch_name FROM admin LEFT JOIN PostOffice ON admin.branch_id = PostOffice.id WHERE admin.status = "verified" ORDER BY admin.id DESC LIMIT 5');


?>