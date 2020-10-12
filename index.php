

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

    $sql = "SELECT ID, weetje, afbeelding, datum, bron, actueel FROM weetjes ORDER BY rand() limit 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            echo "" . $row["datum"]. "<br><br>";
            echo "" . $row["weetje"]. "<br><br>";

            echo "" . $row["bron"]. "<br><br>";


        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>
</div>

</body>

</html>
