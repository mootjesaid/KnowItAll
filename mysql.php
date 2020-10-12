<?php
$gebruikersnaam = "root";
$wachtwoord = "";
$database = "knowitall";

$conn = mysqli_connect("localhost", $gebruikersnaam, $wachtwoord, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
