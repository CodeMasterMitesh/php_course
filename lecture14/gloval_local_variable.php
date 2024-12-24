<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global And Local Variable</title>
</head>
<body>
    

<?php
    $x = 5;
    function sum()
    {
       global $x;
        $x = 10;
        $num = 25;
        $num1 = 26;

        echo $x;
    }
    sum();
    echo $num1;
    echo $x;
?>

</body>
</html>