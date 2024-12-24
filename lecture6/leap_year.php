<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leap Year</title>
</head>
<body>
    
    <h1>Leap Year</h1>
    <!-- year/4 == 0 leap year 
    year/400 == 0 leap year 
    year/100 == 0 not leap year   -->

    <?php
    $year = 1880;

    if($year%4 == 0){
        if($year%400 == 0){
            echo "this is leap year";
        }else{
            if($year%100 == 0){
                echo "This Year Is Not Leap Yaer";
            }else{
                echo "This Year Is Leap Yaer";
            }
        }
    }else{
        echo "This is not leap year";
    }

    ?>

</body>
</html>