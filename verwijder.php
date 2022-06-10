<?php
require 'database.php';

$verwijder_id = $_GET['id'];
$sql = "DELETE  FROM `te_laat_melder` WHERE id = $verwijder_id";
$student = getData($sql, 'FETCH');
header("location:index.php")
?>