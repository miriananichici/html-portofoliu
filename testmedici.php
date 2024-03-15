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
            </form>

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
                    if (mysqli_num_rows($query) > 0) {
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
                    } else echo "Nu exista inca un rezultat.";
                    echo "</table>";


                    ?>
                </tbody>
            </table>


        </div>


    </div>

</div>