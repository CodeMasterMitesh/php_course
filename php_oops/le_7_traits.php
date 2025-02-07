<!-- PHP implements a way to reuse code called Traits.

Traits are a mechanism for code reuse in single inheritance languages such as PHP. 
A Trait is intended to reduce some limitations of single inheritance by enabling a developer to reuse sets of methods freely in several independent classes living in different class hierarchies. 
The semantics of the combination of Traits and classes is defined in a way which reduces complexity, and avoids the typical problems associated with multiple inheritance and Mixins.

A Trait is similar to a class, but only intended to group functionality in a fine-grained and consistent way. It is not possible to instantiate a Trait on its own. 
It is an addition to traditional inheritance and enables horizontal composition of behavior; that is, the application of class members without requiring inheritance. -->

<?php
trait notification{
    public function message($n){
        echo "Good Morning ".$n ."<br>";
    }

    public function sayhello($n){
        echo "Hello Everyone ".$n ."<br>";
    }
}

trait bye{
    public function saybye($n){
        echo "Bye Bye Everyone ".$n ."<br>";
    }
}

class a{
    use notification,bye;
}

class b{
    use notification,bye;
}   

class c{
    use notification,bye;
}   

$a = new a();
$a-> message("From A Class");
$a-> sayhello("From A Class");
$a ->saybye("From A Class");

$b = new b();
$b-> message("From B Class");
$b-> sayhello("From B Class");

$c = new c();
$c-> message("From C Class");
$c-> sayhello("From C Class");

?>