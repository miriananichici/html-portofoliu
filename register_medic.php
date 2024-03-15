<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $nume = $prenume = "";
$username_err = $password_err = $confirm_password_err = $nume_err = $prenume_err ="";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_medic FROM medici WHERE username = ?";

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
        $sql = "SELECT id_medic FROM medici WHERE nume = ?";

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
        $sql = "SELECT id_medic FROM medici WHERE prenume = ?";

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
     && empty($nume_err) && empty($prenume_err)  && empty($data_nastere_err) && empty($telefon_err) && empty($adresa_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO medici (username, password, nume, prenume) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_nume, $param_prenume);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_nume = $nume;
            $param_prenume = $prenume;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: admin.php");
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
<title>CardioMedica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  
  
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    .wrapper {
  max-width: 500px;
  margin: auto;
  padding: 70px 0;
}

  </style>
</head>

<body>


    
  <nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"><span class="text-primary">CARDIO</span>Medica</a>
        <img src="imagini\cardio-logo.png" alt="logo" style="width:60px;">
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="admin.php">Dashboard</a></li>
          <li><a href="register_medic.php">Adaugare medic</a></li>
          <li><a href="afisare_medici.php">Vizualizare medici</a></li>
          <li><a href="afisare_programariadmin.php">Vizualizare programari</a></li>
          <li><a href="adaugare_orar.php">Setare interval orar medic</a></li>
          <li><a href="logout_admin.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs">
        <a class="navbar-brand"><span class="text-primary">CARDIO</span>Medica</a>
        <img src="imagini\cardio-logo.png" alt="logo" style="width:60px;">
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="admin.php">Dashboard</a></li>
          <li><a href="register_medic.php">Adaugare medic</a></li>
          <li><a href="afisare_medici.php">Vizualizare medici</a></li>
          <li><a href="afisare_programariadmin.php">Vizualizare programari</a></li>
          <li><a href="adaugare_orar.php">Setare interval orar medic</a></li>
          <li><a href="logout_admin.php">Log Out</a></li>
        </ul><br>
      </div>
      <br>


      <div class="col-sm-9">
       

      <div class="wrapper">
        <h2>Inregistrare medic.</h2>
        
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
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>
      </div>


    </div>

  </div>


</body>

</html>