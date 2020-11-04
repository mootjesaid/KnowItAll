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
    <link rel="script" href="willekeurig.js">


    <title>KnowItAll</title>
</head>

<header>
    <div class="navigation">

        <div class="topnav">
            <img src="Images/music.png">
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

<div class="box2">
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

?>