<?php
require "database.php";	

$id = $_GET['id'];
$sql = "DELETE FROM `te_laat_melder` WHERE id = $id";
$student = getData($sql, 'FETCH');

$naam = $student['student_naam'];
$klas = $student['klas'];
$minuten = $student['minuten_te_laat'];
$reden = $student['reden_te_laat'];

if(isset($_POST['btn'])){
    $name = $_POST['student_naam'];
    $klas = $_POST['klas'];
    $minuten = $_POST['minuten_te_laat'];
    $reden = $_POST['reden_te_laat'];
    $sql = "UPDATE `te_laat_melder` SET student_naam = '$name', klas = '$klas', minuten_te_laat = '$minuten', reden_te_laat = '$reden' WHERE id = $id";
    $resultaat = getData($sql, 'POST');
    header('location:index.php');
}
?>

