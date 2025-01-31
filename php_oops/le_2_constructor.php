<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
class Car{
    public $name,$color,$modal;

    function __construct($n = "Maruti",$c = "White",$m=2024){
        $this->name = $n;
        $this->color = $c;
        $this ->modal = $m;
        echo "My Car is ".$this->name." and color is ".$this->color. " and modal year is ".$this->modal."<br>";
    }

    // function setData($n,$c,$m){
    //    $this->name = $n;
    //    $this->color = $c;
    //    $this ->modal = $m;
    // }

    // function showData(){
    //     echo "My Car is ".$this->name." and color is ".$this->color. " and modal year is ".$this->modal;
    // }
}

$c1 = new Car("Hyundai","Black",2019);
$c2 = new Car("Maruti","White",2022);
$c3 = new Car(); 
// $c1->name = "Hyundai";
// $c1->color = "Black";
// $c1->modal = 2019;

// $c1->setData("Hyundai","Black",2019);
// $c1->showData();

// constructor -> constructor is pre define php function
// when object is create at that time constructor call automaticly
// constructor call automaticly
?>