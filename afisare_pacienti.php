<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login_medic.php");
  exit;
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

      <div class="col-sm-9">
        <h1>Lista pacienti</h1>
        <form method="POST" class="form-inline" action="cauta.php">
          <input class="form-control mr-sm-2" name="pacient_cautat" type="text" placeholder="Cauta pacient">
          <button class="btn btn-success" type="submit">Cauta</button>
        </form>
        <br>
        <table class="table">
          <tbody>
            <?php

            $con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
            $id_medic = $_SESSION["username"];
            $query = mysqli_query($con, "SELECT id_medic from medici where username='$id_medic'");
            if (!$query) {
              die('Invalid query: ');
            }

            $id = mysqli_fetch_row($query);

            $query = mysqli_query($con, "SELECT  A.nume, A.prenume,a.data_nastere,A.varsta, A.adresa, A.telefon, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' GROUP BY A.username");
            if (!$query) {
              die('Invalid query: ');
            }

            echo "<tr>";
            $columns = mysqli_num_fields($query);
            for ($i = 0; $i < $columns; $i++) {
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
                echo "<td>$value</td>";
                $sir[$contor] = $value;
                $contor++;
              }

              echo "</tr>";
            } //se inchide bucla while
            echo "</table>";


            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</body>

</html>