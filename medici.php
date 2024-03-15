<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login_medic.php");
  exit;
}

$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
$id_medic = $_SESSION["username"];
$query = mysqli_query($con, "SELECT id_medic from medici where username='$id_medic'");
if (!$query) {
  die('Invalid query: ');
}
//numar pacienti
$id = mysqli_fetch_row($query);


$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
$id_medic = $_SESSION["username"];
$query = mysqli_query($con, "SELECT id_medic from medici where username='$id_medic'");
if (!$query) {
  die('Invalid query: ');
}

$id = mysqli_fetch_row($query);

$query = mysqli_query($con, "SELECT  A.nume, A.prenume, A.adresa, A.telefon, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]'");
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
$nr_pacienti = mysqli_num_rows($query);

//numar programari
$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
$id_medic = $_SESSION["username"];
$query = mysqli_query($con, "SELECT id_medic from medici where username='$id_medic'");
if (!$query) {
  die('Invalid query: ');
}

$id = mysqli_fetch_row($query);

$query = mysqli_query($con, "SELECT   B.id_programare, A.nume, A.prenume, A.adresa, A.telefon, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]'");
if (!$query) {
  die('Invalid query: ');
}

while ($row = mysqli_fetch_row($query)) {
  $contor = 0;

  foreach ($row as $value) {

    $sir[$contor] = $value;
    $contor++;
  }
} //se inchide bucla while
$nr_programari = mysqli_num_rows($query);


//10ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>10 AND A.varsta<=19");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac10 = mysqli_num_rows($query);
//20 ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>20 AND A.varsta<=29");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac20 = mysqli_num_rows($query);
//30
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>30 AND A.varsta<=39");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac30 = mysqli_num_rows($query);
//40 ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>40 AND A.varsta<=49");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac40 = mysqli_num_rows($query);
//50ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>50 AND A.varsta<=59");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac50 = mysqli_num_rows($query);
//60ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>60 AND A.varsta<=69");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac60 = mysqli_num_rows($query);
//70ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>70 AND A.varsta<=79");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac70 = mysqli_num_rows($query);
//80ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>80 AND A.varsta<=89");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac80 = mysqli_num_rows($query);
//90ani
$query = mysqli_query($con, "SELECT  A.varsta, A.sex FROM pacienti A, bookings B WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND A.varsta>90 AND A.varsta<=100");
while ($row = mysqli_fetch_row($query)) {
  $contor = 0;
  foreach ($row as $value) {
    $sir[$contor] = $value;
    $contor++;
  }
}
$pac100 = mysqli_num_rows($query);

$sql = "SELECT  C.diagnostic, A.varsta FROM pacienti A, bookings B, rezultate C WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND B.id_programare=C.id_programare GROUP BY diagnostic";


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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['students', 'contribution'],
        <?php
        $sql = "SELECT  C.diagnostic, A.varsta, COUNT(A.varsta) FROM pacienti A, bookings B, rezultate C WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND B.id_programare=C.id_programare  GROUP BY C.diagnostic ";
        $fire = mysqli_query($con, $sql);
        while ($result = mysqli_fetch_assoc($fire)) {
          echo "['" . $result['diagnostic'] . "'," . $result['COUNT(A.varsta)'] . "],";
        }

        ?>
      ]);

      var options = {
        title: 'Boli cardiovasculare'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>




  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);


    function drawStuff() {
      var data = new google.visualization.arrayToDataTable([
        ['Move', 'Varsta', 'Pacienti'],
        <?php
        $sql = "SELECT  C.diagnostic, A.varsta, COUNT(A.varsta) FROM pacienti A, bookings B, rezultate C WHERE A.id_pacient=B.id_pacient AND B.id_medic='$id[0]' AND B.id_programare=C.id_programare  GROUP BY C.diagnostic, A.varsta ";
        $fire = mysqli_query($con, $sql);
        while ($result = mysqli_fetch_assoc($fire)) {
          echo "['" . $result['diagnostic'] . "'," . $result['varsta'] . "," . $result['COUNT(A.varsta)'] . "],";
        }

        ?>
      ]);

      var options = {
        width: 500,
        legend: {
          position: 'none'
        },
        chart: {
          title: 'Boli cardiovasculare in functie de varsta',
        },
        axes: {
          x: {
            0: {
              side: 'top',
              label: ' '
            } // Top x-axis.
          }
        },
        bar: {
          groupWidth: "50%"
        }
      };

      var chart = new google.charts.Bar(document.getElementById('top_x_div2'));
      // Convert the Classic options to Material options.
      chart.draw(data, google.charts.Bar.convertOptions(options));
    };
  </script>

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
    
      <div class="col-sm-9">
        <div class="well">

        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              <h4>Numar Pacienti</h4>
              <p><?php echo $nr_pacienti; ?></p>
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

      <div class="col-sm-9">
        <canvas id="myChart" style="width:100%;max-width:500px"></canvas>

        <script>
          var xValues = ["10-20 ani", "20-30 ani", "30-40 ani", "40-50 ani", "50-60 ani", "60-70 ani", "70-80 ani", "80-90 ani", "80-100 ani"];
          var yValues = [<?= $pac10 ?>, <?= $pac20 ?>, <?= $pac30 ?>, <?= $pac40 ?>, <?= $pac50 ?>, <?= $pac60 ?>, <?= $pac70 ?>, <?= $pac80 ?>, <?= $pac100 ?>];
          var barColors = ["blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue"];

          new Chart("myChart", {
            type: "bar",
            data: {
              labels: xValues,
              datasets: [{
                backgroundColor: barColors,
                data: yValues
              }]
            },
            options: {
              legend: {
                display: false
              },
              title: {
                display: true,
                text: "Numarul pacientilor in functie de varsta"
              }
            }
          });
        </script>


        <div id="piechart" style="width: 400px; height: 300px;"></div>

        <div id="top_x_div2" style="width: 400px; height: 300px;"></div>
      </div>
    </div>
  </div>


</body>

</html>