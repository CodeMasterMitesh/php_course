<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Case 2</title>
</head>
<body>
    
    <?php

        $per = 100;

        switch ($per) {

            case $per <= 100 && $per > 85 && $per!==0:
                var_dump($per);
                echo "GRADE A";
                break;

            case $per <= 85 && $per > 55:
                echo "GRADE B";
                break;

            case $per <= 55 && $per > 35:
                echo "GRADE C";
                break;

            case $per <= 35 && $per > 0:
                echo "Fail";
                break;

            default:
            echo "Invalid Input";
                break;
        }

    ?>

</body>
</html>