<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <?php

    // index array

    $colors1 = array('blue',"green","yellow","black","pink");
            // 0       1          2     3       4  
    $colors = ['blue',"green","yellow","black","pink"];

    // in array any datatype you can store
    $employee = ['Mitesh',"Prajapati",31,55.55,true];

    echo "<pre>";
    // var_dump($colors);
    // var_dump($colors1);
    echo "</pre>";

    // echo $colors[0];
    // echo $colors[1];
    // echo $colors[2];
    // echo $colors[3];
    // echo $colors[4];

    for ($i=0; $i < 5 ; $i++) { 
        echo $colors[$i] . "<br>";
    }

    ?>

</body>
</html>