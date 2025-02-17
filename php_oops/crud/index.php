<?php
include 'database.php';
// print_r($conn->error);

$data= ["name"=>"Chama Chameli","age"=>35,"date_of_birth"=>"1988-02-05","gender"=>"M","phone"=>"1221331445","email"=>"champa@gmail.com"];
$conn -> insertDb("students",$data);
?>