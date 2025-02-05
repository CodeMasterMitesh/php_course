<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
interface Animal{
    function makeSound($n);
    function move($r);
}

class Dog implements Animal{
    function makeSound($n){
        echo $n;
        echo "<br>";
    }
    function move($r){
        echo $r;
        echo "<br>";
    }
}
class Bird implements Animal{
    function makeSound($n){
        echo $n;
        echo "<br>";
    }
    function move($r){
        echo $r;

    }
}

$d = new Dog();
$d -> makeSound("Bark");
$d -> move("The Dog Is Run.");

$b = new Bird();
$d -> makeSound("Chee Chee");
$d -> move("The Bird Is Flies.");

?>