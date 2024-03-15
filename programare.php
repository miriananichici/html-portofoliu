<?php
session_start();

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
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>CardioMedica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        body {
            font: 14px sans-serif;

}
        
.wrapper {
  max-width: 500px;
  margin: auto;
  padding: 70px 0;
}

#fundal {
             
 background-image: url('imagini/fundal programare.png');
 background-repeat: no-repeat;
 background-attachment: fixed;  
 background-size: cover;
}
      

    </style>
</head>

<body style="margin: 50px;">
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
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
                    <a class="nav-link" href="#"><b>Date consulatatii</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><b>Programarile mele</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prezentare_medici.php"><b>Medici</b></a>
                </li>
            </ul>
            <div class="dropdown">
                <button type="button" class="btn btn-light dropdown" data-toggle="dropdown">
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout_pacient.php">Log out</a>
                    <a class="dropdown-item" href="reset-password_pacient">Reset password</a>
                   
                </div>
            </div>
  
           

        </div> <!-- .container -->
    </nav>

<br>
    <div id="fundal">
<h3 class="text-center" >Completeaza formularul pentru a face o programare: </h3>
<div class="row">
<div class="col-sm-2"></div>
    <div class="wrapper col-sm-5" >
    <form method="POST" action="book1.php">
               <input type="hidden" name="id_pacient3_form" value="<?php echo  $param_id; ?>">

            <div class="form-group">
                <label>Nnume: </label>
                <input type="text" name="nume2_form" value="<?php echo $nume_pacient; ?>">
            </div>


            <div class="form-group">
                <label>Prenume: </label>
                <input type="text" name="prenume2_form" value="<?php echo $prenume_pacient; ?>">
            </div>

            <div class="form-group">
                <label>Selecteaza un medic: </label>

                <?php
                $con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");
                echo "<select name='id_medic'>";
                $query = mysqli_query($con, "select id_medic, nume, prenume from medici");
                while ($row = mysqli_fetch_row($query)) {
                    $id_medic = $row[0];
                    $nume_medic = $row[1];
                    $prenume_medic = $row[2];
                    echo "<option value='$id_medic'>$nume_medic $prenume_medic</option>";
                }
                echo "</select>";
                ?>

            </div>

            <div class="form-group">
            <input type="SUBMIT" class="btn btn-primary" value="Mai departe">
            </div>
        
    </form>
            </div>
            <?php
// (B) PROCESS FORM SUBMISSION & SHOW MESSAGE
if (isset($_POST["name"])) {
  require "salvare_programare.php";
  echo "<div>$message</div>";
}
?>
            <div class="col-sm-5"></div>
</div>
            </div>

</body>

</html>
