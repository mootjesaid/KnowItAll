<?php
// Initialize the session
session_start();



// Include config file
require_once "mysql.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["gebruikersnaam"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["gebruikersnaam"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["wachtwoord"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["wachtwoord"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, gebruikersnaam, wachtwoord FROM gebruikers WHERE gebruikersnaam = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["gebruikersnaam"] = $username;

                            // Redirect user to welcome page
                            header("location: welkom.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="willekeurig.js"></script>
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
        <link rel="stylesheet" href="styless.css">
        <link rel="stylesheet" href="mysql.php">
        <title>KnowItAll</title>
    </head>

    <header>
        <div class="burgermenu">
            <div class="topnav2">
                <a href="#home" class="active2" style="color: rgb(255,192,203)">KnowItall</a>
                <!-- Navigation links (hidden by default) -->
                <div id="myLinks">
                    <a href="#news">Home</a>
                    <a href="#contact">Willekeurige weetje</a>
                    <a href="#about">Inloggen</a>
                </div>
                <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <div class="navigation">

            <div class="topnav">
                <img src="Images/music.png" alt="Music" class="responsive">
                <a  href="inloggen.php">Inloggen</a>
                <a href="willekeurig.php">Willekeurig weetje</a>
                <a href="index.php">Home</a>
            </div>
        </div>
    </header>

    <body>
    <div class="titel">
        <h1>Know it all!</h1>
    </div>

    <div class="wrapper" style=" display: block; margin-left: auto; margin-right: auto; margin-top: 10vh">
        <h2>Login</h2>
        <p>Vul je login gegevens in.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Gebruikersnaam</label>
                <input type="text" name="gebruikersnaam" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login" style="background-color: #F06292; color: white; display: block; margin-left: auto; margin-right: auto;">
            </div>
            <p>Heb je nog geen account? <a href="register.php">Registreer nu</a>.</p>
        </form>
    </div>


</html>
