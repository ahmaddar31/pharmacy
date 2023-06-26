<?php 
    session_start();
    include('./db_config/connect.php');

    $serialNumber= $_POST['serialNumber'];
    $query= "DELETE FROM medication WHERE md_id='$serialNumber'";
    mysqli_query($con,$query);
    $query1= "DELETE FROM pharmamed WHERE med_id='$serialNumber'";
    mysqli_query($con,$query1);
    header("Location:myPharma.php");
?>