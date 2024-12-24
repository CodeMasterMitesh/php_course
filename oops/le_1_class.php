<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS In PHP</title>
</head>
<body>
<h1>Class In PHP</h1>
<?php
    class calculation{
        // class -> properties 
        public $a,$b,$c;
        // class -> methods 
        function sum()
        {
            $this->c = $this->a + $this->b;
            return $this -> c;
        }
         // class -> methods 
        function sub()
        {
            $this->c = $this->a - $this->b;
            return $this -> c;
        }
    }
    // create new object 
    $c1 = new calculation();
    // assign value class property
    $c1 -> a = 10;
    $c1 -> b = 20;
    //call function
    echo $c1->sum(); 
    echo "<br>";
    //call another function
    echo $c1->sub(); 
    echo "<br>";

    //create another object
    $c2 = new calculation();
    $c2->a = 22;
    $c2->b = 15;

    echo $c2->sub();

?>
</body>
</html>