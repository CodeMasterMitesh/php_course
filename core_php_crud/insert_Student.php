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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $city_id = $_POST['city_id'];
    $course_id = $_POST['course_id'];
    $percentage = $_POST['percentage'];

    if($password != $confirm_password){
        // echo "Confrim Passoword Not Match With Password";
        // exit;
        echo "<script>
            alert('Confrim Passoword Not Match With Password');
            window.location.href = 'addStudent.php';
        </script>";
    }else{
        $sql = "INSERT INTO students (name,age,date_of_birth,gender,phone,email,password,city_id,course_id,percentage) 
        VALUES ('$name','$age','$date_of_birth','$gender','$phone','$email','$password','$city_id','$course_id','$percentage')";
        $query = mysqli_query($conn,$sql);
    
        if($query){
            echo "<script>
                alert('Data inserted successfully');
                window.location.href = 'index.php';
            </script>";
        }else{
            echo "Data not inserted";
        }
    }   
}
?>