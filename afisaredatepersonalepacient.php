<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_pacient.php");
    exit;
}

$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
$param_id = $_SESSION["id_pacient"];

$query = mysqli_query($con, "select * from pacienti where id_pacient='$param_id'");

while ($row = mysqli_fetch_row($query)) {
    $contor = 0;

    foreach ($row as $value) {

        $sir[$contor] = $value;
        $contor++;
    }
    $id_pacien = $sir[0];
    $username_pacient = $sir[1];
    $parola_pacient = $sir[2];
    $nume_pacient = $sir[3];
    $prenume_pacient = $sir[4];
    $sex_pacient = $sir[5];
    $data_nastere_pacient = $sir[6];
    $telefon_pacient = $sir[7];
    $adresa_pacient = $sir[8];
    $varsta_pacient=$sir[9];
}

?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>CardioMedica</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
        .wrapper {
  max-width: 500px;
  margin: auto;
  padding: 70px 0;
}
    </style>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>


<body style="margin-right: 80px; margin-left: 80px;">
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
                    <a class="nav-link" href="pacienti.php"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="afisaredatepersonalepacient.php"><b>Date personale</b></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="programarile_mele.php"><b>Programarile mele</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prezentare_medici.php"><b>Medici</b></a>
                </li>
            </ul>
            <div class="dropdown">
                <button type="button" class="btn btn-danger dropdown" data-toggle="dropdown">
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                </button>
                <div class="dropdown-menu ">
                    <a class="dropdown-item" href="logout_pacient.php">Log out</a>
                    <a class="dropdown-item" href="reset-password_pacient">Reset password</a>

                </div>
            </div>



        </div> <!-- .container -->
    </nav>

    <br>

    <h3 class="text-center">Date personale </h3>

    <div class="wrapper ">
        <form>
            <div class="form-group">
                <label> <b>Username: </b></label>
                <input type="text" style="background-color: #CCFFFF;"  class="form-control" name="nume2_form" value="<?php echo $username_pacient; ?>">
            </div>


            <div class="form-group">
                <label><b>Nume: </b></label>
                <input type="text" style="background-color: #CCFFFF;" class="form-control" name="nume2_form" value="<?php echo  $nume_pacient; ?>">
            </div>


            <div class="form-group">
                <label><b>Prenume:</b> </label>
                <input type="text" style="background-color: #CCFFFF;" class="form-control" name="prenume2_form" value="<?php echo $prenume_pacient; ?>">
            </div>



            <div class="form-group">
                <label><b>Sex</b></label>
                <input type="text" style="background-color: #CCFFFF;" class="form-control" name="nume2_form" value="<?php echo $sex_pacient; ?>">
                <!--<label>Alege alt sex:</label>
            <select name="sex" class="form-control" >
                <option value="m">M</option>
                <option value="f">F</option>
                <option value="other">Other</option>
                
            </select> -->
            </div>

            <div class="form-group">
                <label><b>Data nastere</b></label>
                <input type="text" style="background-color: #CCFFFF;" class="form-control" name="nume2_form" value="<?php echo $data_nastere_pacient; ?>">
                <!--<label>Alege alta data:</label>
                <input type="date" name="data_nastere" class="form-control >" value="<?php echo $data_nastere_pacient; ?>">
                -->
            </div>
            <div class="form-group">
                <label><b>Varsta: </b></label>
                <input type="text" style="background-color: #CCFFFF;" class="form-control" name="varsta2_form" value="<?php echo $varsta_pacient; ?> ani">
            </div>
            <div class="form-group">
                <label><b>Telefon:</b> </label>
                <input type="text" style="background-color: #CCFFFF;" class="form-control" name="nume2_form" value="<?php echo $telefon_pacient; ?>">
            </div>

            <div class="form-group">
                <label><b>Adresa: </b></label>
                <input type="text" style="background-color: #CCFFFF;" class="form-control" name="nume2_form" value="<?php echo $adresa_pacient; ?>">
            </div>
            
            <!-- <div class="form-group">
            <input type="SUBMIT" class="btn btn-primary" value="Salveaza programarea">
            </div>-->

        </form>

    </div>
    <div class="col-sm-5"></div>
    </div>
    </div>

</body>

</html>