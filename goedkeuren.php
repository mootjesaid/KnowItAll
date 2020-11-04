<?php
require_once "mysql.php";
$id = $_GET['gebruiker'];

echo $id;

$sql = "SELECT datum_ingezonden, weetje_ingezonden, gebruiker_id FROM weetjes_gebruikers WHERE  weetjes_gebruikers_id ='$id'";

$result = mysqli_query($GLOBALS["conn"], $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo "" . $row["gebruiker_id"] . "<br>";
        echo "" . $row["datum_ingezonden"] . "<br>";
        echo "" . $row["weetje_ingezonden"] . "<br><br>";

        $dingezonden = $row["datum_ingezonden"];
        $wingezonden = $row["weetje_ingezonden"];


    }
} else {
    echo "0 results";
}



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id_err = "";
    // Check input errors before inserting in database
    if(empty($id_err)){

        // Prepare an insert statement
        $sql = " INSERT INTO weetjes (weetje, datum)VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_weetje, $param_datum) ;

            // Set parameters
            $param_datum = $dingezonden ;
            $param_weetje = $wingezonden;


            // Attempt to execute the prepared statement
            mysqli_stmt_execute($stmt);
// sql to delete a record
            $sql = "DELETE FROM weetjes_gebruikers WHERE weetjes_gebruikers_id = '$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            $conn->close();


            // Close statement
            mysqli_stmt_close($stmt);
        }
    }




    // Close connection
    mysqli_close($link);

}


?>




<html>
<head>
</head>
<body>
<form class="welkomform" method="post">
    <input type="submit" class="btn btn-primary" value="verzendweetje">

</form>
</body>
</html>
