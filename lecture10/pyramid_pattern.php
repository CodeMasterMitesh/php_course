<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patterns</title>
</head>
<body>
    
    <?php
        echo "<h1> Simple Pyramid pattern</h1>";
        $i; 
        $j;
        $num = 5;

        for ($i=1; $i <= $num; $i++) { 
            for ($j=1; $j <= $i ; $j++) { 
                echo "*";
            }
            echo "<br>";
        }

        echo "<br>";
        echo "<h1>Pyramid pattern</h1>";
        $a; 
        $b;
        $c;
        $num = 5;

        for ($a=1; $a <= $num; $a++) {  // outer loop for create row

            for ($b=$a; $b < $num; $b++) {  // inner loop for space
                echo "&nbsp"."&nbsp";
            }

            for ($c=1; $c <= (2 * $a -1); $c++) {  // another inner loop for * print
                echo "*";
            }
            echo "<br>";
        }

    ?>

</body>
</html>

<!-- simple 
*
**
***
****
*****
pyrmid 
    *
   ***
  *****
 *******
*********

inverted pyramid  -->
