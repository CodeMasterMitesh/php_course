<?php
    $array1 = array(array(77, 87), array(23, 45));
    $array2 = array("w3resource", "com");


    $newArray = array_merge($array1,$array2);


    function merger_array_by_index($x,$y){
        $temp = [];
        $temp[] = $x; 
        if(is_scalar($y)){
            $temp[] = $y;
        }else{
            foreach($y as $k => $v){
                $temp[] = $v;
            }
        }
        return $temp;
    }

    echo "<pre>";
    print_r(array_map('merger_array_by_index',$array2,$array1));
    
    // print_r($newArray);
    echo "</pre>";
?>