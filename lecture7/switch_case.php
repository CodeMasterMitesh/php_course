<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Case</title>
</head>
<body>
    
<h1>Switch Case</h1>

<?php

    $days = "Tuesday";

    switch ($days) {
        case 'Monday':
           $ans = "Today is Monday";
            break;

        case 'Tuesday':
            $ans = "Today is Tuesday";
            break;

        case 'Wenesday':
            $ans = "Today is Wenesday";
            break;
        
        default:
            $ans = "Invalid Input";
            break;
    }

?>
<p style="color:#e77019;"><?php echo $ans; ?></p>
</body>
</html>