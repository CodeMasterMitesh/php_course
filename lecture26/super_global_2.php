<?php 
    session_start(); 
    $name = "Mitesh";
    $id = 1;
    $age = 31;
    // include("config.php");
    // print_r($_SESSION);
    if(!$_SESSION['id']){
        echo "Login First";
    }else{
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Global Variable</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <?php
    
     // $_SESSION;
        // $_COOKIE; -> temporory data store in client server
        setcookie(name,value,expire,path,domain, secure,httponly);
        // $_FILES; -->

    // step 1) session_start();
    // step 2) detaile of what data you want to store in session 
    // step 3 session destroy and session unset 
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        $_SESSION['age'] = $age;

            echo $_SESSION['name'];
            echo "<br>";
            echo $_SESSION['id'];
        
           
            session_unset();
            session_destroy();
    ?>
</body>
</html>
<?php
    }
