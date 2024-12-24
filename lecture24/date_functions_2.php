<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Functions</title>
</head>
<body>
    
<?php

date_default_timezone_set("Asia/kolkata");
$cdate = "Right Now Date Time is ".date("d-m-Y h:i:s A");



$pDate = date_create("2024-01-01");

// add days in date 
date_add($pDate,date_interval_create_from_date_string("20 days"));

// substract days from date 
date_sub($pDate,date_interval_create_from_date_string("10 days"));

$newDate = date_format($pDate,"d-m-Y");

echo $newDate;


echo "<br>";
echo "<br>";

$date = date_create("2001-01-26");

// substract days from date 
// add days in date 
date_modify($date,"-10 days");

$Date = date_format($date,"d-m-Y");

echo $Date;

echo "<br>";

$t = mktime(0,0,0,8,18,1993);
// echo $t;
$gdate = getdate($t);
echo $gdate['weekday'];
echo "<pre>";
print_r($gdate);
echo "</pre>";

?>

<!-- date_add(object,interval)
date_sub(object,interval)
date_modify(object,modify)
date_interval_create_from_date_string()
getdate(timestamp) -->


</body>
</html>