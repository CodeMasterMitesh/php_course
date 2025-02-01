<?php
class Employee{  // base class // parent class
    public $name,$des,$salary;

    function __construct($n,$d,$s){
        $this->name = $n;
        $this->des = $d;
        $this->salary = $s;
    }


    function info(){
        echo "Employee Name is ".$this->name." Desigantion is ".$this->des." and salary is " .$this->salary.".";
    }
}

class Manager extends Employee{ // derived class // child class
    public $da = 2000;
    public $phone = 500;
    public $totalSalary;
    
    // $this->totalSalary = $this->salary + $this->da + $this->phone;
    function __construct($n,$d,$s){
        $this->name = $n;
        $this->des = $d;
        $this->salary = $s;
        $this->totalSalary = $this->salary + $this->da + $this->phone;
    }

    function info(){
        echo "Manager Name is ".$this->name." Desigantion is ".$this->des." and salary is " .$this->totalSalary.".";
    }
}

$e1 = new Employee("Mitesh","PHP Developer",20000);
$e1->info();
echo "<br>";
$m1 = new Manager("Alpesh","Sr.PHP Developer",45000);
$m1->info();
?>