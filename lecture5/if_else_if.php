<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If_else_if_lader</title>
</head>
<body>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            background-color:lightblue;
            font-family: 'Times New Roman', serif;
            font-size:24px;
        }
        table{
            width :100%;
        }
        table,tr,td{
            border:2px solid black;
            border-collapse:collapse;
        }
        h1{
            text-align:center;
        }
        td:hover{
            background-color:orange;
        }
        th:hover{
            background-color:green;
        }
        .container{
            margin:20px;
        }
    </style>

    <h1>Grade System</h1>
    
    <!-- // condition 
    //1 85 - 100 Grade A;
    // 2 65 - 85 GRADE B
    // 3 35 - 65 grade c 
    // below 35 fail  -->
    <div class="container">
        <table border="1"> 
        <?php
            $maths = 80;
            $english = 65;
            $science = 55;
            $gujarati = 35;
            $total = $maths + $english + $science + $gujarati;

            $per = $total / 4;

            if($per > 85 && $per <= 100)
                {
                    $ans =  "Grade A";
                }else if($per > 65 && $per <= 85)
                {
                    $ans = "Grade B";
                }else if($per > 35 && $per <= 65)
                {
                    $ans =  "Grade C";
                }else if($per < 35 && $per >= 0)
                {
                    $ans =  "Fail";
                }else{
                    $ans =  "Invalid Input";
                }

                echo"<tr>
                    <th>Maths</th>
                    <th>English</th>
                    <th>Science</th>
                    <th>Gujarati</th>
                    <th>Total Marks</th>
                    <th>Percentage</th>
                    <th>Grade</th>
                </tr>
                <tr>
                    <td>$maths</td>
                    <td>$english</td>
                    <td>$science</td>
                    <td>$gujarati</td>
                    <td>$total</td>
                    <td>$per</td>
                    <td>$ans</td>
                </tr>    
                ";  
        ?>
        <table>
    </div>
</body>
</html>