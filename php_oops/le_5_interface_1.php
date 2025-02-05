<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
interface A{
    function sum($a,$b);
}
interface B{
    function sub($a,$b);
}

class ChildClass implements A,B{
    function sum($a,$b){
        echo "sum of two value is".$a + $b;
        echo "<br>";
    }
    function sub($a,$b){
        echo "Subtraction of two value is".$a - $b;
        echo "<br>";
    }
}

class ChildClass1 implements B{
    function sub($a,$b){
        echo "Subtraction of two value is".$a - $b;
        echo "<br>";
    }
}




$c = new ChildClass();
$c -> sum(25,15);
$c -> sub(5,2);

$c = new ChildClass1();
$c -> sub(5,10);


?>