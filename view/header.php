<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Journal</title>
    <link rel="stylesheet" href="/carjournalapp/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <h1>Car Journal</h1>
        <p>Welcome</p>
        <p>
            <form action="/carjournalapp/" method="post">
                <input type="hidden" name="action" value="logout">
                <input type="submit" value="Logout">
            </form>
        </p>
    </header>
