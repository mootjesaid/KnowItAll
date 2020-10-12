<?php
$gebruikersnaam = "root";
$wachtwoord = "";
$database = "knowitall";

$conn = mysqli_connect("localhost", $gebruikersnaam, $wachtwoord, $database);

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

            echo "" . $row["bron"] . "<br><br>";


        }
    } else {
        echo "0 results";
    }

    mysqli_close($GLOBALS["conn"]);
}