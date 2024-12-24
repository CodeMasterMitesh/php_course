<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multidimension Array</title>
</head>
<body>
    <!-- multidimension index array   -->
    <?php
        // $employee = array(
                           
        //         array("E001","Kirti Patel","Software Devloper"),
        //         array("E002","Amit Shah","QC"),
        //         array("E003","Devang Rathod","Accounts"),
        //         array("E004","Divyang Parekh","Technical Consultant"),
        // );
    //    echo $employee[1][1] = "Mitesh Prapati";
        $employee = [
            ["E001","Kirti Patel","Software Devloper"],
            ["E002","Amit Shah","QC"],
            ["E003","Devang Rathod","Accounts"],
            ["E004","Divyang Parekh","Technical Consultant"],
        ];

        $raw = count($employee);
        $column = count($employee[0]);
        // print_r($column);
        // echo "<pre>";
        // print_r($employee);
        // echo "</pre>";
        echo "<table border='1'>";
        echo "<tr> 
                <th>Employee Id</th>
                <th>Name</th>
                <th>Designataion</th>
            </tr>";
            
        for ($i=0; $i < $raw; $i++) {
            echo "<tr>";
            for ($j=0; $j < $column; $j++) { 
                # code...
                echo "<td>".$employee[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        
        echo "</table>";
    ?>

</body>
</html>