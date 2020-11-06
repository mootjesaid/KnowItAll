<?php
// Include config file
require_once "mysql.php";

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styless.css">
        <link rel="stylesheet" href="index.php">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <img src="Images/music.png" alt="Music" class="responsive">
                <a href="welkom.php">Profiel</a>
                <a href="willekeurig.php">Willekeurig weetje</a>
                <a  class="active" href="index.php">profiel</a>
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
        session_start();

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
