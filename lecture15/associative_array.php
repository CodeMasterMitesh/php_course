<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Array</title>
</head>
<body>
    <!-- // Associative array  key => value -->
    <?php       
        $employeeName = [
            'Name' => 'Mitesh',
            'Sname' => 'Prajapati',
            'age'=>31,
            'per' =>55.55,
            'Married'=> true
            ];

            // $employeeName = [
            //     1 => 'Mitesh',
            //     2 => 'Prajapati',
            //     3=>31,
            //     4 =>"55.55",
            //     5=> true
            //     ];

            $employeeName['per'] = 85.56;

            echo "<pre>";
            // print_r($employeeName['per']);
            print_r($employeeName);
            echo "<pre>";

            // print only value
            // foreach($employeeName as $employeeData){
            //     echo $employeeData . "<br>";
            // }

            // array data hoy access karva mate 
            // print key and value
            foreach($employeeName as $employeekey => $employeeData){
                echo $employeekey."=".$employeeData . "<br>";
            }
    ?>

</body>
</html>