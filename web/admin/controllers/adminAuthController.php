<?php
    if(!isset($_SESSION['email']) || empty($_SESSION['email']) || ($_SESSION['type'] != 1 && $_SESSION['type'] != 2 && $_SESSION['type'] != 3)) {
        echo "<script>window.location = './index.php?page=403';</script>";
        exit;
    } 
?>
