<?php
include("connect_db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $city_id = mysqli_real_escape_string($conn, $_POST['city_id']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $percentage = mysqli_real_escape_string($conn, $_POST['percentage']);

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
        echo "<script>
                alert('Data updated successfully');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Data not updated. Error: " . mysqli_error($conn);
    }
}
?>