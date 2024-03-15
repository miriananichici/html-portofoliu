<?php
// Initialize the session
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
   
 
    <div class="container" >
    
            <div class="row" style="margin-top: 150px;">
                <div class="col-sm-1"></div>
                <div class="col-sm-4" >
                  <div style="box-shadow: 10px 10px 5px lightblue;  transition: width 2s;"><img src="imagini\medicb.png" alt="medic" style="width:60px;">
                  <h3>Dr. Sandor Anca</h3>
                  <h5>Orar: 10:00-16:00  </h5>
                </div>
                  <br>
                  <div style="box-shadow: 10px 10px 5px lightblue;"><img src="imagini\medicb.png" alt="medic" style="width:60px;">
                  <h3>Dr. Sandor Anca</h3>
                  <h5>Orar: 10:00-16:00  </h5>
                </div>
                  <br>
                  <div style="box-shadow: 10px 10px 5px lightblue;"> <img src="imagini\medicb.png" alt="medic" style="width:60px;">
                  <h3>Dr. Sandor Anca</h3>
                  <h5>Orar: 10:00-16:00  </h5>
                </div>
                </div>
            
            <div class="col-sm-7">

                <table class="table">
                    <h3>Servicii: </h3>
                    <thead>
                      <tr>
                        <th>Nr. crt.</th>
                        <th>Nume serviciu</th>
                        <th>Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="table-info">
                        <td>1</td>
                        <td>Consultatie </td>
                        <td>50 lei </td>
                      </tr>      
                      <tr class="table-primary">
                        <td>2</td>
                        <td>EKG</td>
                        <td>50 lei</td>
                      </tr>
                      <tr class="table-info">
                        <td>3</td>
                        <td>Ecografie</td>
                        <td>100 lei</td>
                      </tr>
                      <tr class="table-primary">
                        <td>4</td>
                        <td>Holter</td>
                        <td>200 lei</td>
                      </tr>
                      
                     
                    </tbody>
                  </table>
            </div>
        </div>
      
 </div>


</body>
</html>