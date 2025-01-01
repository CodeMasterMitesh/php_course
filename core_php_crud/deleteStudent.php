<?php
include("connect_db.php");
    // debug($_GET);
    // exit;
    $student_id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id='$student_id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
                alert('Data Delete successfully');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Data not Delete. Error: " . mysqli_error($conn);
    }
?>