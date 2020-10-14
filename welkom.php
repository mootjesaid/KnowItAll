<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
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
        <link rel="stylesheet" href="index.php">
        <title>KnowItAll</title>
    </head>

    <header>
        <div class="navigation">

            <div class="topnav">
                <img src="Images/music.png">
                <a href="welkom.php">Profiel</a>
                <a href="willekeurig.html">Willekeurig weetje</a>
                <a  class="active" href="index.php">profiel</a>
            </div>
        </div>
    </header>

    <body>

    <div class="titel">
        <h1>Welkom</h1>
    </div>

    <p>
        <a href="uitloggen.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>



    </body>

</html>
