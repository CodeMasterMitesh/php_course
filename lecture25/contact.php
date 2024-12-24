<?php
    //  echo "<pre>";
    //  print_r($_GET);
    //  echo "</pre>";

    // echo "My Name is " .$_GET['fname'] ." ".  $_GET['lname'] 
    // . "Mobile Number is ". $_GET['mobile'] . "and email id is " .$_GET['email'];



    

    // echo "<pre>";
    //  print_r($_POST);
    //  echo "</pre>";

    // echo "My Name is " .$_POST['fname'] ." ".  $_POST['lname'] . " " 
    // . "Mobile Number is ". $_POST['mobile'] . " and email id is " .$_POST['email']. ".";

    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";

    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";

   echo "My Name is " .$_REQUEST['fname'] ." ".  $_REQUEST['lname'] . " " 
   . "Mobile Number is ". $_REQUEST['mobile'] . " and email id is " .$_REQUEST['email']. ".";
?>