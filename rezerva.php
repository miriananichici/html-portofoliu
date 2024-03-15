<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: medic_pacient.php");
    exit;
}

$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
$id_programare = $_GET['id_programare'];
$nume = $_GET['nume_pacient1'];
$prenume = $_GET['prenume_pacient1'];

$query = mysqli_query($con, "select * from rezultate where id_programare='$id_programare'");

while ($row = mysqli_fetch_row($query)) {
    $contor = 0;

    foreach ($row as $value) {

        $sir[$contor] = $value;
        $contor++;
    }
    $id_rezultat = $sir[0];
    $id_programare = $sir[1];
    $ritm_cardiac = $sir[2];
    $tensiune_sistolica = $sir[3];
    $tensiune_diastolica = $sir[4];
    $diagnostic = $sir[5];
    $tratament = $sir[6];
    $altele = $sir[7];
}

$query0 = mysqli_query($con, "select A.id_pacient from pacienti A, bookings B where B.id_programare='$id_programare' and A.id_pacient=B.id_pacient");

while ($row = mysqli_fetch_row($query0)) {
    $contor = 0;

    foreach ($row as $value) {

        $sir[$contor] = $value;
        $contor++;
    }
    $id_pacient9 = $sir[0];
}

$query1 = mysqli_query($con, "select * from pacienti where id_pacient='$id_pacient9'");

while ($row = mysqli_fetch_row($query1)) {
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
    $varsta_pacient = $sir[9];
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
                    <li class="active"><a href="medici.php">Dashboard: <?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>

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
                <a class="navbar-brand"><span class="text-primary">CARDIO</span>Medica</a>
                <img src="imagini\cardio-logo.png" alt="logo" style="width:60px;">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="medici.php">Dashboard: <?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>

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
                    <form>


                        <h2>Date personale pacient:</h2>
                        <div class="form-group">
                            <label>Nnume: </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo  $nume_pacient; ?>">
                        </div>


                        <div class="form-group">
                            <label>Prenume: </label>
                            <input type="text" class="form-control" name="prenume2_form" value="<?php echo $prenume_pacient; ?>">
                        </div>


                        <div class="form-group">
                            <label>Sex</label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $sex_pacient; ?>">

                        </div>

                        <div class="form-group">
                            <label>Data nastere</label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $data_nastere_pacient; ?>">

                        </div>
                        <div class="form-group">
                            <label>Varsta </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $varsta_pacient; ?> ani">

                        </div>

                        <div class="form-group">
                            <label>Telefon: </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $telefon_pacient; ?>">
                        </div>

                        <div class="form-group">
                            <label>Adresa: </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $adresa_pacient; ?>">
                        </div>
                        <h2>Parametrii consultatie</h2>
                        <div class="form-group">
                            <label>Ritm cardiac</label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $ritm_cardiac; ?>">

                        </div>

                        <div class="form-group">
                            <label>Tensiune sistolica </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $tensiune_sistolica; ?>">
                        </div>


                        <div class="form-group">
                            <label>Tensiune diastolica </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $tensiune_diastolica; ?>">
                        </div>
                        <div class="form-group">
                            <label>Diagnostic </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $diagnostic; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tratament </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $tratament; ?>">
                        </div>
                        <div class="form-group">
                            <label>Altele </label>
                            <input type="text" class="form-control" name="nume2_form" value="<?php echo $altele; ?>">
                        </div>
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>
</body>

</html>