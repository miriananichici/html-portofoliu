<?php
//conectare la server
$con=mysqli_connect("127.0.0.1","root","", "cardioclinic") or die ("Nuse poate conecta la serverul MySQL");
//preluare parametri de la formular
$id2=$_POST['id_medic2_form'];
$id1=$_POST['id1_form'];
$nume1=$_POST['nume1_form'];
$prenume1=$_POST['prenume1_form'];
$username1=$_POST['username1_form'];
// modificare efectiva
// afisare mesaj de eroare pentru date incorect introduse (daca sedoreste)
$query =mysqli_query($con, "update medici set username='$username1',
nume='$nume1', prenume='$prenume1' where
id_medic='$id1'") or die("Modificare esuata!". mysqli_error($con));
mysqli_close ($con);
header ("Location: afisare_medici.php");
?>