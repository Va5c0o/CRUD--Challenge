<?php
require 'database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `te_laat_melder` WHERE id = $id";
$student = getData($sql, 'fetch');


if (isset($_POST['submit'])) {
    $naam = $_POST['student_naam'];
    $klas = $_POST['klas'];
    $minuten = $_POST['minuten_te_laat'];
    $reden = $_POST['reden_te_laat'];
    $sql = "UPDATE `te_laat_melder` SET student_naam ='$naam', klas = '$klas', minuten_te_laat = '$minuten', reden_te_laat = '$reden' WHERE id = $id";
    $result = getData($sql, 'POST');
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Update</title>
</head>
<body>
    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Naam van de student</label>
                <input type="text" name="student_naam" class="form-control" value="" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Klas</label>
                <input type="text" name="klas" class="form-control" value="" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Aantal minuten telaat</label>
                <input type="number" name="minuten_te_laat" min="0" class="form-control" value="" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="reden">Beredenering student:</label>
                <textarea class="form-control" name="reden_te_laat" id="reden" cols="30" rows="10" autocomplete="off"></textarea>
            </div>
            <a href="index.php">
                <button type="submit" class="btn btn-primary" name="submit">Opslaan</button>
            </a>
        </form>
    </div>
</body>

</html>

