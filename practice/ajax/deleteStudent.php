<?php
include("connect_db.php");
    // debug($_GET);
    // exit;
    $student_id = $_POST['id'];
    $sql = "DELETE FROM students WHERE id='$student_id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
?>