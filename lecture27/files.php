<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
</head>
<body>
    
    <?php

        if(isset($_FILES['image'])){
            echo $_SERVER['PHP_SELF'];
            echo "<pre>";
            print_r($_FILES['image']);
            echo "</pre>";

            $name = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];

            // echo $name;
           $r = move_uploaded_file($tmp_name,"images/".$name);
           echo $r;
           if($r){
             echo "Image Upload Sucessfully";
           }else{
                echo "ERROR";
           }

        }

    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype='multipart/form-data'>
        <input type="file" name="image" value="">
        <br>
        <input type="submit" value="Submit">
    </form>


</body>
</html>