
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
    <link rel="stylesheet" href="mysql.php">
    <title>KnowItAll</title>
</head>

<header>
    <div class="navigation">

        <div class="topnav">
            <img src="Images/music.png">
            <a href="inloggen.html">Inloggen</a>
            <a href="willekeurig.html">Willekeurig weetje</a>
            <a  class="active" href="index.html">Home</a>
            <a  class="active" href="jojo.php">test</a>
        </div>
    </div>
</header>

<body>
<div class="titel">
    <h1>Weetje van de dag</h1>
</div>

<div class="box">

    <?php

    require_once "mysql.php"; //De file mysql.php hierbij toevoegen
    dagweetje();





    ?>
</div>

</body>

</html>
