<?php
include 'database.php';
// print_r($conn->error);
// $data= ["name"=>"Chama Chameli","age"=>35,"date_of_birth"=>"1988-02-05","gender"=>"M","phone"=>"1221331445","email"=>"champa@gmail.com"];
$table = "students";
// $uData= ["name"=>"Kanu Patel","age"=>42,"date_of_birth"=>"1970-05-15","gender"=>"M","email"=>"kanu2@gmail.com"];
// $conn -> insertDb("students",$data);
// $conn -> updateDb($table,$uData,"city_id=3");
$conn -> deleteDb($table,"id=71");
?>