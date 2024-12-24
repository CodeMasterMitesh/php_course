<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Date Function</title>
</head>
<body>
    

    <?php

        date_default_timezone_set("Asia/kolkata");
        $cdate = "Right Now Date Time is ".date("d-m-Y h:i:s A");

        // current day = d - 02
        // current month = m - 12
        // current year = Y - 2024

        // capital D - > MON, TUE,
        // capital M -> DEC, JAN

        // small y - 24

        // time 

        // h means - > hours
            // i means minutes
            // s means second
       echo $cdate;

    ?>

</body>
</html>