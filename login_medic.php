<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: login_medic.php");
    exit;
} 

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Va rog introduce-ti un username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Va rog introduce-ti o parola.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id_medic, username, password FROM medici WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id_pacient, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_medic"] = $id_medic;
                            $_SESSION["username"] = $username;

                            // Redirect user to medic page
                            header("location: medici.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>CardioMedica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        body {
            font: 14px sans-serif;
        }


        .wrapper {
            max-width: 500px;
            margin: auto;
            padding: 70px 0;
        }
    </style>
</head>

<body  style="margin-right: 80px; margin-left: 80px;">
<nav class="navbar  fixed-top navbar-expand-lg navbar-light shadow-sm" style="background-color: #e3f2fd;">
        <div class="container" >
            <a class="navbar-brand" href="http://127.0.0.1:5501/Pagina%20de%20pornire.html"><span class="text-primary">CARDIO</span>Medica</a>
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                <img src="imagini\cardio-logo.png" alt="logo" style="width:60px;">
            </a>


            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Pagina de pornire.html"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="despre_noi.html"><b>Despre noi</b></a>
                </li>
                
              
                <li class="nav-item">
                    <a class="nav-link" href="medici.html"><b>Medici</b></a>
                </li>
            </ul>
            <div class="dropdown">
                <a href="http://localhost/LICENTA%20COD/login_pacient.php" class=" button2 btn btn-danger ml-3">LOG IN</a>
                
            </div>



        </div> <!-- .container -->
    </nav>
    <br>
    
    <div class="wrapper">
        <h2>Autentificare medic</h2>
        <p>Va rog sa completati datele de autentificare.</p>


        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form id="forms" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>

</body>

</html>