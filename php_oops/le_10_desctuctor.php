<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// get  -> non existing property and private property access outside class 
// set  -> when we try set value of non existing property and private property access outside class
    class Student{
        
        private $name,$roll_no,$std;
        private $data = ["name"=>"Mitesh","roll_no"=>101,"std"=>"b.tech"];
        public function __construct($n,$r,$s){
            $this->name = $n;
            $this->roll_no = $r;
            $this->std = $s;
        }
        
        // public function showInformation(){
        //     echo "Student Name is ".$this->name." and Roll No is ".$this->roll_no.
        //     " and standard is ".$this->std.".";
        // }

        function __destruct(){
            echo "Student Name is ".$this->name." and Roll No is ".$this->roll_no.
            " and standard is ".$this->std.".";
        }

        function __get($property){
            echo "You Access Private or Non existing Property($property)<br>";
        }

        function __set($property1,$value){
            echo "You set Access Private or Non existing Property($property1) and value is ($value)<br>";
        }
    }

    $s = new Student("Mitesh",101,"B.Tech Sem I");
    // $s ->showInformation();
    $s->marks = "Bharat Rangani";
    print_r($s->data["marks"] = 55);

?>