<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function With Return Key Word</title>
</head>
<body>
        
    <?php
    include("function.php");

        function cal($x,$y)
        {
            $sum = $x + $y;
            return $sum;
        }
        // echo "Sum of two value is ".cal(15,25);
        $result = cal(15,35);
        echo "Sum of Two Value is ".$result.".";

        message();

    ?>

</body>
</html>