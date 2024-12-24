<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional Statment</title>
</head>
<body>

        <!-- three type condition statment  -->
        <?php 

            $age = 12;

            if($age >= 18){
                echo "You Can Vote";
            }else{
                echo "You Can't Vote";
            }

            echo "<br>";
            // even odd number

            // 2 even number 00 and 2 odd 
            $number = 24;
            if($number%2 === 0){
                echo "Thi is even number : ".$number;
            }else{
                echo "Thi is odd number : ".$number;
            }

            // positive negative number 

        ?>

</body>
</html>