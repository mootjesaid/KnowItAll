<?php
require_once "mysql.php";
$id = $_GET['gebruiker'];

// sql to delete a record
$sql = "DELETE FROM weetjes_gebruikers WHERE weetjes_gebrukers_id = '$id' ";

if ($conn->query($sql) === TRUE) {
    echo "Gebruiker succesvol verwijderd";
} else {
    echo "Error verwijdering van gebruiker: " . $conn->error;
}

$conn->close();

?>




<html>
<head>
</head>
<body>
</body>
</html>
