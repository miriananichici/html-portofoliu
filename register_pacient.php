<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $nume = $prenume = $sex= $data_nastere= $telefon = $adresa= $varsta="";
$username_err = $password_err = $confirm_password_err = $nume_err = $prenume_err = $sex_err= $data_nastere_err= $telefon_err= $adresa_err=$varsta_err="";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username=
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_pacient FROM pacienti WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate nume
    if (empty(trim($_POST["nume"]))) {
        $nume_err = "Please enter a nume.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_pacient FROM pacienti WHERE nume = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_nume);

            // Set parameters
            $param_nume = trim($_POST["nume"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);


                $nume = trim($_POST["nume"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate prenume
    if (empty(trim($_POST["prenume"]))) {
        $prenume_err = "Please enter a nume.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_pacient FROM pacienti WHERE prenume = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_prenume);

            // Set parameters
            $param_prenume = trim($_POST["prenume"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);


                $prenume = trim($_POST["prenume"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


     // Validate sex
        // Prepare a select statement
        $sql = "SELECT id_pacient FROM pacienti WHERE sex = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_sex);

            // Set parameters
            $param_sex = trim($_POST["sex"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);


                $sex = trim($_POST["sex"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Validate data
        // Prepare a select statement
        $sql = "SELECT id_pacient FROM pacienti WHERE data_nastere = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_data_nastere);

            // Set parameters
            $param_data_nastere = trim($_POST["data_nastere"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);


                $data_nastere = trim($_POST["data_nastere"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    

        // Validate telefon
    if (empty(trim($_POST["telefon"]))) {
        $telefon_err = "Please enter a telefon.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_pacient FROM pacienti WHERE telefon = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_telefon);

            // Set parameters
            $param_telefon = trim($_POST["telefon"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);


                $telefon = trim($_POST["telefon"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    
        // Validate telefon
        if (empty(trim($_POST["varsta"]))) {
            $telefon_err = "Please enter a varsta.";
        } else {
            // Prepare a select statement
            $sql = "SELECT id_pacient FROM pacienti WHERE varsta = ?";
    
            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_varsta);
    
                // Set parameters
                $param_varsta = trim($_POST["varsta"]);
    
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    /* store result */
                    mysqli_stmt_store_result($stmt);
    
    
                    $varsta = trim($_POST["varsta"]);
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

       // Validate adresa
       if (empty(trim($_POST["adresa"]))) {
        $adresa_err = "Please enter a adresa.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_pacient FROM pacienti WHERE adresa = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_adresa);

            // Set parameters
            $param_adresa = trim($_POST["adresa"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);


                $adresa = trim($_POST["adresa"]);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 4) {
        $password_err = "Password must have atleast 4 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) 
     && empty($nume_err) && empty($prenume_err)  && empty($data_nastere_err) && empty($telefon_err) && empty($adresa_err)&& empty($varsta_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO pacienti (username, password, nume, prenume, sex, data_nastere, telefon, adresa,varsta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_username, $param_password, $param_nume, $param_prenume, $param_sex, $param_data_nastere, $param_telefon, $param_adresa, $param_varsta);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_nume = $nume;
            $param_prenume = $prenume;
            $param_sex = $sex;
            $param_data_nastere= $data_nastere;
            $param_telefon= $telefon;
            $param_adresa= $adresa;
            $param_varsta=$varsta;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login_pacient.php");
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

<body>
<nav class="navbar  fixed-top navbar-expand-lg navbar-light shadow-sm" style="background-color: #e3f2fd;">
        <div class="container">
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

    <div class="wrapper">
        <h2>Iregistrare cont.</h2>
        <p>Va rog sa completati acest formular pentru a va crea un cont.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Nume</label>
                <input type="text" name="nume" class="form-control <?php echo (!empty($nume_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nume; ?>">
                <span class="invalid-feedback"><?php echo $nume_err; ?></span>
            </div>
            <div class="form-group">
                <label>Prenume</label>
                <input type="text" name="prenume" class="form-control <?php echo (!empty($prenume_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prenume; ?>">
                <span class="invalid-feedback"><?php echo $prenume_err; ?></span>
            </div>
            
            <div class="form-group">
                <label>Sex</label>
            <select name="sex" class="form-control" >
                <option value="m">M</option>
                <option value="f">F</option>
                <option value="other">Other</option>
                
            </select>
            </div>

            <div class="form-group">
                <label>Data nastere</label>
                <input type="date" name="data_nastere" class="form-control <?php echo (!empty($data_nastere_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $data_nastere; ?>">
                <span class="invalid-feedback"><?php echo $data_nastere_err; ?></span>
            </div>

            <div class="form-group">
                <label>Telefon</label>
                <input type="text" name="telefon" class="form-control <?php echo (!empty($telefon_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefon; ?>">
                <span class="invalid-feedback"><?php echo $telefon_err; ?></span>
            </div>
            <div class="form-group">
                <label>Adresa</label>
                <input type="text" name="adresa" class="form-control <?php echo (!empty($adresa_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $adresa; ?>">
                <span class="invalid-feedback"><?php echo $adresa_err; ?></span>
            </div>
            <div class="form-group">
                <label>Varsta</label>
                <input type="text" name="varsta" class="form-control <?php echo (!empty($varsta_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $varsta; ?>">
                <span class="invalid-feedback"><?php echo $varsta_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>

            <p>Veti deja un cont? <a href="login_pacient.php">Autentificati-va aici!</a>.</p>
        </form>
    </div>




</body>

</html>