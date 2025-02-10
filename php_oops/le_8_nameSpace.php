<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
    require("first.php");
    require("second.php");

    $t = new mainTest\test();
    $t = new secondTest\test();
?>