<?php
    $host= "localhost";
    $db_username= "root";
    $db_pass= "";
    $db_name="pharmacy";

    $con= mysqli_connect($host,$db_username,$db_pass,$db_name);

    /*end config*/
    if(mysqli_connect_error()){
        echo"connection error";
        mysqli_connect_error();
        exit();
    }
?>