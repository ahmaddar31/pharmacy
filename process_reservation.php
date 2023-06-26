<?php
session_start();
include('./db_config/connect.php');
    $quantity = $_POST['qty'];
    $price = $_POST['price'];

    $totalPrice = $quantity * $price;
    $user_id = $_SESSION['userlog_info']['userID'];

    $query2 = "INSERT INTO reservation(userID, qtyReserved, total_price) 
    VALUES('$user_id','$quantity','$totalPrice')";
    mysqli_query($con, $query2);
    header("Location:index.php");



?>