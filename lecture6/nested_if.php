<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested If</title>
</head>
<body>
    <!-- nested if  -->
    <?php 
        $num = 100;
        if($num > 100){
            if($num <= 110){
                echo "NUmber is between 100 to 110";
            }else{
                echo "NUmber is above 110";
            }
        }else{
                if($num > 90){
                    echo "NUmber is between 90 to 100";
                }else{
                    echo "NUmber is below 90";
                }
            
        }
    ?>

</body>
</html>