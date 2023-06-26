<?php
    session_start();
    include('./db_config/connect.php');

    $email= $_POST['email'];
    $pass= $_POST['pass'];

    $query = "SELECT * FROM admin WHERE email='$email' && pass='$pass' ";
    $result= mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        $row= mysqli_fetch_assoc($result);
        $_SESSION['user_info']= $row;
        header('location:myPharma.php');
    }
    else{
        header("location:login.php?flag=1");
    }
?>