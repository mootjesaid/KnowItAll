<?php
require_once "mysql.php";
session_start();
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <meta name="copyright" content="copyright">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="mysql.php">
    <script src="willekeurig.js"></script>
    <title>KnowItAll</title>
</head>

<header>
    <div class="container">
        <div class="topnav" id="myTopnav">

            <img class="logo" id="logo" src="Images/music.png">
            <?php if (isset($_SESSION["loggedin"])){?>
                <a href="welkom.php">Profiel</a>
            <?php } else { ?>
                <a href="inloggen.php">Inloggen</a>
            <?php } ?>
            <a  href="willekeurig.php">Willekeurige weetjes</a>
            <a class="active" href="index.php">KnowItAll</a>
            <a href="javascript:void(0);" class="icon"  onclick="myFunction(); logo()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
</header>

<body>
<div class="titel">
    <h1 style="color: #F06292">Weetje van de dag</h1>
</div>

<div class="box0">
    <?php

    dagweetje();


    ?>
    

</div>

</body>

</html>
