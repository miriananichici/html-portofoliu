<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_pacient.php");
    exit;
}
//preluare parametri transmisi din link cu metoda GET
$id_programare = $_GET['id_programare'];
$nume = $_GET['nume_pacient1'];
$prenume = $_GET['prenume_pacient1'];


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
        .row.content {
            height: 550px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
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
      <li class="active"><a href="medici.php">Dashboard:   <?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
        
        <li><a href="afisare_pacienti.php">Afisare pacienti</a></li>
        <li><a href="afisare_programari.php">Afisare programari</a></li>
        <li><a href="logout_medic">Log out</a></li>
        <li><a href="reset-password_medic">Reset password</a></li>
      </ul>
      
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
    <a class="navbar-brand" ><span class="text-primary">CARDIO</span>Medica</a>
    <img src="imagini\cardio-logo.png" alt="logo" style="width:60px;">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="medici.php">Dashboard:   <?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
        
        <li><a href="afisare_pacienti.php">Afisare pacienti</a></li>
        <li><a href="afisare_programari.php">Afisare programari</a></li>
        <li><a href="logout_medic">Log out</a></li>
        <li><a href="reset-password_medic">Reset password</a></li>
      </ul><br>
    </div>
    <br>
    
      

            <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-5">
                    <h2>Adauga rezultat pentru pacient</h2>

                    <form action="adaugare_rezultat_final.php" method="post">

                        <input type="text" class="form-control hidden" name="id_programare_form" value="<?php echo $id_programare; ?>">
                        <div class="form-group">
                            <label>Nume</label>
                            <input type="text" class="form-control" name="numepacient_form" value="<?php echo $nume; ?>">

                        </div>
                        <div class="form-group">
                            <label>Prenume</label>
                            <input type="text" class="form-control" name="prenumepacient_form" value="<?php echo $prenume; ?>">

                        </div>
                        <div class="form-group">
                            <label>Ritm cardiac</label>
                            <input type="text" class="form-control" name="ritm_cardiac_form">

                        </div>
                        <div class="form-group">
                            <label>Tensiune sistolica</label>
                            <input type="text" class="form-control" name="tensiune_sistolica_form">

                        </div>
                        <div class="form-group">
                            <label>Tensiune diastolica</label>
                            <input type="text" class="form-control" name="tensiune_diastolica_form">

                        </div>
                        <div class="form-group">
                            <label>Diagnostic</label>
                            <input type="text" class="form-control" name="diagnostic_form">

                        </div>
                        <div class="form-group">
                            <label>Tratament</label>
                            <input type="text" class="form-control" name="tratament_form">

                        </div>
                        <div class="form-group">
                            <label>Altele: </label>
                            <textarea id="w3review" class="form-control" name="altele_form" rows="4" cols="50"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Adauga">
                            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                        </div>
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>

</body>

</html>