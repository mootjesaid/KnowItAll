<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="nl">
    <title>test</title>
</head>



<?php

// Get the image and convert into string
$img = file_get_contents('C:\xampp\htdocs\Level 4\KnowItAll\Images/JB.jpg');

// Encode the image string data into base64
$data = base64_encode($img);

// Display the output
echo $data; // <-- deze string sla je op in je tabel




?>



<body>
<?php
echo '<img src="data:image/jpg;base64,' . $data . '" />';
?>
</body>
</html>