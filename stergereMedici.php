<?php
$con=mysqli_connect("127.0.0.1","root","","cardioclinic") or die ("Nu se poate conecta la serverul MySQL");
//preluare marca transmisa din link cu metoda GET
$id_medic=$_GET['id_medic'];
// stergere student pe baza marcii
$query1=mysqli_query($con,"delete from medici where id_medic='$id_medic'") or die ("Stergerea nu a putut avea loc!".
mysqli_error($con));
mysqli_close($con);
header ("Location: afisare_medici.php");
?>