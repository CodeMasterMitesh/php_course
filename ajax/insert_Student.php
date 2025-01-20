<?php
include("connect_db.php");

    // Retrieve and sanitize input data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $confirm_password = password_hash($_POST['confirm_password'],PASSWORD_DEFAULT);
    $city_id =$_POST['city_id'];
    $course_id = $_POST['course_id'];
    $percentage = $_POST['percentage'];
    
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if ($age <= 0) {
        $errors[] = "Age must be a positive number.";
    }

    if (empty($date_of_birth)) {
        $errors[] = "Date of Birth is required.";
    }

    if (!in_array($gender, ['Male', 'Female'])) {
        $errors[] = "Invalid gender selected.";
    }

    if (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    if ($city_id <= 0) {
        $errors[] = "Invalid city selected.";
    }

    if ($course_id <= 0) {
        $errors[] = "Invalid course selected.";
    }

    if ($percentage < 0 || $percentage > 100) {
        $errors[] = "Percentage must be between 0 and 100.";
    }

    // If there are errors, show alert and redirect back
    if (!empty($errors)) {
        $error_message = implode("\\n", $errors);
        echo $error_message;
        // echo "<script>
        //     alert('$error_message');
        //     window.location.href = 'addStudent.php';
        // </script>";
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO students (name, age, date_of_birth, gender, phone, email, password, city_id, course_id, percentage) 
            VALUES ('$name', '$age', '$date_of_birth', '$gender', '$phone', '$email', '$password', '$city_id', '$course_id', '$percentage')";

    if (mysqli_query($conn, $sql)) {
        echo 1;
        // echo "<script>
        //     alert('Data inserted successfully');
        //     window.location.href = 'index.php';
        // </script>";
    } else {
        echo 0;
        // echo "<script>
        //     alert('Error inserting data: " . mysqli_error($conn) . "');
        //     window.location.href = 'addStudent.php';
        // </script>";
    }
?>