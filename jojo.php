<?php
$gebruikersnaam = "root";
$wachtwoord = "";
$database = "knowitall";

$conn = mysqli_connect("localhost", $gebruikersnaam, $wachtwoord, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ID, weetje, afbeelding, datum, bron FROM weetjes ORDER BY rand() limit 1";
$result = mysqli_query($conn, $sql);

$action = null;
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "upload":
            $file = null;
            if (upload_file($msg)) {
                $file = $_FILES["file"]["name"];
                // hier kun je de image gegevens naar de database sturen
            }
            break;
        case "add":
            // eventuele extra actions vanuit form data kun je hier verwerken
            break;
        case "update":
            // eventuele extra actions vanuit form data kun je hier verwerken
            break;
    }
}

/**
 * upload a file
 * @param $message
 * @return bool
 */

function upload_file(&$message)
{
    $retval = true;
    $message = "";
    $target_dir = "images/";

    $validextensions = ["jpeg", "jpg", "png"];
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
        ) && ($_FILES["file"]["size"] < 1000000)  //Approx. 1MB files can be uploaded.
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0) {
            $message .= "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
            $retval = false;
        } else {
            $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $target_dir . $_FILES['file']['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
            $message .= "<span id='success'>Image added successfully...!!</span><br/>";
            $message .= "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
            $message .= "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
            $message .= "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            $message .= "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
        }
    } else {
        $message .= "<span id='invalid'>***Invalid file Size or Type***<span>";
        $retval = false;
    }
    return $retval;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>


    </style>
    <script>
        // Function to preview image after validation
        $(function () {
            $("#file").change(function () {
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                    $('#previewimg').attr('src', 'images/monster.jpg');
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                } else {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $("#file").css("color", "green");
            $('#previewimg').attr('src', e.target.result);
        };

        $(document).ready(function (e) {
            $("#editform").on('submit', (function (e) {
                e.preventDefault();
                $.ajax({
                    url: "index.php", // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                    success: function (data)   // A function to be called if request succeeds
                    {
                        console.log(data);
                        // dit deel wordt a-synchroon uitgevoerd nadat form is verstuurd en afbeelding is geupload.
                        // je kunt hier dus met diverse javascript calls je pagina opbouwen om de data te tonen
                    }
                });
            }));
        });

    </script>
</head>
<body>

<form id="editform" enctype="multipart/form-data">
    <div id="container_editform">
        <label for="file" class="custom-file-upload">Selecteer foto</label>
        <input id="file" name="file" type="file">
        <input id="btn_submit_edit_add_form" type="submit" name="submit" value="Toevoegen">
        <input type="hidden" name="action" value="upload">
    </div>
</form>
<img id="previewimg">
<div id="message"></div>
<div id="foto_container" class="foto-container"></div>


</body>
</html>