<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inheritance IN OOPS PHP</title>
</head>
<body>
    
<?php
    // base class
    class employee{
        // class properties 
        public $name,$age,$salary,$totalSalary;

        // construct function 
        function __construct($n,$a,$s){
            $this->name = $n;
            $this->age = $a;
            $this->salary = $s;
        }
        // class methods 
        function info(){
            echo "<h3>Employee Data </h3>";
            echo "Employee Name is ".$this->name.".<br>";
            echo "Employee Age is ".$this->age.".<br>";
            echo "Employee Salary is ".$this->totalSalary.".<br>";
        }
    }
    // derived class
    // inhertance to employee so manager class access employee class property and methods
    class manager extends employee{
        // manager class property
        public $ta = 2000;
        public $mobile=3000;
        // manager class metods
        function info(){
            $this->totalSalary = $this->ta + $this->mobile + $this->salary;
            echo "<h3>Manager Data </h3>";
            echo "Employee Name is ".$this->name.".<br>";
            echo "Employee Age is ".$this->age.".<br>";
            echo "Employee Salary is ".$this->totalSalary.".<br>";
        }
    }

    $e = new employee("Mitesh",31,25000);
    echo $e->info();

    $e1 = new manager("Bharat",33,50000);
    echo $e1->info();
?>

</body>
</html>