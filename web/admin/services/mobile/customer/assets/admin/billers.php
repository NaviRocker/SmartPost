<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Biller Information</title>
</head>
<body>

<div class="transactions">
    <h2 class="header">Biller Information</h2> 
        <a href='index.php' style="text-decoration:none;"><button class="add">+ Add Biller</button><br>    
            <?php
                require_once('insert.php');

                $query = "select * from utilityBills";
                $run = mysqli_query($conn, $query);
                $check = mysqli_num_rows($run) > 0;

                if($check){
                    while($row = mysqli_fetch_assoc($run)){

                ?>

                <div class="row" > 
                    <div class="card">
                        <img src="assets/<?php echo $row['img'];?>" class="card-img" alt="Biller Images">
                                        
                            <div class="card-contemt">
                                <a href="#" style="text-decoration:none;"><h3><?php echo $row['name']; ?></h3>
                                <p class="card-text"><?php echo $row['description']; ?></p></a>
                                <input type="hidden" name="type" value="<?php echo $row ['type']?>">
                                            
                                <div class=rmv-btn>
                                    <form action="deleteBiller.php" method="post" style="border:none; box-shadow: none">
                                        <input type="hidden" name="id" value="<?php echo $row ['id']?>">
                                            <span><input type="submit" name="delete" class="card-delete" value="Remove"></span>
                                    </form>
                                </div>                  
                            </div>                        
                    </div>
                </div>

                    <?php
     
                }
                    }
                    else{
                        echo "No Data Found";
                    }

                    ?>
            </tr>  
        </table>
    </div>
</body>
</html>