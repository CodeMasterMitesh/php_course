<?php 
    $id = $_POST['id'];
    $sql = "SELECT s.id,s.name,s.age,s.phone,s.date_of_birth,s.gender,s.percentage,c.city_name,cs.course_name,s.city_id,s.course_id FROM students as s LEFT JOIN city as c ON s.city_id = c.id 
    LEFT JOIN course as cs ON s.course_id = cs.id WHERE s.id = ".$id."";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
?>