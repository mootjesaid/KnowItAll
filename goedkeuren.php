<?php
require_once "mysql.php";
$id = $_GET['gebruiker'];

$sql = "SELECT datum_ingezonden, weetje_ingezonden, gebruiker_id FROM weetjes_gebruikers WHERE  weetjes_gebruikers_id ='$id'";

$result = mysqli_query($GLOBALS["conn"], $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        $dingezonden = $row["datum_ingezonden"];
        $wingezonden = $row["weetje_ingezonden"];


    }
} else {
    echo "0 results";
}

// Attempt insert query execution
$sql = "INSERT INTO weetjes (weetje, datum) VALUES ('$wingezonden', '$dingezonden')";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost/Level%204/KnowItAll/admin.php");
}

// sql to delete a record
            $sql = "DELETE FROM weetjes_gebruikers WHERE weetjes_gebruikers_id = '$id'";

            if ($conn->query($sql) === TRUE) {

            } else {
                echo "Fout " . $conn->error;
            }

            $conn->close();

    // Close connection
    mysqli_close($link);



?>




<html>
<head>
</head>
<body>


</form>
</body>
</html>
