<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Base{
    public $name = "Mitesh"; // this is propertie of base class
    // function __construct($n){
    //     $this->name = $n;
    // }
    function show(){
        echo "My name is ".$this->name;
    }
}

class Child extends Base{
    public $name = "Bharat";
    function get(){
        echo "My name is ".$this->name;
    }
}

// $b = new Base("Mitesh Prajapati");
// $b->show();

// $b = new Child("Bharat Rangani");
// $b->show();

$b = new Child();
$b->get();
?>