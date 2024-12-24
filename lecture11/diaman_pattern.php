          <!-- *
         ***
        *****
       *******
      *********
       *******
        *****
         ***
          * -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond Pattern</title>
</head>
<body>
    
          <?php
                $i;$j;$k;$num = 5;

                for ($i=1; $i <= $num; $i++) { 

                    for ($j=$i; $j < $num; $j++) { 
                        echo "&nbsp"."&nbsp";
                    }
                    for ($k=1; $k <= (2 * $i - 1); $k++) { 
                        echo "*";
                    }
                    echo "<br><hr>";
                }

                for ($i=$num - 1; $i >= 1; $i--) { 

                    for ($j=$i; $j < $num; $j++) { 
                        echo "&nbsp"."&nbsp";
                    }

                    //  1 <= 7 1 loop 7 time
                     //   2  <= 6 loop 5 time 
                     // 3 <= 5 // loop 3 time 
                     // 4 <= 4 // loop 1 time
                    for ($k=1; $k <= (2 * $i - 1); $k++) { 
                        echo "*";
                    }
                    echo "<br><hr>";
                }
          ?>
</body>
</html>