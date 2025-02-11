<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// require("files/first.php");
// require("files/second.php");

spl_autoload_register(function ($files){
   require 'files/'.$files.'.php';

});


$f = new first();
$s = new second();
?>