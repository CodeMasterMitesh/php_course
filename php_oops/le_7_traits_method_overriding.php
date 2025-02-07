<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
trait notification{
    protected function message($n){
        echo "Good Morning From Notification Traits and call ".$n ."<br>";
    }

    protected function sayhello($n){
        echo "Hello Everyone From Notification Traits and Call ".$n ."<br>";
    }
}

trait bye{
    protected function saybye($n){
        echo "Bye Bye Everyone ".$n ."<br>";
    }
    protected function sayhello($n){
        echo "Hello Everyone from bye Traits and Call ".$n ."<br>";
    }
}

class a{
    // use notification,bye;
    public function message($n){
        echo "Good Morning From A class and Call ".$n ."<br>";
    }
}

class childClass extends a{
    use notification,bye{
        bye::sayhello insteadOf notification;
        notification::sayhello as public newsayhello;
        bye::sayhello as public;
    }
    public function message($n){
        echo "Good Morning ".$n ."<br>";
    }
}

  

$a = new childClass();
$a-> message("From Child Class");
$a -> sayhello("From Child Class");
$a -> newsayhello("From Child Class");



?>