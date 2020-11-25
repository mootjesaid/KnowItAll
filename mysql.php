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

function dagweetje()
{

    $sql = "SELECT datum, weetje, afbeelding, bron FROM weetjes WHERE DATE(actueel) = current_date ";

    $result = mysqli_query($GLOBALS["conn"], $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            echo "" . $row["datum"] . "<br><br>";
            echo "" . $row["weetje"] . "<br><br>";
            echo "<img src='Images/" . $row["afbeelding"] . "' style='width: 300px'><br><br>";
            echo "" . $row["bron"] . "<br><br>";

        }
    } else {
        if (!isset($_COOKIE["weetjes"])) {
            $sql = "SELECT ID, datum, weetje, afbeelding, bron FROM weetjes order by rand() limit 1";
            $result = mysqli_query($GLOBALS["conn"], $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $cookie_name = "weetjes";
                    $cookie_value = $row['ID'];
                    setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
                }
            }
        } elseif (isset($_COOKIE["weetjes"])) {

            $cookie = $_COOKIE["weetjes"];

            $sql = "SELECT ID, datum, weetje, afbeelding, bron FROM weetjes where ID = $cookie ";
            $result = mysqli_query($GLOBALS["conn"], $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "" . $row["datum"] . "<br><br>";
                    echo "" . $row["weetje"] . "<br><br>";
                    echo "<img src='Images/" . $row["afbeelding"] . "' style='width: 300px'><br><br>";
                    echo "" . $row["bron"] . "<br><br>";
                }
            }
        }
    }
}

function agenda()
{

    $datum2 = empty($_POST['datum']) ? '' : $_POST['datum'];
    $sql = "SELECT id, datum, weetje, afbeelding, bron FROM weetjes WHERE datum = '$datum2' LIMIT 1 ";

    $result = mysqli_query($GLOBALS["conn"], $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            echo "" . $row["datum"] . "<br><br>";
            echo "<img src='Images/" . $row["afbeelding"] . "' style='width: 20vh'><br><br>";
            echo "" . $row["weetje"] . "<br><br>";
            echo "" . $row["bron"] . "<br><br>";

            echo '<script type="text/javascript">
              document.getElementById("agendaweetje").style.display = "block";
            </script>';
        }
    }
}
?>
<script>

</script>

