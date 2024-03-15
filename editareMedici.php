<?php
//preluare parametri transmisi din link cu metoda GET
$id_medic=$_GET['id_medic'];
$username=$_GET['username'];
$nume=$_GET['nume'];
$prenume=$_GET['prenume'];


//preluare parametri de la formular

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
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
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
        <li><a href="#">Geo</a></li>
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
        <li class="active"><a href="admin.php">Dashboard</a></li>
        <li><a href="register_medic.php">Adaugare medic</a></li>
        <li><a href="afisare_medici.php">Vizualizare medici</a></li>
        <li><a href="#section3">Geo</a></li>
      </ul><br>
    </div>
    <br>
    
<div class="row">
    <div class="col-sm-2"></div>

    <div class="col-sm-5">
        <h2>Editare medic.</h2>
        
        <form action="editareMedici_Final.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username1_form"  value="<?php echo $username;?>">
                
            </div>
            <input type="text" class="form-control hidden" name="id1_form"  value="<?php echo $id_medic;?>">
            <div class="form-group">
                <label>Nume</label>
                <input type="text" class="form-control"  name="nume1_form" value="<?php echo $nume;?>">
               
            </div>
            <div class="form-group">
                <label>Prenume</label>
                <input type="text" class="form-control" name="prenume1_form" value="<?php echo $prenume; ?>">
                
            </div>
            
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Modifica">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
</div>
<div class="col-sm-2"></div>
    </div>

    </body>
</html>