
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
        <title>KnowItAll</title>
    </head>

    <header>
        <div class="navigation">

            <div class="topnav">
                <img src="Images/music.png">
                <a href="welkom.php">Profiel</a>
                <a href="willekeurig.html">Willekeurig weetje</a>
                <a  class="active" href="index.php">profiel</a>
            </div>
        </div>
    </header>

    <body>

    <div class="titel">
        <h1>Welkom</h1>
    </div>

    <form class="welkomform" method="POST">
        <label for="dag">Kies een dag uit:</label>
        <input type="date" id="dag" name="datum">
        <label for="weetje">Weetje:</label>
        <textarea name="insturen" id="insturen" maxlength="250"></textarea>
        <input type="submit" name="submit" class="btn btn-primary" value="verzendweetje" style="background-color: #F06292; color: white; display: block; margin-left: auto; margin-right: auto;">
        <h><br>
    </form>


    <p>
        <a href="uitloggen.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

    <?php
    // Include config file
    require_once "mysql.php";
    // Define variables and initialize with empty values
    $weetje = $datum = "";
    $weetje_err = $datum_err = "";

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
            $sql = "INSERT INTO weetjes_gebruikers (weetje_ingezonden, datum_ingezonden) VALUES (?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_weetje, $param_datum);

                // Set parameters
                $param_datum = $datum;
                $param_weetje = $weetje;

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
