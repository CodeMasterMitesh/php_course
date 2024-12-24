<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions</title>
</head>
<body>
    
    <?php
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
    // include("custom_function/debug.php");
        // for create new array 
        //array()
        //array__push()
        //array_pop()
        //array_unshift()
        //array_shift()
        //array_merge()
        // array_combine()

        $fruits = array("Apple","Banana","Orange","Pinepal");
        // echo "<pre>";
        // var_dump($fruits);
        // echo "</pre>";
        // if add value last in array than you want use array_push
        $newFruits = array_push($fruits,"Kiwi","Manago");
        echo "<pre>";
        var_dump($fruits);
        // var_dump($newFruits);
        echo "</pre>";

        // array_pop return value of which is remove from arryy
        $removeFruits = array_pop($fruits);

        
       
        // debug($fruits);

        // array_shift function return new count of array
        $addNewValue = array_unshift($fruits,"Manago","Chiku");

        echo "<pre>";
        print_r($fruits);
        print_r($addNewValue);
        echo "</pre>";

        // array shift return value of removed array value
        $r = array_shift($fruits);

        echo "<pre>";
        print_r($fruits);
        print_r($r);
        echo "</pre>";

        $vegitable =  array("Tomato","Potato","Loki","Bhindi","Mirchi");
        $colors =  array("Blue","Green","Yello");

        // array_merger function return new array it's not change in old array
        $newArray = array_merge($vegitable,$fruits,$colors);

        array_shift($fruits);

        echo "<pre>";
        print_r($newArray);
        print_r($fruits);
        print_r($colors);
        print_r($vegitable);
        echo "</pre>";

        // array_combine 
        // 2 associative array combine $key and $vlaue

        $key = array("Name","Surname","Age");
        $value = array("Mitesh","Prajapati",31);

        
        //
       $combineArray =  array_combine($key,$value);

       $addkey = array_unshift($key,"per");
        $addvalue = array_unshift($value,65);
        
       echo "<pre>";
       print_r($combineArray);
       print_r($key);
       print_r($value);
       echo "</pre>";
    ?>

</body>
</html>