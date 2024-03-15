<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_pacient.php");
    exit;
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
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" style="margin-top: 150px;">
            <table class="table" style="background-color: lightblue; ">
                <tbody>
                    <?php

                    $con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
                    $id_pacient = $_SESSION["id_pacient"];

                    $query = mysqli_query($con, "SELECT  id_programare,nume_medic, prenume_medic, date, timeslot FROM bookings WHERE id_pacient='$id_pacient'");
                    if (!$query) {
                        die('Invalid query: ');
                    }
                    if ($query->num_rows == 0) {
                        $msg = "<div class='alert alert-danger'>Nu aveti programari inca!</div>";
                    } 
                    echo "<tr>";
                    $columns = mysqli_num_fields($query);
                    for ($i = 1; $i < $columns; $i++) {
                        $variab = mysqli_fetch_field_direct($query, $i);
                        echo "<th>";
                        echo $variab->name;
                        echo "</th>";
                    }
                    echo "<th></th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_row($query)) {
                        $contor = 0;
                        echo " <tr>";
                        foreach ($row as $value) {
                            if ($contor != 0)
                                echo "<td>$value</td>";
                            $sir[$contor] = $value;
                            $contor++;
                        }
                        $id_programare = $sir[0];


                        echo "<td>" .

                            "<a class='btn btn-primary btn-sm' href='rezultatul_meu.php?id_programare=$id_programare'>Afisare rezultat</a>" .
                            "</td>";
                        echo "</tr>";
                    } //se inchide bucla while
                    echo "</table>";


                    ?>
                </tbody>
            </table>
            <div class="col-md-12">
                <?php echo (isset($msg)) ? $msg : ""; ?>
            </div>

        </div>
        <div class="col-sm-1"></div>
    </div>
</body>

</html>