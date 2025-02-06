<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    class Person{
        static $name = "Mitesh"; // property // static member variable
        static function showData(){ // //static member function // static member methods
            echo "My Name is ".self::$name."<br>";
        }
    }

    class Student extends Person{
        function __construct($n){
            parent::$name = $n;
        }
        function getData(){
            echo "Student Name is ".parent::$name;
        }
    }

    // echo Person::$name = "Mitesh Prajapati <br>";
    // echo Person::showData();
    // $p = new Person();
    // Person::$name ="Bharat";
    // $p ->showData();

    $s = new Student("Sandip");
    $s -> getData();
?>