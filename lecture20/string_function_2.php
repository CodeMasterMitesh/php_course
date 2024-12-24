<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Functions PHP</title>
</head>
<body>
    <?php

        $text = "Patel Web solution";
        $text1 = "patel Web Solution";

        echo similar_text($text,$text1);
        echo "<br>";
        echo "<hr>";

        $string = 'It"s a" test!';
        echo addslashes($string);
        echo "<br>";
        echo $string;

        echo "<br>";
        echo "<hr>";

        // htmlspecialchars()
        // Description: Converts special characters to HTML entities.

        $string1 = "<a href='test'>FaceBook</a>";
        echo $string1;
        echo "<br>";
       echo htmlspecialchars($string1);

       echo "<br>";
        echo "<hr>";
    //    md5()
        // Description: Calculates the MD5 hash of a string.

        $password1 = "Mitesh@12345";
        $password = "Mitesh@1234";
        echo $password;
        echo "<br>";
        $hashPassword = (md5($password));
        echo $hashPassword;
        echo "<br>";
        if(md5($password) == $hashPassword){
            echo "Password Match";
        }else{
            echo "Password Wrong";
        }

        echo "<br>";
        echo "<hr>";

        $amount = 1213456.785555;
       echo number_format($amount,3," ",",");

       echo "<br>";
       echo "<hr>";

    //    str_contains()
    //    str_starts_with()
    //    str_ends_with()

    ?>

</body>
</html>