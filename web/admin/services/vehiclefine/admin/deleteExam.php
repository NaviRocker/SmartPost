<?php
    $host="localhost";
    $Hname="root";
    $Hpwd="";
    $dbname =  "payments";
    $conn=mysqli_connect($host,$Hname,$Hpwd,$dbname); 

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $query = "DELETE from exams WHERE id='$id'";
        $run = mysqli_query($conn, $query);

        if($run){
            header("location:exams.php");
        }
        else{
            echo '<script>alert("Data not deleted")</script>';
        }
    }

?>