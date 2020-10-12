<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type"
              Content="text/html;
                  charset=UTF-8">
        <meta name="robots" content="all">
        <meta name="language" content="Dutch">
        <meta name="author" content="Mohamed">
        <meta name="description" content="KnowItall">
        <meta name="keywords" content="KnowItAll, weetjes">
        <meta name="copyright" content="copyright">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styless.css">

        <title>KnowItAll</title>

    </head>

    <header>
        <div class="navigation">

            <div class="topnav">
                <img src="Images/music.png">
                <a class="active" href="inloggen.html">Inloggen</a>
                <a href="willekeurig.html">Willekeurig weetje</a>
                <a href="index.html">Home</a>
            </div>

        </div>

    </header>

    <body>

    <div class="titel">
        <h1>Inloggen</h1>
    </div>
    <form action="inloggen.php">

    <div class="box2">
        <div class="container">
            <label for="Gebr"><b>Gebruikersnaam</b></label>
            <input type="text" placeholder="Vul uw gebruikersnaam in..." name="uname" required>

            <label for="WW"><b>Wachtwoord</b></label>
            <input type="password" placeholder="Vul uw wachtwoord in" name="psw" required>

            <button type="submit">Inloggen</button>
        </div>

        <div class="container">
            <span class="psw"><a href="#">Wachtwoord vergeten?</a></span>
        </div>
        </form>

    </div>
    </body>
</html>

<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

$link = mysqli_connect(DB_SERVER, root, , DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>