<?php
include ("connect_db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // debug($_POST);
    // exit;
    $name = $_POST['name'];
    $age = $_POST['age'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $city_id = $_POST['city_id'];
    $course_id = $_POST['course_id'];
    $percentage = $_POST['percentage'];

    $sql = "INSERT INTO students (name,age,date_of_birth,gender,phone,city_id,course_id,percentage) 
    VALUES ('$name','$age','$date_of_birth','$gender','$phone','$city_id','$course_id','$percentage')";
    $query = mysqli_query($conn,$sql);

    if($query){
        ?>
        <script>
            alert("Data inserted successfully");
        </script>
        <?php
        header("Location: show_registration_data.php");
    }else{
        echo "Data not inserted";
    }

}
?>