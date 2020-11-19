<?php
// Include config file
require_once "mysql.php";
session_start();

$sql = "SELECT gebruikersnaam FROM gebruikers ";

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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <meta name="description" content="KnowItall">
        <meta name="keywords" content="KnowItAll, weetjes">
        <meta name="copyright" content="copyright">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styless.css">
        <link rel="stylesheet" href="index.php">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <h1>Welkom</h1>
        <p>
            <a href="uitloggen.php" class="btn btn-danger">Uitloggen</a>
        </p>
    </div>

    <form class="welkomform" action="welkom.php" method="POST">
        <label for="dag">Kies een dag uit:</label>
        <input type="date" id="dag" name="datum">
        <label for="weetje"></label>
        <textarea name="insturen" id="insturen" maxlength="250"></textarea>
            <input type="submit" name="submit" class="btn btn-primary" value="verzendweetje">
        <h><br>
    </form>


    <div class="weetjesgebruiker">

        <?php


        $gebruikersnaamid = $_SESSION['gebruikersnaam'];
        echo "<h1>Hallo $gebruikersnaamid</h1>";
        $sql = "SELECT datum_ingezonden, weetje_ingezonden, gebruiker_id FROM weetjes_gebruikers WHERE  gebruiker_id ='$gebruikersnaamid'";

        $result = mysqli_query($GLOBALS["conn"], $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

                echo "" . $row["gebruiker_id"] . "<br>";
                echo "" . $row["datum_ingezonden"] . "<br>";
                echo "" . $row["weetje_ingezonden"] . "<br><br>";


            }
        } elseif ($gebruikersnaamid ){

        }
        else {
            echo "Geen ingestuurde weetjes.";
        }
        ?>

    </div>


    <?php





    // Define variables and initialize with empty values
    $gebruikersnaamid = $_SESSION['gebruikersnaam'];
    $weetje = $datum = "";
    $weetje_err = $datum_err = $gebruikersnaamid_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate username
        if(empty(trim($_POST["datum"]))){
            $datum_err = "Kies een datum.";
        } else{
            $datum = trim($_POST['datum']);
        }

        // Validate password
        if(empty(trim($_POST["insturen"]))){
            $weetje_err = "Vul een weetje in.";
        } else{
            $weetje = trim($_POST["insturen"]);
        }


        // Check input errors before inserting in database
        if(empty($datum_err) && empty($weetje_err)){

            // Prepare an insert statement
            $sql = "INSERT INTO weetjes_gebruikers (weetje_ingezonden, datum_ingezonden, gebruiker_id) VALUES (?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_weetje, $param_datum, $param_gebruikersid) ;

                // Set parameters
                $param_datum = $datum;
                $param_weetje = $weetje;
                $param_gebruikersid = $gebruikersnaamid;


                // Attempt to execute the prepared statement
                mysqli_stmt_execute($stmt);


                // Close statement
                mysqli_stmt_close($stmt);
            }
        }




        // Close connection
        mysqli_close($link);

    }


   ?>



    </body>

</html>
