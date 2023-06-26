<?php
    include('./db_config/connect.php');
    session_start();
    $id = $_SESSION['user_info']['id'];
    $ph_name= $_POST['ph_name'];
    $ph_address= $_POST['ph_Address'];

    $query="INSERT INTO pharma(address,phName,admin_id) VALUES('$ph_address','$ph_name','$id')";
    mysqli_query($con,$query);
    
    header('location:myPharma.php')
?>