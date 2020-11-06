<?php
require_once "mysql.php";
$id = $_GET['gebruiker'];

$sql = "DELETE FROM weetjes_gebruikers WHERE weetjes_gebruikers_id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/Level%204/KnowItAll/admin.php");

    exit();

} else {
    echo "Fout " . $conn->error;
}

$conn->close();

?>

<html>
<head>
</head>
<body>
</body>
</html>
