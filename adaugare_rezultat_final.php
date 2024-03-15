<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_medic.php");
    exit;
}
$con=mysqli_connect("127.0.0.1","root","", "cardioclinic") or die ("Nuse poate conecta la serverul MySQL");
//preluare parametri de la formular
$id_programare=$_POST['id_programare_form'];
$ritm_cardiac=$_POST['ritm_cardiac_form'];
$tensiune_diastolica=$_POST['tensiune_diastolica_form'];
$tensiune_sistolica=$_POST['tensiune_sistolica_form'];
$diagnostic=$_POST['diagnostic_form'];
$tratament=$_POST['tratament_form'];
$altele=$_POST['altele_form'];
$query1=mysqli_query($con,"insert into rezultate (id_programare, ritm_cardiac,tensiune_diastolica, tensiune_sistolica, diagnostic, tratament,altele)
values('$id_programare','$ritm_cardiac','$tensiune_diastolica', '$tensiune_sistolica','$diagnostic','$tratament','$altele' )") or die ("Inserarea nu a
putut avea loc!". mysqli_error($con));
mysqli_close ($con);
header ("Location: afisare_programari.php");
?>     