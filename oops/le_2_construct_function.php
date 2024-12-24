<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construct Function IN OOPS PHP</title>
</head>
<body>
    
<?php
    class customer {
        public $name = "Bharat Rangani",$age = 31; //properties 

        // construct function call autometicly
        function __construct($n = "Chatur Tiwari",$a=25){
            $this->name = $n;
            $this->age = $a;
        }

        function show(){
            echo "Customer Name is ".$this->name.". and Age Is ".$this->age.".";
        }
    }   
    // $cdata = new customer();
    // $cdata -> name = "Jignesh Patel";
    // $cdata -> age = 33;
    // echo $cdata -> show();
    $cdata = new customer();
    $cdata = new customer("Mitesh Prajapati",31);

    echo $cdata->show();
?>

</body>
</html>