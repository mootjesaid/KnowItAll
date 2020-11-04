<?php
require_once "mysql.php";
$id = $_GET['gebruiker'];

// sql to delete a record
$sql = "DELETE FROM weetjes_gebruikers WHERE weetjes_gebrukers_id = '$id' ";

if ($conn->query($sql) === TRUE) {
    echo "Weetje succesvol verwijderd";
} else {
    echo "Error verwijdering van weetje: " . $conn->error;
}

$conn->close();

?>




<html>
<head>
</head>
<body>
<form class="welkomform" method="post">
    <input type="submit" class="btn btn-primary" value="">

</form>
</body>
</html>
