<?php

include 'database.php';	


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title></title>
</head>
<body>
    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Naam van de student:</label>
                <input type="text" name="student_naam" class="form-control" value="" autocomplete="on">
            </div>
            <div class="mb-3">
                <label class="form-label">Klas:</label>
                <input type="text" name="klas" class="form-control" value="" autocomplete="on">
            </div>

            <div class="mb-3">
                <label class="form-label">Aantal minuten te laat:</label>
                <input type="number" name="minuten_te_laat" min="0" class="form-control" value="" autocomplete="on">
            </div>

            <div class="form-group">
                <label for="reden">Reden van de student:</label>
                <textarea class="form-control" name="reden_te_laat" id="reden_te_laat" cols="30" rows="10" autocomplete="on"></textarea>
            </div>
            <br>
            <a href="index.php">
                <button type="submit" class="btn btn-primary" name="submit">Verstuur</button>
            </a>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
    $student_naam = $_POST['student_naam'];
    $klas = $_POST['klas'];
    $minuten = $_POST['minuten_te_laat'];
    $reden = $_POST['reden_te_laat'];
    
    $sql = "INSERT INTO `te_laat_melder` (`student_naam`, `klas`, `minuten_te_laat`, `reden_te_laat`) VALUES ('$student_naam', '$klas', '$minuten', '$reden')";
}

    $result = getData($sql, 'fetchall');
    header('location:index.php');
    echo $sql;
?>  
</body>
</html>