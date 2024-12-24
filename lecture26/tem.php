<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporory Page</title>
</head>
<body>
    <?php


        // echo $_SESSION['name'];
        // echo "<br>";
        // echo $_SESSION['id'];
        // echo "<br>";
        // echo $_SESSION['age'];


        echo "<pre>";
        print_r($_COOKIE['user']);
        echo "</pre>";

    ?>
</body>
</html>