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
    <div class="card" style="width: 25rem;">
        <div class="card-header">
            DELETE MEDICATION
        </div>
        <form method="post" enctype="multipart/form-data" action="./deleteMedAction.php">
            <div class="form-group">
                <label>Medication Serial Number: </label>
                <input type="text" class="form-control" name="serialNumber" placeholder="Serial Number" required>
            </div>
            <button type="submit" class="btn " name="submit">Submit</button>
        </form>
    </div>
</body>
</html>