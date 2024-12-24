<?php
    $cName = "user";
    $value = "TestData";
    setcookie($cName,$value,time() + 3600,"/");

    if(isset($_COOKIE['user'])){
        echo "cookie set";
    }else{
        echo "cookie Not set";   
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Global Variable Cooikie</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <?php
    
        // $_SESSION;
        // $_COOKIE; -> temporory data store in client server
        // setcookie(name,value,expire,path,domain, secure,httponly);
        // $_FILES; -->

        echo "<pre>";
        print_r($_COOKIE['user']);
        echo "</pre>";
           
    ?>
</body>
</html>
