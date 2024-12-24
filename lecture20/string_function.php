<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Functions</title>
</head>
<body>
    
    <!-- string functions  -->
     <?php
        // 1 strlen()
        // Description: Returns the length of a string.
        $text = "   Hello World     ";
        echo $text;
        echo "<br>";
        echo "<hr>";
        // trim function remove whte space from begining and end of string 
        $newText = trim($text);
        echo $newText;

        echo "<br>";
        echo "<hr>";
        // length provide count of charactore 
        echo "length is ".strlen($newText);

        echo "<br>";
        echo "<hr>";
        // str_word_count string function return count of words
        $cName  = "Hello Patel Web Solution";

        $countOfCname =  str_word_count($cName);

        echo $countOfCname;

        echo "<br>";
        echo "<hr>";

        // strrev - reverse string 

        echo strrev($cName);

        echo "<br>";
        echo "<hr>";

        // strpos  -> find the position of particular word or string

       $p =  strpos($cName,"Web");
       echo $p;
       echo "<br>";
       echo "<hr>";
    // str_replace()
    // Description: Replaces all occurrences of a search string with a replacement string.
    // Hello - > hi,
     $nCname = str_replace("Hello","Hi,",$cName);
     echo $nCname;
    echo "<br>";
    echo str_replace("Web","Devlopment",$nCname);

        echo "<br>";
        echo "<hr>";
        // strtolower function do all charactore in small letter 
       $lower = strtolower($nCname);
     echo $lower;

       echo "<br>";
        echo "<hr>";
        // strtoupper function do all charactore in capital letter 
       $upper = strtoupper($nCname);
       echo $upper;

       echo "<br>";

       $po = strpos($upper,"SOLUTION");
       if($po){
           echo strtolower($po);
       }

       echo "<br>";
        echo "<hr>";

        // convert first charctore in capital in string
       echo ucfirst($lower);

       echo "<br>";
        echo "<hr>";

        // lcfirst Converts the first character of a string to lowercase.
       echo lcfirst($upper);

       echo "<br>";
       echo "<hr>";
    //    ucwords Converts the all fisrt character of a string to uppercase.
      echo ucwords($lower);

      echo "<br>";
       echo "<hr>";

    //  ltrim remove white space or other char for begining 
      $t = "  Hello  ";

     $lt= ltrim($t);

     echo $lt;
     echo "<br>";

     echo trim($t);

    //  echo $rt;
    echo "<br>";
    echo "<hr>";
    echo $nCname;
    echo "<br>";

    $email = "text@gmail.com";
    if(substr($email,-4,3) != ".com"){
        echo "Not Valid Email address";
    }else{
        echo "Email id Valid";
    }
    // echo substr($nCname,-4,3);

    echo "<br>";
    echo "<hr>";

    // convert in random string 
    // str_shuffle

    echo str_shuffle($email);

    echo "<br>";
    echo "<hr>";
    // repeat string 
    $tt = "Hello". "<br>";
   echo str_repeat($tt,2);
//    echo $tt;
    ?>      

</body>
</html>