<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// abstract class 
abstract class Base{
    protected $name;
    abstract protected function getData($n); // function declare 

    protected function showData(){
        echo "My name is ".$this->name;
    }
}

class Child extends Base{
   public function getData($x){
        $this->name = $x;
    }
    public function show(){
        echo "My name ".$this->name;
    }
}

// $b = new Base();
// $b->getData("Mitesh Prajapati");
// $b->showData();

$c = new Child();
$c->getData("Mitesh");
$c->show();

?>