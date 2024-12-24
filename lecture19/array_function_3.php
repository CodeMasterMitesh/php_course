<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions 3</title>
</head>
<body>

    <?php 
        // range(start,end,step)
        // create new array with two number or aplhabet
        $num = range(0,10);
        echo"<pre>";
        print_r($num);
        echo"</pre>";
        $a = range('A','Z',3);
        echo"<pre>";
        print_r($a);
        echo"</pre>";

        // array_filter()
        // filter data from array
       
        // $ab =  odd(9);
        $ab = array_filter($num, function($odd){
            if($odd % 2 != 0){
                return $odd;
            }
        });
        echo"<pre>";
        print_r($ab);
        echo"</pre>";
        // explode(seprator string limit)
        //  string to array ing explode()
        $text = "Patel Web Solution";
        $newArray = explode(" ",$text); 
        

        echo"<pre>";
        print_r($newArray);
        echo"</pre>";

        // implode(seprator,array)
        // array to string 
       $newText =  implode(" ",$newArray);
       echo $newText;
    ?>

</body>
</html>