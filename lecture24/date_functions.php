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

echo $cdate;

// 18-08-1993
echo "<br>";

// $bday = mktime(hour, minute, second, month, day, year);

$bday = date('d-m-Y H:i:s',mktime(9,43,10,8,18,2003));

$gbday = date('d-m-Y H:i:s',gmmktime(0,0,0,8,18,1995));

echo $bday;
echo "<br>";
echo $gbday;
// gmmktime();
echo "<br>";

$newDate = date_create("2024-12-03");

echo "<pre>";
print_r($newDate);
echo "</pre>";

// $d = date_format($newDate,'d-m-Y h:i:s');
$d = date_format($newDate,'Y-m-d');

echo $d;
echo "<br>";
$month = (int)substr($d,0,4);
var_dump($month);
echo "<br>";
$day = (int)substr($d,8,2);
var_dump($day);
echo "<br>";
$year = (int)substr($d,5,2);
var_dump($year);
echo "<br>";
// checkdate(month,day,year)
$result = checkdate($month,$day,$year);
var_dump($result);


// 2024-01-01 to 2024-12-03
// past date

$pDate = date_create("2024-01-01");

$diff = date_diff($pDate,$newDate);

echo "<br>";
echo $diff -> days . "Days";
echo "<pre>";
print_r($diff);
echo "</pre>";


?>

<!-- date_add(object,interval)
date_sub(object,interval)
date_modify(object,modify)
date_interval_create_from_date_string()
getdate(timestamp) -->


</body>
</html>