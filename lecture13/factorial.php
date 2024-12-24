<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    
    <!-- what is factorial? -->     
                                        <!-- 5 -1 = 4 -->
                                         <!-- n -1 -->
     <!-- factorial(5) -> 1 * 2 * 3 * 4 * 5 = 120-->
     <!-- factorial(n) -> 1 * 2 * 3 * 4 * 5* ....n -1*n-->
     <!-- factorial(n) = (n-1)*n -->

     <?php

            // $factorial = 5;
            // $result = 1;
            // for ($i=1; $i <= $factorial; $i++) { 
            //     $result *= $i;
            //     // 1 * 2 * 3 * 4 * 5
            // }
            // echo "Factorial of ".$factorial." is ".$result.".";

            function factorial($n)
            {
                // function call
                if($n == 0 || $n == 1)
                {
                    return 1;
                }
               return factorial($n - 1) * $n;  // $n = 5 * 4 * 3 * 2 * 1
            }
            $a = 12;
            $result = factorial($a);
            echo "Factorial of ".$a." is ".$result.".";
     ?>

</body>
</html>