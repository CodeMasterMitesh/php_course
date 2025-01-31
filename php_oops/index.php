<?php
class Calculation{
    public $a,$b,$c; // properties

    function sum(){  // methods 
        $this->c = $this->a + $this->b;
        return $this->c;
    }

    function sub(){ // methods 
        $this->c = $this->a - $this->b;
        return $this->c;
    }
}

$cal = new Calculation();
$cal->a = 20;
$cal->b = 10;

echo "Sum of a and b is :" .$cal->sum();
echo "<br>";

$cal1 = new Calculation();
$cal1->a = 30;
$cal1->b = 35;
echo "Sub of a and b is :" .$cal1->sub();
?>

<!-- three type of accessmodifiers public protected private -->