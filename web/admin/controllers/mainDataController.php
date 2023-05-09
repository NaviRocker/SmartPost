<?php 
    $admin_icon = mysqli_fetch_array(mysqli_query($con, "SELECT img FROM admin WHERE id = 1"))[0];
 ?>