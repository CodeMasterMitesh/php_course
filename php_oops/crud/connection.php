<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "studentdb";

$conn = new mysqli($db_host,$db_user,$db_pass,$db_name);

if($conn->connect_error){
    echo "Failed to connect: " . $conn->connect_error;
    exit;
}

$sql = "SELECT id,name,age,gender,phone from students where 1";
$query = $conn->query($sql);
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        echo "ID : ".$row['id']." Name : ".$row['name']." Age : ".$row['age']." Gender : ".$row['gender']." Phone : ".$row['phone']." <br>";
    }
}   

// mysqli_query();    -> $conn->query();
// mysqli_affected_rows(); -> $conn -> affected_rows();
// mysqli_num_rows();     -> $conn -> num_rows();
// mysqli_fetch_array();
// mysqli_fetch_assoc();
// mysqli_fetch_all();



?>