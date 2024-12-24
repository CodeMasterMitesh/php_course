<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparision Operators</title>
</head>
<body>
    

    <?php
        $x  = 30;
        $y = 25;
        // <> NOt Equalto
        // != NOt Equalto
        // $ans = $x != $y;
        $ans = $x <> $y;

        // var_dump($ans);

        echo "<br>";
        // ans boolean true or flase 

        // > Greterthan

            $num1  = 30;
            $num2 = 25;

            $a = $num1 > $num2;
            
            var_dump($a);

            echo "<br>";
        // >= Greterthan equalto

            $num2  = 31;
            $num3 = 30;

            $b = $num2 >= $num3;
            
            var_dump($b);

            echo "<br>";

        // < lessthan 

        // expresion 
        $num4 = 15.15;
        $num5 = 16.45;

        $c = $num4 < $num5;  // true

        print_r($c);

        echo "<br>";

        // <= Less than equalto
        $num6 = 15.150;
        $num7 = 15.15;

        $d = $num6 <= $num7;  // true
        var_dump($d);

        echo "<br>";
        // <=> Spaceship
        //Returns an integer less than, equal to, or greater than zero, depending on if $ab is less than, equal to, or greater than $abc. Introduced in PHP 7.
        $ab = 14;
        $abc = 15;

        $z = $ab <=> $abc;  // 0,1,-1
        var_dump($z);


    ?>

</body>
</html>