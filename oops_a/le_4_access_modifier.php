<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access_Modifier IN OOPS PHP</title>
</head>
<body>
    
<?php
    // base class
    class parents{
        // protected class properties 
        // protected $name,$age,$salary,$totalSalary;
        private $name,$age,$salary,$totalSalary;

        // construct function 
        public function __construct($n,$a,$s){
            $this->name = $n;
            $this->age = $a;
            $this->salary = $s;
        }
        // class methods 
        private function info(){
            echo "<h3>Employee Data </h3>";
            echo "Employee Name is ".$this->name.".<br>";
            echo "Employee Age is ".$this->age.".<br>";
            echo "Employee Salary is ".$this->totalSalary.".<br>";
        }
    }
    // child class
    // if in parent class methiod and property is protected than we can create public 
    // methiod  in child class and access 
    class childs extends parents{
        // manager class property
        public $ta = 2000;
        public $mobile=3000;
        // manager class metods
        public function info(){
            $this->totalSalary = $this->ta + $this->mobile + $this->salary;
            echo "<h3>Manager Data </h3>";
            echo "Employee Name is ".$this->name.".<br>";
            echo "Employee Age is ".$this->age.".<br>";
            echo "Employee Salary is ".$this->totalSalary.".<br>";
        }
    }

    // $e = new parents("Mitesh",31,25000);
    // echo $e->info();

    // if in parent class method and property is private than we can create override 
    // properties createing new object outise like below 
    $e1 = new childs("Bharat",33,50000);
    $e1 -> name = "Bharat Rangani";
    $e1 -> age = 33;
    $e1 -> salary = 33000;
    echo $e1->info();
?>

</body>
</html>