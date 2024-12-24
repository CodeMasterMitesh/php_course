<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Data From Database</title>

    <style>
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
            }
            body{
                background-color:lightblue;
            }
            .container{
                margin:20px;
            }
            h1{
                text-align:center;
            }
            table{
                width:100%;
                border:2px solid black;
                border-collapse: collapse;
            }
            tr,th,td{
                border:2px solid black;
                padding:5px;
            }
            tr:hover{
                background-color:orange;
            }

    </style>
</head>
<body>
    <div class="container">
    <h1>Student Data</h1>
    <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        include ("connect_db.php");

        // get data usng left join 
        $sql = "SELECT s.id,s.name,s.age,s.date_of_birth,s.gender,s.phone,s.percentage,c.city_name,cs.course_name FROM students as s LEFT JOIN city as c ON s.city_id = c.id 
        LEFT JOIN course as cs ON s.course_id = cs.id";
        // mysqli_query exucutre query in db which is connected by mysqli_connect function
        $query = mysqli_query($conn,$sql);
        echo "<table>";
        echo "<tr> 
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Percentage</th>
                <th>City Name</th>
                <th>Course Name</th>
        </tr>";
        while($row = mysqli_fetch_assoc($query)){
           ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['age'] ?></td>
                    <td><?php echo $row['date_of_birth'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['percentage'] ?></td>
                    <td><?php echo $row['city_name'] ?></td>
                    <td><?php echo $row['course_name'] ?></td>
                </tr>
           <?php
        }
        echo "</table>";
    ?>
    </div>
</body>
</html>