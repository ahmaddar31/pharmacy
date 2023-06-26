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
            <div><a href="userLogin.php">Login</a></div>
            <div><a href="userRegistration.php">Signup</a></div>
        </header>
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                create account
            </div>
            <form method="post" action="./userRegAction.php">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
                
                <div class="form-group">
                    <label>Address: </label>
                    <input type="text" class="form-control" name="Address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label>email: </label>
                    <input type="email" class="form-control" name="textEmail" placeholder="email">
                </div>
                <div class="form-group">
                    <label>password: </label>
                    <input type="password" class="form-control" name="textPass" placeholder="password">
                </div>
                <div class="form-group">
                    <label>date: </label>
                    <input type="datetime-local" class="form-control" name="textDate">
                </div>
                <button type="submit" class="btn " name="submit">Submit</button>
                </div>
            </form>
        </div>
</body>