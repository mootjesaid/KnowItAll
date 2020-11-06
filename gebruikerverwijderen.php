<?php
require_once "mysql.php";

$id = $_GET['gebruiker'];

$sql = "SELECT gebruikersnaam FROM gebruikers WHERE id ='$id'";

$result = mysqli_query($GLOBALS["conn"], $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo "" . $row["gebruikersnaam"] . "<br>";
        $gebruikersnaam = $row["gebruikersnaam"];
    }
} else {
    echo "0 results";
}

// verwijderd alle weetjes van gebruiker


$sql = "DELETE  FROM weetjes_gebruikers WHERE gebruiker_id = '$gebruikersnaam'";

if ($conn->query($sql) === TRUE) {
    echo "weetjes van gebruiker succesvol verwijderd";
} else {
    echo "Error verwijdering van weetjes gebruiker: " . $conn->error;
}

//verwijderd gebruiker
$sql = "DELETE  FROM gebruikers WHERE id = '$id' ";

if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/Level%204/KnowItAll/admin.php");
} else {
    echo "Error verwijdering van gebruiker: " . $conn->error;
}
$conn->close();





?>





<html>
<head>
</head>
<body>
<form class="welkomform" method="post">

</form>
</body>
</html>