
<?php
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
        <title>KnowItAll</title>
    </head>

    <header>
        <div class="navigation">

            <div class="topnav">
                <img src="Images/music.png" alt="Music" class="responsive">
                <a href="inloggen.php">Inloggen</a>
                <a href="willekeurig.html">Willekeurig weetje</a>
                <a  class="active" href="index.html">Home</a>
                <a  class="active" href="welkom.php">test</a>
            </div>
        </div>
    </header>

    <body>
    <div class="titel">
        <h1>Admin</h1>
    </div>

    <div class="boxes">
    <div class="box">
        <?php
        // Include config file
        require_once "mysql.php";
        echo "<h2>Ingestuurde weetjes</h2>";

        $sql = "SELECT weetjes_gebruikers_id, weetje_ingezonden, datum_ingezonden, bron, gebruiker_id FROM weetjes_gebruikers";

        $result = mysqli_query($GLOBALS["conn"], $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

                $id     = $row["weetjes_gebruikers_id"];
                $gebruikersid   = $row["gebruiker_id"];

                "<form class='123' method='get'>";
                echo "" . $row["datum_ingezonden"] . "<br>";
                echo "" . $row["weetje_ingezonden"] . "<br>";
                echo "" . $row["gebruiker_id"] . "<br>";
                echo "<input type='submit'  name='afwijzen'  onclick='goedkeuren($id) 'value='afwijzen'><input type='submit' name='goedkeuren' onclick='goedkeuren($id)' value='goedkeuren'> <input type='submit'  name='afwijzen' onclick='gebruikerverwijderen($gebruikersid)'   value='Gebruiker verwijderen'> <br><br>";
                "</form>";


                $gebruikersnaam = $row["gebruiker_id"];
                $datum = $row["datum_ingezonden"];
                $weetje = $row["weetje_ingezonden"];

                $GLOBALS[$gebruikersnaam] = $gebruikersnaam;
                $GLOBALS[$datum] = $datum;
                $GLOBALS[$weetje] = $weetje;
            }
        }
        ?>

    </div>

    <div class="box">
        <?php
        echo "<h2>Gebruikers</h2>";
        // Include config file
        require_once "mysql.php";

        $sql = "SELECT id, gebruikersnaam FROM gebruikers";

        $result = mysqli_query($GLOBALS["conn"], $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];

                "<form class='123' method='get'>";
                echo "" . $row["gebruikersnaam"] . "<br>";
                echo "<input type='submit'  name='afwijzen' onclick='gebruikerverwijderen($id)'   value='Gebruiker verwijderen'> <br><br>";
                "</form>";

            }
        }
        ?>
    </div>
    </div>




    </body>

</html>
