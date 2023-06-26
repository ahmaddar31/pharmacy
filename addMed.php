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
        <header class="head">
            <div><a href="index.php">Home</a></div>
        </header>
        <?php
            if(isset($_GET['flag'])){
                if($_GET['flag']==1){
                    echo "<script>alert('Medicine Name Already Exist')</script>";
                }
            }
        ?>
        <div class="card" style="width: 25rem;">
            <div class="card-header">
                ADD MEDICATION
            </div>
            <form method="post" enctype="multipart/form-data" action="./addMedAction.php">
                <div class="form-group">
                    <label>Medication Name: </label>
                    <input type="text" class="form-control" name="med_Name" placeholder="Medication Name" required>
                </div>
                <div class="form-group">
                    <label>Quantity: </label>
                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" required>
                </div>
                <div class="form-group">
                    <label>Price: </label>
                    <input type="text" class="form-control" name="price" placeholder="Price" required>
                </div>
                <button type="submit" class="btn " name="submit">Submit</button>
            </form>
        </div>
</body>

</html>