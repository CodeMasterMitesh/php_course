<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String To Array</title>
</head>
<body>

<?php
    // $num = "1,2,3,4,5,6,7,8,9";
    // number to array convert
    // $numArray = explode(",",$num);
    $numArray = range(1,9);
    // convert in pattern 
    // 1
    // 12
    // 123
    // 1234
    // 12345
      
    echo "<pre>";
    print_r($numArray); 
    echo "</pre>";

    echo "<br>";
    echo "<hr>";
    $n = 5;
    for ($i=0; $i < $n; $i++) { 
        for ($j=0; $j < $i + 1; $j++) { 
           echo $numArray[$j];
        }
        echo "<br>";
    }

?>

</body>
</html>