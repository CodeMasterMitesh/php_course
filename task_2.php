<?php
// 200,204,208,212,216,220,224,228,232,236,240,244,248
$start = 200;
$n = 250;
for($i = $start;$i <= $n;$i++)
{
    if($i % 4 == 0){
        echo $i.",";
    }
}
?>