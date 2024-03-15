<?php
$con = mysqli_connect("127.0.0.1", "root", "", "cardioclinic") or die("Nu se poate conecta la serverul MySQL");

    $id_medic = $_POST['id_medic'];
    $start_time = $_POST['start'];
    $close_time = $_POST['end'];
    $durata = $_POST['durata'];

    $query1=mysqli_query($con,"insert into orar (id_medic, start_time, close_time, durata)
    values('$id_medic','$start_time','$close_time', '$durata' )") or die ("Medicul are setat un orar!");
    mysqli_close ($con);
    header ("Location: adaugare_orar.php");
?>