<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while Loops</title>
    <style>
        table{
            width:300px;
            height:300px;
            background-color:lightblue;
            color:grey;
            font-weight:bold;
            text-align:center;
        }
        th:hover{
            background-color:plum;
            color:black; 
        }
        tr:hover{
            background-color:orange;
            color:black;    
        }
    </style>
</head>
<body>
    
        <!-- loops  -->
         <!-- while loop
         do while 
         for loop 
         foreach -->
    <?php
         $data = "Hello world";  //-> 10 time 
        // 1234567899
        // intialization
        // condition -> true
        // statment
        // increment/decrement 

        $a = 1;
        while ($a <= 10) {
            echo $a."=>".$data."<br>";  
            $a++;
        }

        echo "<br>";
        
        // echo "<h1></h1>";
        // table of 16  
        // 16 * 1 = 16
        // 16 * 2 = 32

        $num = 1;
        $table = 16;
        echo "<table border='1'>";
        echo "<tr><th colspan='3'>Table of 15</th></tr>";
        while ($num <= 10) {
            $mult = $num * $table;
            echo "<tr>".
                "<td>".$table."</td>".
                "<td>".$num."</td>".
                "<td>".$mult."</td>". 
            "</tr>";
            $num++;
        }
        echo "</table>";
    ?>

</body>
</html>