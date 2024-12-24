<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    
    <?php
            //  what is function? block of code 
            
            // function myFunction()
            // {

            // }
            // myFunction();
            //why use function? -> code resuable 

        function message()
        {
            echo "Welcome To My Website";
        }
        message();
        echo "<br>";
        // parameters
        // always as varible 
        function sum($a,$b = 1)
        {
            $sum = $a + $b;
            echo "Sum of Two Value is ".$sum."."."<br>";
        }
        $result = sum(25,26);
        echo $result;
        // arguments and argument is always actual value
        sum(45);
        sum(1);

    ?>

</body>
</html>