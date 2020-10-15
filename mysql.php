<?php
$gebruikersnaam = "root";
$wachtwoord = "";
$database = "knowitall";

$conn = mysqli_connect("localhost", $gebruikersnaam, $wachtwoord, $database);


    $gebruikersnaam = "root";
    $wachtwoord = "";
    $database = "knowitall";

    $conn = mysqli_connect("localhost", $gebruikersnaam, $wachtwoord, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'knowitall');

    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}




// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function dagweetje(){
    $sql = "SELECT datum, weetje, afbeelding, bron FROM weetjes WHERE DATE(actueel) = current_date ";

    $result = mysqli_query($GLOBALS["conn"], $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            echo "" . $row["datum"] . "<br><br>";
            echo "" . $row["weetje"] . "<br><br>";
            echo "<img src='images/" . $row["afbeelding"] . "' style='width: 300px'><br><br>";
            echo "" . $row["bron"] . "<br><br>";


        }
    } else {
        echo "0 results";
    }
}

function adminweetjes(){
    $sql = "SELECT weetje_ingezonden, datum_ingezonden FROM weetjes_gebruikers";


    $result = mysqli_query($GLOBALS["conn"], $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            echo "" . $row["datum_ingezonden"] . "<br>";
            echo "" . $row["weetje_ingezonden"] . "<br>";
            echo "<input type='submit' value='afwijzen'><input type='submit' value='Goedkeuren'> <br><br>";



        }
    } else {
        echo "0 results";
    }
}
?>

