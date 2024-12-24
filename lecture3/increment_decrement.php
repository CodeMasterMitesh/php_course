<!-- PHP Increment / Decrement Operators :- 
++$x	Pre-increment	Increments $x by one, then returns $x	
$x++	Post-increment	Returns $x, then increments $x by one	
--$x	Pre-decrement	Decrements $x by one, then returns $x	
$x--	Post-decrement	Returns $x, then decrements $x by one -->

<?php
    $x = 10;
    $y = $x++; // 10 + 1
    echo $x;

    echo "<br>";

    $ab = 15;
    $ans = ++$ab; //1 + 15
    echo "value of ab is : ".$ans;
?>