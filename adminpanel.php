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
        <meta name="copyright" content="copyright">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styless.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="willekeurig.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <title>KnowItAll</title>
    </head>

    <header>
        <div class="container">
            <div class="container">
                <div class="topnav" id="myTopnav">
                    <img class="logo" id="logo" src="Images/music.png">
                    <?php if (isset($_SESSION["loggedin"])){?>
                        <a href="welkom.php">Profiel</a>
                    <?php } else { ?>
                        <a href="inloggen.php">Inloggen</a>
                    <?php } ?>
                    <a  href="willekeurig.php" class="active">Willekeurige weetjes</a>
                    <a href="index.php">KnowItAll</a>
                    <a href="javascript:void(0);" class="icon"  onclick="myFunction(); logo()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
    </header>

    <body>
    <div class="titel">
        <h1>Admin</h1>
        <p>
            <a href="uitloggenadmin.php" class="btn btn-danger">Uitloggen</a>
        </p>
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
                echo "<input class='btn btn-danger' style='width: 15vh'  type='submit'  name='afwijzen'  onclick='afwijzen($id) 'value='afwijzen'><input style='width: 15vh;background-color: dodgerblue; border-color: dodgerblue' class='btn btn-danger' type='submit' name='goedkeuren' onclick='goedkeuren($id)' value='goedkeuren'>  <br><br>";
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


        $sql = "SELECT id, gebruikersnaam FROM gebruikers";

        $result = mysqli_query($GLOBALS["conn"], $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];

                "<form class='123' method='get'>";
                echo "" . $row["gebruikersnaam"] . "<br>";
                echo "<input class='btn btn-danger' type='submit'  name='afwijzen' onclick='gebruikerverwijderen($id)'   value='Gebruiker verwijderen'> <br><br>";
                "</form>";

            }
        }
        ?>
    </div>
    </div>




    </body>

</html>
