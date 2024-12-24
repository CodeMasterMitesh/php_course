<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!-- PHP Logical Operators :- 
        and	And	$x and $y	True if both $x and $y are true	
        or	Or	$x or $y	True if either $x or $y is true	
        xor	Xor	$x xor $y	True if either $x or $y is true, but not both	
        &&	And	$x && $y	True if both $x and $y are true	
        ||	Or	$x || $y	True if either $x or $y is true	
        !	Not	!$x	True if $x is not true -->
        <!-- expression 
        $x = $a < $b  &&  $x > $y  ; // true or false -->

        <?php 
            $a = 26;
            $b = 25;

            $c = 31;
            $d = 45;

            // use && only

            // $ans = ($a > $b) && ($c > $d);

            // ||  and or both same
            // $ans = !($a < $b);
            //xor  if x or y 

            $ans = ($a < $b) xor ($c > $d);

            var_dump($ans);

        ?>
</body>
</html>
