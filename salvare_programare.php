


<?php
//conectare la server
$con=mysqli_connect("127.0.0.1","root","", "cardioclinic") or die ("Nuse poate conecta la serverul MySQL");
//preluare parametri de la formular
$nume_pacient_form=$_POST['nume2_form'];
$prenume_pacient_form=$_POST['prenume2_form'];
$id_pacient_form=$_POST['id_pacient3_form'];
$id_medic_form=$_POST['medici_id2'];


$query =mysqli_query($con,"select nume, prenume from medici where id_medic='$id_medic_form'");
while ($row = mysqli_fetch_row($query)){
    $contor=0;

    foreach ($row as $value) {

    $sir[$contor]=$value;
    $contor++;
    }
    
    $nume_medic1=$sir[0];
    $prenume_medic1=$sir[1];
    
}
// modificare efectiva
// afisare mesaj de eroare pentru date incorect introduse (daca sedoreste)
$query1=mysqli_query($con,"insert into programare (id_medic, nume_medic, prenume_medic, id_pacient, nume_pacient, prenume_pacient)
values('$id_medic_form','$nume_medic1','$prenume_medic1', '$id_pacient_form', '$nume_pacient_form', '$prenume_pacient_form' )") or die ("Inserarea nu a
putut avea loc!". mysqli_error($con));
if ($query1==1)
$message = "SUCCESSFUL!";

mysqli_close($con);

?>