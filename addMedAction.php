<?php
session_start();
include('./db_config/connect.php');
$id = $_SESSION['user_info']['id'];
$query1 = "SELECT * FROM pharma where admin_id='$id'";
$result = mysqli_query($con, $query1);
$row = mysqli_fetch_assoc($result);
$_SESSION['pharmacy_info'] = $row;
$ph_id = $_SESSION['pharmacy_info']['pharma_id'];

$name = addslashes($_POST['med_Name']);
$quantity = addslashes($_POST['quantity']);
$price = addslashes($_POST['price']);

// Check if the medication name already exists in the database
$queryCheck = "SELECT COUNT(*) AS count FROM medication m
INNER JOIN pharmamed pm ON m.md_id = pm.med_id
WHERE m.medName = '$name' AND pm.ph_id = '$ph_id'";
$resultCheck = mysqli_query($con, $queryCheck);
$rowCheck = mysqli_fetch_assoc($resultCheck);
$count = $rowCheck['count'];

if ($count > 0) {
    // Medication name already exists
    //echo "Medication name already exists in the database.";

    header("location:addMed.php?flag=1");

} else {

    $query = "INSERT INTO medication(medName) VALUES('$name')";
    mysqli_query($con, $query);

    //$query2 = "SELECT * FROM medication ORDER BY md_id desc Limit 1";
    //$result = mysqli_query($con, $query2);
    //$row = mysqli_fetch_assoc($result);
    //$_SESSION['addMed_info'] = $row;
    //$med_id = $_SESSION['addMed_info']['md_id'];

    // Retrieve the inserted medication ID
    $med_id = mysqli_insert_id($con);

    $query3 = " INSERT INTO pharmamed (ph_id,med_id,quantity,price) VALUES('$ph_id','$med_id','$quantity','$price')";
    mysqli_query($con, $query3);
    header("Location:myPharma.php");
}
