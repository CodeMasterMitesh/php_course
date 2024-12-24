<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multidimension Associative Array</title>
    <style>
        h1{
            text-align:center;
        }
        table{
            width:75%;
            margin:auto;
            border-collapse:collapse;
        }
    </style>
</head>
<body>  
    <h1>Student Mark Sheet</h1>
<?php
    $marksData = [
        'david' =>[
            'Maths' => 85,'Science'=>87,'English'=>88,'Physics'=>92,'General Knowledge'=>88
        ],
        'Richard' =>[
            'Maths' => 91,'Science'=>81,'English'=>78,'Physics'=>71,'General Knowledge'=>74
        ],
        'John' =>[
            'Maths' => 81,'Science'=>86,'English'=>88,'Physics'=>84,'General Knowledge'=>92
        ],
        'Tony' =>[
            'Maths' => 84,'Science'=>86,'English'=>87,'Physics'=>82,'General Knowledge'=>81
        ],
        'Scott' =>[
            'Maths' => 71,'Science'=>79,'English'=>82,'Physics'=>88,'General Knowledge'=>89
        ],
    ];

    // echo "<pre>";
    // print_r($marksData); 
    // echo "</pre>";

    // echo $marksData['david']['English'];
    // echo $marksData['david']['Physics'];
    // echo "<br>";
    // echo $marksData['Richard']['General Knowledge'];
    echo "<table border='1'>
    <tr>
        <th>Name</th>
        <th>Maths</th>
        <th>Science</th>
        <th>English</th>
        <th>Physics</th>
        <th>General Knowledge</th>
    </tr>
    " ;
    foreach($marksData as $key => $datas){
        echo "<tr> 
                <td>$key</td>";
                foreach($datas as $data){
                    echo "<td>".$data."</td>"; 
                }
        echo "</tr>";
    }
    echo "</table>";
?>

</body>
</html>