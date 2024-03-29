<?php $login_message = filter_input(INPUT_GET, 'login_message'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Car Journal</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>
    <body>
        <main>
            <div class="container-fluid">
                <h2>Car Journal</h2>
                <h3>Login</h3>
                <form action="../index.php" method="post" class="aligned">
                    <input type="hidden" name="action" value="login">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Login">&nbsp;
                    <a href="../index.php?action=signup">Sign Up</a>
                </form>
                <p><?php echo $login_message; ?></p>
            </div>
        </main>
    </body>
</html>