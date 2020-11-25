<?php
// Include config file
require_once "mysql.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["gebruikersnaam"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM gebruikers WHERE gebruikersnaam = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["gebruikersnaam"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["gebruikersnaam"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["wachtwoord"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["wachtwoord"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["wachtwoord"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: inloggen.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type"
          Content="text/html;
              charset=UTF-8">
    <meta name="robots" content="all">
    <meta name="language" content="Dutch">
    <meta name="author" content="Mohamed">
    <meta name="description" content="KnowItall">
    <meta name="keywords" content="KnowItAll, weetjes">
    <meta name="copyright" content="copyright">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="mysql.php">
    <script src="willekeurig.js"></script>
    <title>KnowItAll</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
       body{ font: 12px sans-serif; }
        .wrapper{ width: 400px; padding: 20px; }

    </style>
    <link rel="stylesheet" href="styless.css">
</head>
<header>
    <div class="container">
        <div class="topnav" id="myTopnav">
            <img class="logo" id="logo" src="Images/music.png">
            <?php if (isset($_SESSION["loggedin"])){?>
                <a href="welkom.php">Profiel</a>
            <?php } else { ?>
                <a href="inloggen.php">Inloggen</a>
            <?php } ?>
            <a  href="willekeurig.php">Willekeurige weetjes</a>
            <a href="index.php">KnowItAll</a>
            <a href="javascript:void(0);" class="icon"  onclick="myFunction(); logo()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
</header>
<body>
<div class="wrapper" style=" display: block; margin-left: auto; margin-right: auto; margin-top: 10vh">
    <h2>Registreer</h2>
    <p>Ful je gegevens in om een account te maken.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Gebruikersnaam</label>
            <input type="text" name="gebruikersnaam" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Wachtwoord</label>
            <input type="password" name="wachtwoord" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Bevestig wachtwoord</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group" style="width: 10vh">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
        <p>Heb je al een account? <a href="inloggen.php">Log hier in</a>.</p>
    </form>
</div>
</body>
</html>