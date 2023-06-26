<?php
    session_start();
    include('./db_config/connect.php');

    $email= $_POST['email'];
    $pass= $_POST['password'];

    $query = "SELECT * FROM user WHERE email='$email' && password='$pass' ";
    $result= mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        $row= mysqli_fetch_assoc($result);
        $_SESSION['userlog_info']= $row;
        header('location:index.php');
    }
    else{
        header("location:login.php?flag=1");
    }
?>