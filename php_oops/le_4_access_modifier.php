<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// three type of access modifier in php oops 
// public 
// private 
// protected

class Base{
    private $name,$age;

    public function __construct($n,$a){
        $this->name = $n;
        $this->age = $a;
    }
    private function setData($n,$a){
        $this->name = $n;
        $this->age = $a;
    }

    private function show(){
        echo "My Name is ".$this->name." and My Age is ".$this->age.".";

    }
}
#[\AllowDynamicProperties]
class Child extends Base{

    public function __construct($n,$a){
        $this->name = $n;
        $this->age = $a;
    }
    public function setData($n,$a){
        $this->name = $n;
        $this->age = $a;
    }
    public function show(){
        echo "My Name is ".$this->name." and My Age is ".$this->age.".";

    }
}

// $b = new Base("Mitesh",31);
// $b->setData("Sagar",45);
// $b -> name = "Alpesh";
// $b -> age = 32;
// $b->show();

$c = new Child("Bharat",31);
$c->setData("Mitesh",45);
$c -> name = "Alpesh";
$c -> age = 32;
$c -> show();
?>