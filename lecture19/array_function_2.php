<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions</title>
</head>
<body>

<!-- 
array_unique()
Removes duplicate values from an array
this function create new array and not change in old array

-->

<?php

    $colors = ["Blue","Green","Red","Blue","Yellow","Black","White","Red"];
    $num = [1,2,3,4,5,6,7,8,1,2,35,58.36,55.55,"5","5"];

    // echo "<pre>";
    // print_r($colors);
    // echo "</pre>";

    $newColors = array_unique($colors);

    // echo "<pre>";
    // print_r($newColors);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($colors);
    // echo "</pre>";
    
    
?>

<!---
array_reverse()
Reverses the order of the elements in an array.
-->
<?php

$colors = ["Blue","Green","Red","Blue","Yellow","Black","White","Red"];

$ar = array_reverse($colors);

echo "<pre>";
print_r($ar);
echo "</pre>";

?>
<!--
array_key_exists()
Checks if a specific key exists in an array.
-->
<?php
    $edata = [

        'name' => "Mitesh",
        'age' => 31,
        'sname' => 'prajapati',
        'position'=>"Sr.PHP Developer"
    ];
    $s = array_key_exists("name",$edata);
    if(array_key_exists("name",$edata)){
        echo "Key is Exists";
    }else{
        echo "Key is Not Exists";
    }
?>


<!--
array_keys()
Returns all the keys of an index array
-->
<?php

    $key = array_keys($edata);
    echo "<pre>";
    print_r($key);
    echo "</pre>";
?>


<!--
array_values()
Returns all the values of an array
-->
<?php
   
    $value = array_values($edata);
    echo "<pre>";
    print_r($value);
    echo "</pre>";
?>


<!--
in_array()
Checks if a value exists in an array
-->
<?php
   
    $t = in_array("Red",$colors);
    if($t){
        echo "Data Found In Array";
    }else{
        echo "Data Not Found In Array";
    }
?>


<!--

array_search()
Searches for a value and returns its key
-->
<?php

    $Akey = array_search("Mitesh",$edata);
    echo "<br>";
    echo "Key of Mitesh is ".$Akey."<br>";
?>

<!--
array_sum()
Returns the sum of all values in an array
-->
<?php

    $sum = array_sum($num);
    echo "Sum of num Array Value is ".$sum."<br>";
?>

<!--
shuffle()
Randomizes the order of elements in an array.

-->
<?php

    // $random = shuffle($num);
    // echo $random;
    // echo "<pre>";
    // print_r($num);
    // echo "</pre>";
?>

<!--
count()
-->
<?php

    $cou = count($num);
    echo "<pre>";
    print_r($cou);
    echo "</pre>";
?>

<!--
sort()
Sorts an array in ascending order
sort asc order in origal array and sort is return only true and false
-->
<?php
    $asc = sort($num);
    echo "<pre>";
    var_dump($asc);
    print_r($num);
    echo "</pre>";
?>

<!--
rsort()
Sorts an array in descending order

-->
<?php
    $desc = rsort($colors);
    echo "<pre>";
    var_dump($desc);
    print_r($colors);
    echo "</pre>";
?>

<!--
asort()
Sorts an associative array in ascending order, maintaining key-value pairs.
-->
<?php
 $employeeName = [
            'Name' => 'Mitesh',
            'Sname' => 'Prajapati',
            'MiddleName' => 'Lalabhai',
            "Education" => "B.Tech",
            "CollageName" => "Gujarat Univercity",
            "City" => "Ahmedabad",
            // 'age'=>31,
            // 'per' =>55.55,
            // 'Married'=> true
            ];
    $Adesc = asort($employeeName);
    echo "<pre>";
    var_dump($Adesc);
    print_r($employeeName);
    echo "</pre>";
    ?>
    <!--
ksort()
Sorts an associative array by key in ascending order.
-->
<?php
    $keyDesc = ksort($employeeName);
    echo "<pre>";
    var_dump($keyDesc);
    print_r($employeeName);
    echo "</pre>";
    ?>
    <!--
array_slice()
Extracts a slice of an array.
total 3 parameters taken 1 is array , 2 is index for starting , 3 is length
-->
<?php
    echo "<pre>";
    print_r($colors);
    echo "</pre>";
    $slice = array_slice($colors,4,2);
    echo "<pre>";
    print_r($slice);
    echo "</pre>";
?>

<!--

array_splice()
Removes and replaces elements in an array.

-->

<?php
echo "array_splice ---->";

    echo "<pre>";
    print_r($colors);
    echo "</pre>";
    $splice = array_splice($colors,2,2,["RoyalBlue","Plum"]);
    echo "<pre>";
    print_r($splice);
    print_r($colors);
    echo "</pre>";
?>

<!--

-->

<?php 
echo "array map function ---->";
echo "<pre>";
    print_r($num);
    echo "</pre>";
    // array_map work like foreach loop
   $re = array_map(function($n){
        return  $n = $n * 2;
    },$num);
    echo "<pre>";
    print_r($re);
    echo "</pre>";
?>

</body>
</html>