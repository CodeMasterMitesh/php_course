<?php
include("connect_db.php"); // Include database connection

// Check if all required fields are provided
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data using a prepared statement
    $sql = "INSERT INTO students (name, age, date_of_birth, gender, phone, email, password, city_id, course_id, percentage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sisssssiii", $name, $age, $date_of_birth, $gender, $phone, $email, $hashed_password, $city_id, $course_id, $percentage);

        if ($stmt->execute()) {
            echo 1; // Success
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
$conn->close();
?>
