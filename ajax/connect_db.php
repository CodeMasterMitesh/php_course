<?php
    // session_start();
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentdb";

    $conn = mysqli_connect($hostname,$username,$password,$dbname);

    // if($conn){
    //     echo "Connect Sucessfully";
    // }else{
    //     echo "Connection Error";
    // }
function debug($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
    
?>