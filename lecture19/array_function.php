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
    // $num = [1,2,3,4,5,6,7,8,1,2];

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
    echo "Key of Mitesh is ".$Akey;
?>

<!--
array_sum()
Returns the sum of all values in an array
shuffle()
Randomizes the order of elements in an array.
count()
sort()
Sorts an array in ascending order
rsort()
Sorts an array in descending order
asort()
Sorts an associative array in ascending order, maintaining key-value pairs.
ksort()
Sorts an associative array by key in ascending order.
array_slice()
Extracts a slice of an array.
array_splice()
Removes and replaces elements in an array.
-->
    
</body>
</html>