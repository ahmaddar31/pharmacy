<?php
include("./db_config/connect.php");
session_start();
$id = $_SESSION['user_info']['id'];

$query1="SELECT * FROM pharma where pharma.admin_id=$id";
$result1 = mysqli_query($con, $query1);

$data1 = array();
if (mysqli_num_rows($result1) > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        array_push($data1, $row1);
    }
    $_SESSION['pharmacy'] = $data1;
}

$query = "SELECT * FROM admin 
INNER JOIN pharma ON admin.id=pharma.admin_id 
INNER JOIN pharmamed ON pharma.pharma_id=pharmamed.ph_id
INNER JOIN medication ON pharmamed.med_id=medication.md_id 
WHERE admin.id=$id ORDER BY pharma.phName";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);
$_SESSION['pharma_info'] = $row;
$pharmaID= $_SESSION['pharma_info']['pharma_id'];

$query = "SELECT * FROM pharma 
INNER JOIN pharmamed ON pharma.pharma_id=pharmamed.ph_id 
INNER JOIN medication ON pharmamed.med_id=medication.md_id
WHERE pharma.admin_id=$id AND pharma.pharma_id=$pharmaID ORDER BY pharma.phName";
$result = mysqli_query($con, $query);
$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($data, $row);
    }
    $_SESSION['med_info'] = $data;
}

$query = "SELECT * FROM user u INNER JOIN reservation r ON u.userID=r.userID";
$result =mysqli_query($con, $query);
$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($data, $row);
    }
    $_SESSION['reservation_info'] = $data;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-4.6.2-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="Style1.css">
</head>

<body>
    <center>
    <?php
        if(isset($_SESSION['user_info'])){?>
        <header class="head">
            <div><a href="logout.php">Logout</a></div>
        </header>
        <?php 
    }else{?>
        <header class="head">
            <div><a href="login.php">Login</a></div>
        </header>
    <?php }
    ?>

        <div id="carouselExampleControls" class="carousel slide img-fluid" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h1 class="ph_name"><?php echo $_SESSION['pharma_info']['phName'] ?></h1>
                    <h3 class="ph_adr"><?php echo $_SESSION['pharma_info']['address'] ?></h3>
                    <img class="img-fluid  w-100 over_img" src="./images/pharma1.jpg" alt="First slide">
                </div>
            </div>
        </div>
        <hr>
        <div class="container" style="margin: 3px 4%">
            <div class="row">
                <?php
                $cardCount = 0; // Counter to keep track of the number of cards
                for ($i = 0; $i < count($_SESSION['pharmacy']); $i++) {
                    if (isset($_SESSION['pharmacy'][$i])) {
                        $ph_id = $_SESSION['pharmacy'][$i]['pharma_id'];
                        $phName = $_SESSION['pharmacy'][$i]['phName'];
                        $address = $_SESSION['pharmacy'][$i]['address'];

                        // Open a row div for every third card
                        if ($cardCount % 3 == 0) {
                            echo '<div class="w-100"></div>'; // Clear the previous row and start a new row
                        }
                ?>
                        <div class="col-md-4">
                            <div class="card" style="box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.3);">
                                <div class="card-header">
                                     <?php echo $phName; ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $address; ?></h5>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn badge badge-pill btnr" onclick="openWindow()">view</button>
                                    
                                </div>
                            </div>
                        </div>
                <?php
                        $cardCount++;
                    }
                }
                ?>
            </div>
        </div>
        <hr>
        <div id="medicationDetails" style=" display:none;">
        <h1>Medication: </h1>
        <br>
        <div  class="container" style="margin: 3px 3%;">
            <div class="row">
                <?php
                $cardCount = 0; // Counter to keep track of the number of cards
                for ($i = 0; $i < count($_SESSION['med_info']); $i++) {
                    if (isset($_SESSION['med_info'][$i])) {
                        $md_id = $_SESSION['med_info'][$i]['md_id'];
                        $medName = $_SESSION['med_info'][$i]['medName'];
                        $quantity = $_SESSION['med_info'][$i]['quantity'];
                        $price = $_SESSION['med_info'][$i]['price'];

                        // Open a row div for every third card
                        if ($cardCount % 3 == 0) {
                            echo '<div class="w-100"></div>'; // Clear the previous row and start a new row
                        }
                ?>
                        <div class="col-md-4">
                            <div class="card" style="box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.3);">
                                <div class="card-header">
                                    Serial Number: <?php echo $md_id; ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $medName; ?></h5>
                                    <p class="card-text">Quantity: <?php echo $quantity; ?></p>
                                    <p class="card-text">Price: <?php echo '$', $price; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                        $cardCount++;
                    }
                }
                ?>
            </div>
        </div>

        <br>
        <a href="./addMed.php">
            <button type="button" class="btn badge badge-pill">Add new</button>
        </a>
        <a href="./deleteMed.php">
            <button type="button" class="btn badge badge-pill">Delete</button>
        </a>
        </div>
        <hr>
        <h1>Reservations: </h1>
        <div class="container" style="margin: 3px 4%">
            <div class="row">
                <?php
                $cardCount = 0; // Counter to keep track of the number of cards
                for ($i = 0; $i < count($_SESSION['reservation_info']); $i++) {
                    if (isset($_SESSION['reservation_info'][$i])) {
                        $username = $_SESSION['reservation_info'][$i]['name'];
                        $address = $_SESSION['reservation_info'][$i]['address'];
                        $DOB = $_SESSION['reservation_info'][$i]['DOB'];
                        $qty = $_SESSION['reservation_info'][$i]['qtyReserved'];
                        $total_price = $_SESSION['reservation_info'][$i]['total_price'];


                        // Open a row div for every third card
                        if ($cardCount % 3 == 0) {
                            echo '<div class="w-100"></div>'; // Clear the previous row and start a new row
                        }
                ?>
                        <div class="col-md-4">
                            <div class="card" style="box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.3);">
                                <div class="card-header">
                                     <?php echo $username; ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Address: <?php echo $address; ?></h5>
                                    <p class="card-title">date of birth: <?php echo $DOB; ?></p>
                                    <p class="card-title">quantity: <?php echo $qty; ?></p>
                                    <p class="card-title">price: <?php echo $total_price; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                        $cardCount++;
                    }
                }
                ?>
            </div>
        </div>
        <script>
                function openWindow() {
                document.getElementById('medicationDetails').style.display = 'block';
            }
        
        </script>
</body>

</html>