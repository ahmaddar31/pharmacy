<?php
    include('./db_config/connect.php');

    $username= $_POST['name'];
    $Address= $_POST['Address'];
    $email= $_POST['textEmail'];
    $pass= $_POST['textPass'];
    $date= $_POST['textDate'];

    $query="INSERT INTO user(name,email,password,address,DOB) VALUES('$username','$email','$pass','$Address','$date')";
    mysqli_query($con,$query);
    
    header('location:index.php')
?>