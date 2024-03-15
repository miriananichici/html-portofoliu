<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_pacient.php");
    exit;
}
$mysqli = new mysqli('localhost', 'root', '', 'cardioclinic');
$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $id_medic = $_GET['id_medic'];
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    $medici = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['timeslot'];
                $medici[] = $row['id_medic'];
            }
            $stmt->close();
        }
    }
}

if (isset($_POST['submit'])) {
    $nume = $_POST['nume_form'];
    $prenume = $_POST['prenume_form'];

    $id_pacient = $_POST['id_pacient_form'];
    $timeslot = $_POST['timeslot'];

    //extragere nume, prenume medic in fuctie de id
    $query = mysqli_query($con, "select nume, prenume from medici where id_medic='$id_medic'");
    while ($row = mysqli_fetch_row($query)) {
        $contor = 0;

        foreach ($row as $value) {

            $sir[$contor] = $value;
            $contor++;
        }

        $nume_medic1 = $sir[0];
        $prenume_medic1 = $sir[1];
    }

    $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslot=? AND id_medic=?");
    $stmt->bind_param('sss', $date, $timeslot, $id_medic);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $msg = "<div class='alert alert-danger'>Itervalul selectat nu este disponibil!</div>";
        } else {
            $query1 = mysqli_query($con, "insert into bookings (id_medic, nume_medic, prenume_medic, date, id_pacient, name_pacient, prenume_pacient, timeslot)
values('$id_medic','$nume_medic1','$prenume_medic1', '$date', '$id_pacient', '$nume', '$prenume', '$timeslot' )") or die("Inserarea nu a
putut avea loc!" . mysqli_error($con));
            /*$stmt = $mysqli->prepare("INSERT INTO bookings ( id_medic, date, id_pacient, name_pacient, prenume_pacient, timeslot) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('ssssss',$id_medic, $date, $id_pacient, $nume, $prenume, $timeslot );
            $stmt->execute();*/
            $msg = "<div class='alert alert-success'>Programarea s-a salvat cu succes!</div>";
            $bookings[] = $timeslot;
            $medici[] = $id_medic;
            //  $stmt->close();
            // $mysqli->close();
        }
    }
}
$query = mysqli_query($con, "select * from orar where id_medic='$id_medic'");
    while ($row = mysqli_fetch_row($query)) {
        $contor = 0;

        foreach ($row as $value) {

            $sir[$contor] = $value;
            $contor++;
        }
$id_orar= $sir[0];
$medic=$sir[1];
$start = $sir[2];
$end = $sir[3];
        $duration=$sir[4];
    }
/*
$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "20:00";*/
$cleanup = 0;
function timeslots($duration, $cleanup, $start, $end)
{
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }

        $slots[] = $intStart->format("H:iA") . " - " . $endPeriod->format("H:iA");
    }

    return $slots;
}



// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_pacient.php");
    exit;
}

$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
$param_id = $_SESSION["id_pacient"];

$query = mysqli_query($con, "select nume, prenume from pacienti where id_pacient=$param_id");
while ($row = mysqli_fetch_row($query)) {
    $nume_pacient = $row[0];
    $prenume_pacient = $row[1];
}

$query2 = mysqli_query($con, "select nume, prenume from medici where id_medic=$id_medic");
while ($row = mysqli_fetch_row($query2)) {
    $nume_medic = $row[0];
    $prenume_medic = $row[1];
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CardioMedica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    
</head>

<body>

<nav class="navbar  fixed-top navbar-expand-lg navbar-light shadow-sm" style="background-color: #e3f2fd;">
        <div class="container">
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


    <div class="container">
        <h1 class="text-center">Programare pentru data: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <?php echo (isset($msg)) ? $msg : ""; ?>
            </div>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts) {
            ?>
                <div class="col-md-2">
                    <div class="form-group">
                        <?php
                        if (in_array($ts, $bookings)&&in_array($id_medic, $medici)) {

                        ?>
                            <button class="btn btn-danger"><?php echo $ts; ?></button>
                        <?php } else { ?>
                            <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                        <?php }  ?>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Programare pentru: <?php echo date('m/d/Y', strtotime($date)); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Interval: </label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Medic: </label>
                                    <!-- <input required type="text" class="form-control" name="name">-->
                                    <input type="text" name="nume1_form" disabled value="<?php echo $nume_medic ." ".$prenume_medic ; ?>">
                                </div>
                                
                                <input type="hidden" name="id_pacient_form" value="<?php echo  $param_id; ?>">
                                <div class="form-group">
                                    <label for="">Name pacient</label>
                                    <!-- <input required type="text" class="form-control" name="name">-->
                                    <input type="text" name="nume_form" value="<?php echo $nume_pacient; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Prenume pacient</label>
                                    <!--<input required type="text" class="form-control" name="email">-->
                                    <input type="text" name="prenume_form" value="<?php echo $prenume_pacient; ?>">
                                </div>
                              
                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <br>
    
   <center>
                <a href="pacienti.php" class=" button2 btn btn-danger ml-3">Inapoi la pagina principala</a>
                </center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        $(".book").click(function() {
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        });
    </script>
</body>

</html>