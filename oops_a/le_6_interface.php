<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interface IN OOPS PHP</title>
</head>
<body>
    
<?php
    // create interface
    // interface is a programming construct used in Object-Oriented Programming (OOP) to define a contract that classes must adhere to.
    // An interface specifies a set of methods that implementing classes must define, but it does not include the implementation of these methods.
    // Interfaces are used to achieve multiple inheritance and define common behavior for unrelated classes.
    interface parent1{
        function sum($a,$b);
    }

    interface parent2{
        function sub($a,$b);
    }

    interface parent3{
        function mult($a,$b);
    }

    // all interface implement in derived class 
    class childClass implements parent1{
        function sum($a,$b){
            return $a + $b;
        }
    }

    $x = 30;
    $y = 10;

    $result = new childClass();
    $result->sum($x,$y);
    echo $result->sum($x,$y);
    print_r($result);
?>

</body>
</html>