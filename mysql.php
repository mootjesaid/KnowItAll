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




// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

