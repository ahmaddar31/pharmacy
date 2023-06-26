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
        session_start();
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
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                ADD NEW PHARMACY
            </div>
            <form method="post" action="./newPharmaAction.php">
                <div class="form-group">
                    <label>Pharmacy Name: </label>
                    <input type="text" class="form-control" name="ph_name" placeholder="name">
                </div>
                
                <div class="form-group">
                    <label>Address: </label>
                    <input type="text" class="form-control" name="ph_Address" placeholder="Address">
                </div>
                <button type="submit" class="btn " name="submit">Submit</button>
                </div>
            </form>
        </div>
</body>