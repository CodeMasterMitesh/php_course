<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Global Variable</title>
</head>
<body>
    
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="">Enter Name</label>
    <input type="text" value="" name="fname">
    <br>
    <label for="">Last Name</label>
    <input type="text" value="" name="lname">
    <br>
    <label for="">Mobile Number</label>
    <input type="text" value="" name="mobile">
    <br>
    <label for="">Email</label>
    <input type="email" value="" name="email">
    <br>
    <input type="submit" value="Submit">
</form>

  <?php 
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";

    echo "<pre>";
    print_r($_SERVER['PHP_SELF']);
    echo "<br>";
    print_r($_SERVER);
    echo "</pre>";
  ?>
        <!-- // $_GET;
        // $_POST;
        // $_SERVER;

        // $_REQUEST;
        // $_SESSION;
        // $_COOKIE;
        // $_FILES; -->
    

</body>
</html>