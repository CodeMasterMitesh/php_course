<?php
include("connect_db.php");

    $student_id = mysqli_real_escape_string($conn, $_POST['studentId']);
    $name = mysqli_real_escape_string($conn, $_POST['Student_name']);
    $age = mysqli_real_escape_string($conn, $_POST['Student_age']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['Student_date_of_birth']);
    $gender = mysqli_real_escape_string($conn, $_POST['Student_gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['Student_phone']);
    $city_id = mysqli_real_escape_string($conn, $_POST['Student_city_id']);
    $course_id = mysqli_real_escape_string($conn, $_POST['Student_course_id']);
    $percentage = mysqli_real_escape_string($conn, $_POST['Student_percentage']);

   $sql = "UPDATE students SET 
        name='$name', 
        age='$age', 
        date_of_birth='$date_of_birth', 
        gender='$gender', 
        phone='$phone', 
        city_id='$city_id', 
        course_id='$course_id', 
        percentage='$percentage' 
        WHERE id='$student_id'";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
?>