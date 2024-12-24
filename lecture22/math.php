<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Functions</title>
</head>
<body>
    <?php

        $num = 25.2;
        // ceil conevrt int value up side 
        echo ceil($num);
        echo "<br>";
        // ceil()
        // floor means remove after point value 
        echo floor($num);
        // abs()
        echo "<br>";
        $num1 = -4.2;
        $num2 = 4.6;
       echo abs($num1);
       echo "<br>";
       echo abs($num2);
        // round()
        echo "<br>";
     echo round($num1);
     echo "<br>";
     echo round($num2);
     echo "<br>";
        // sqrt()
        $s = 4;
       echo sqrt($s);
        // pow()
       echo "<br>";
       $base = 19;
       $exp = 3;
       echo pow($base,$exp);
        // intdiv()
        echo "<br>";
       echo intdiv($base,$exp);
        // rand()
        echo "<br>";
        echo rand(15,50);
        echo "<br>";
       echo  mt_rand(15,50);
       echo "<br>";
        echo lcg_value();
    ?>
</body>
</html>