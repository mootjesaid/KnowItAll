<?php
require_once 'mysql.php';


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
   <script src="willekeurig.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>KnowItAll</title>
</head>

<header>

    <div class="burgermenu">
        <div class="topnav2">
            <a href="#home" class="active2" style="color: rgb(255,192,203)">KnowItall</a>
            <!-- Navigation links (hidden by default) -->
            <div id="myLinks">
                <a href="#news">Home</a>
                <a href="#contact">Willekeurige weetje</a>
                <a href="#about">Inloggen</a>
            </div>
            <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>


    <div class="navigation">

        <div class="topnav">
            <img src="Images/music.png" alt="Music" class="responsive">
            <a href="inloggen.php">Inloggen</a>
            <a class="active" href="willekeurig.php">Willekeurig weetje</a>
            <a href="index.php">Home</a>
        </div>

    </div>
</header>

<body>

<div class="titel">
    <h1>Willekeurige weetje</h1>
</div>

<div class="box random-box">
    <form id="weetjeszoeker" method="post">
        <label for="dag">Kies een dag uit:</label>
        <input type="date" id="dag" name="datum">
        <input type="submit" name="submit" onchange="datum()">
    </form>
    <div class="weetjes">
        <?php
        agenda();
        ?>
    </div>

</div>




</body>

</html>
