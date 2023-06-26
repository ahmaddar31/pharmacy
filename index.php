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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['userlog_info'])) { ?>
            <header class="head">
                <div><a href="userlogout.php">Logout</a></div>
            </header>
        <?php
        } else { ?>
            <header class="head">
                <div><a href="userLogin.php">Login</a></div>
            </header>
        <?php }
        ?>

        <div id="carouselExampleControls" class="carousel slide img-fluid" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid  w-100 over_img" src="./images/pharma2.jpg" alt="First slide">
                </div>
            </div>
        </div>

        <div class="container">
            <form class="form-inline" action="indexAction.php" method="POST">
                <input class="form-control mr-sm-2" type="search" name="md_Name" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
</body>

</html>