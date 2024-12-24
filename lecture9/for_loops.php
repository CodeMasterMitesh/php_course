<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do while</title>
</head>
<body>
    <?php
    $n = 10;
    $table = 15;

    // while ($a <= 10) {
    //     # code...
    // }

    // for ($i=1; $i <= $n; $i++) { 
    //     $mul = $table * $i;
    //     echo $table. "*" . $i . "=" . $mul . "<br>";
    // }

    $sum = 0;
    for ($i=1; $i <= $n; $i++) { 
        $sum +=$i;
        # code...
    }
    echo "Sum of value 1 to 10 is: ".$sum;

    ?>

</body>
</html>