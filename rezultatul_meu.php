<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_pacient.php");
    exit;
}

$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
$id_programare = $_GET['id_programare'];




$query0 = mysqli_query($con, "select A.nume, A.prenume, B.date, B.timeslot from medici A, bookings B where B.id_programare='$id_programare' and A.id_medic=B.id_medic");

while ($row = mysqli_fetch_row($query0)) {
    $contor = 0;

    foreach ($row as $value) {

        $sir[$contor] = $value;
        $contor++;
    }
    $nume_medic = $sir[0];
    $prenume_medic = $sir[1];
    $date = $sir[2];
    $timeslot = $sir[3];
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



  
    <div class="container" style="margin-right: 80px; margin-left: 80px;">
        <div class="row" style=" margin-top: 100px;" >
      
            <div class="col-sm-12">

            
             <h2>Parametrii consultatie</h2>
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

                        $query = mysqli_query($con, "select * from rezultate  where id_programare='$id_programare'");
                        if (!$query) {
                            die('Invalid query: ');
                        }
                        if (mysqli_num_rows($query) != 0) {
                            echo "<tr>";

                            $columns = mysqli_num_fields($query);
                            for ($i = 2; $i < $columns; $i++) {
                                $variab = mysqli_fetch_field_direct($query, $i);
                                echo "<th>";
                                echo $variab->name;
                                echo "</th>";
                            }
                            echo "<th></th>";
                            echo "</tr>";
                        }
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_row($query)) {
                                $contor = 0;
                                echo " <tr>";
                                foreach ($row as $value) {
                                    if ($contor >= 2)
                                        echo "<td>$value</td>";
                                    $sir[$contor] = $value;
                                    $contor++;
                                }

                                echo "</tr>";
                            } //se inchide bucla while
                        } else echo "Nu exista inca un rezultat.";
                        echo "</table>";


                        ?>
                    </tbody>
                </table>

                <form>


                    <h2>Date programare:</h2>
                    <div class="form-group">
                        <label>Nnume medic: </label>
                        <input type="text" class="form-control" name="nume2_form" value="<?php echo  $nume_medic; ?>">
                    </div>


                    <div class="form-group">
                        <label>Prenume medic: </label>
                        <input type="text" class="form-control" name="prenume2_form" value="<?php echo $prenume_medic; ?>">
                    </div>


                    <div class="form-group">
                        <label>Data</label>
                        <input type="text" class="form-control" name="nume2_form" value="<?php echo $date; ?>">

                    </div>

                    <div class="form-group">
                        <label>Interval</label>
                        <input type="text" class="form-control" name="nume2_form" value="<?php echo $timeslot; ?>">

                    </div>
                    

                </form>
            </div>
           
        </div>
    </div>
</body>

</html>