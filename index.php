
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="mysql.php">
    <script src="willekeurig.js"></script>
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
            <img src="Images/music.png">
            <a href="inloggen.php">Inloggen</a>
            <a href="willekeurig.php">Willekeurig weetje</a>
            <a  class="active" href="index.html">Home</a>
            <a  href="welkom.php">test</a>
        </div>
    </div>


</header>

<body>
<div class="titel">
    <h1 style="color: #F06292">Weetje van de dag</h1>
</div>

<div class="box0">
    <?php

    require_once "mysql.php"; //De file mysql.php hierbij toevoegen
    dagweetje();

    ?>
    

</div>

</body>

</html>
