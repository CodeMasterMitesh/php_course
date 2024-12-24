<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>string function in php</title>
</head>
<body>

<!-- 
bin2hex()
 

hex2bin
chr()
ord() -->

<?php

   $text = "Patel Web Solution";
   echo $hexa =  bin2hex($text);
   echo "<br>";
   echo hex2bin($hexa);

   echo "<br>";
   echo "<hr>";

    // concert ascii to decimle 
  echo chr(65);
    // text to binary 
 echo ord('B');


?>
    
</body>
</html>