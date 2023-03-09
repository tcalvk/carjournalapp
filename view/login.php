<?php $login_message = filter_input(INPUT_GET, 'login_message'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Car Journal</title>
        <link rel="stylesheet" href="/carjournalapp/main.css"/>
    </head>
    <body>
        <header>
            <h1>Car Journal</h1>
        </header>
        <main>
            <h1>Login</h1>

            <form action="../index.php" method="post" class="aligned">
                <input type="hidden" name="action" value="login">

                <label>Email:</label>
                <input type="text" class="text" name="email">
                <br>

                <label>Password:</label>
                <input type="password" class="text" name="password">
                <br><br>

                <label>&nbsp;</label>
                <input type="submit" value="Login">&nbsp;
                <a href="../index.php?action=signup">Sign Up</a>
            </form>
            <p><?php echo $login_message; ?></p>
        </main>
    </body>
</html>