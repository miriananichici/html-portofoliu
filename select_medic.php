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
</head>

<body>

    <div class="container">
    <form method="POST"  action="book1.php">
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
            <button class="btn btn-success" type="submit">Selectare</button>
        </form>
  
      
    </div>


</body>

</html>