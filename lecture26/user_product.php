<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Product Page</title>
</head>
<body>
    
    <h1>User Product Page</h1>
    <a href="logout.php">Logout</a>

    <?php
        if(!$_SESSION['id']){
            print_r("No Data Found");
        }else{
            echo "Product Details";
        }

    ?>


</body>
</html>