<?php

$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");


$query = mysqli_query($con, "SELECT   * FROM  bookings");
if (!$query) {
  die('Invalid query: ');
}


while ($row = mysqli_fetch_row($query)) {
  $contor = 0;

  foreach ($row as $value) {
    if ($contor != 0)

      $sir[$contor] = $value;

    $contor++;
  }
} //se inchide bucla while

$nr_programari = mysqli_num_rows($query);



$query1 = mysqli_query($con, "SELECT * from pacienti");
if (!$query) {
  die('Invalid query: ');
}



while ($row = mysqli_fetch_row($query)) {
  $contor = 0;

  foreach ($row as $value) {

    $sir[$contor] = $value;
    $contor++;
  }
}
$nr_pacienti = mysqli_num_rows($query1);
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
        <div class="well">

        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              <h4>Numar Pacienti inregistrati</h4>
              <p><?php


                  echo $nr_pacienti;
                  ?></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <h4>Programari</h4>
              <p><?php echo $nr_programari; ?></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <h4>Text</h4>
              <p>###</p>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>
 

</body>

</html>