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
            <h1>Sign Up</h1>

            <form action="." method="post" class="aligned">
                <input type="hidden" name="action" value="check_signup">

                <label>First Name:</label>
                <input type="text" name="first_name">
                <br>

                <label>Last Name:</label>
                <input type="text" name="last_name">
                <br>

                <label>Email:</label>
                <input type="text" class="text" name="email">
                <br>

                <label>Password:</label>
                <input type="password" class="text" name="password">
                <br>

                <label>&nbsp;</label><br>
                <input type="submit" value="Sign Up">
            </form>
        </main>
    </body>
</html>