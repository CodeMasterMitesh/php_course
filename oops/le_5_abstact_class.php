<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstact Class IN OOPS PHP</title>
</head>
<body>
    
<?php
    // create abstract class
    abstract class parentClass{
        protected $name,$age,$salary;

        // function __construct($n,$a,$s){
        //     $this->name = $n;
        //     $this->age = $a;
        //     $this->salary = $s;
        // }
        // create abstract method
        abstract protected function info($n,$a,$s);

    } 
    // create child class and extend parentClass
    class childClass extends parentClass{
        // create logic of parent method in child class
        public function info($n,$a,$s){
            echo "<h3>Employee Data</h3><br>";
            echo "Employee Name is ".$n."<br>";
            echo "Employee Age is ".$a."<br>";
            echo "Employee Salary is ".$s."<br>";
        }
    }

    // $data = new childClass("Bharat",35,21000);
    // $data->name = "Mitesh";
    // $data->age = 31;
    // $data->salary = 35000;
    // create object of child class and assign value 
    $data = new childClass();
    echo $data->info("Mitesh",21,35000);
?>

</body>
</html>