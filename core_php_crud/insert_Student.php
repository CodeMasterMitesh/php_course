<?php
include("connect_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);
    // Retrieve and sanitize input data
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = hash('SHA256', $_POST['password']);
    $confirm_password = hash('SHA256', $_POST['confirm_password']);
    $city_id = intval($_POST['city_id']);
    $course_id = intval($_POST['course_id']);
    $percentage = floatval($_POST['percentage']);
    
    // var_dump($name);
    // var_dump($age);
    // var_dump($date_of_birth);
    // var_dump($gender);
    // var_dump($phone);
    // var_dump($email);
    // var_dump($password);
    // var_dump($confirm_password);
    // var_dump($city_id);
    // var_dump($course_id);
    // var_dump($percentage);
    // exit;
    // Validate input data
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
        echo "<script>
            alert('$error_message');
            window.location.href = 'addStudent.php';
        </script>";
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO students (name, age, date_of_birth, gender, phone, email, password, city_id, course_id, percentage) 
            VALUES ('$name', '$age', '$date_of_birth', '$gender', '$phone', '$email', '$password', '$city_id', '$course_id', '$percentage')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Data inserted successfully');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error inserting data: " . mysqli_error($conn) . "');
            window.location.href = 'addStudent.php';
        </script>";
    }
}
?>