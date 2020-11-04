<?php
require_once "mysql.php";
$id =

// sql to delete a record
$sql = "DELETE FROM gebruikers WHERE id = '$id' ";

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