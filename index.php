<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Overzicht studenten te laat in de les</title>
<style>
    .telaat{
        text-align:center; 
        color:#f00; 
        font-weight:bold;"
    }

    .ergtelaat{
        text-align:center; 
        color:#fff; 
        background-color: #f00;
        font-weight:bold;"
    }
</style>
</head>
<body>
    <main style="width: 900px; margin: 20px auto;">
    <div class="container">
        <table class="table my-2">
            <h4 class="table my-4">Overzicht studenten die te laat waren</h4>
            <table class="table table-striped">
            <tr>
                <th nowrap>Naam student</th>
                <th>Klas</th>
                <th nowrap>Minuten te laat</th>
                <th>Reden te laat</th>
 
            <?php
                $sql = "SELECT * FROM `crud_challenge`";
                $studenten = getData($sql, 'fetchall');
                foreach($studenten as $student){
                    echo "<tr>";
                    echo "<td>{$student['student_naam']}</td>";
                    echo "<td> {$student['klas']} </td>";
                    echo "<td> {$student['minuten_te_laat']}</td>";
                    echo "<td> {$student['reden_te_laat']}</td>";
                    echo "<td><a class='btn btn-success' href='update.php?id={$student['id']}'>update</a></td>";
                    echo "</tr>";
                }
            ?>
                <th><a href="verwijder.php" class="btn btn-delete">Verwijder</a></th>
            </tr>    
        </table>
        <br>
        <a href="telaat.php" class="btn btn-success" id="Knop1">W&eacute;&eacute;r eentje te laat!</a> 
        

        <?php
        $sql = "SELECT MAX(minuten_te_laat) AS hoogst ,AVG(minuten_te_laat) AS gemiddeld ,SUM(minuten_te_laat) AS opsomming FROM `te_laat_melder`";
        $minuten = getData($sql, 'fetchall');
        var_dump($minuten);
        ?>
        <br><br><br>


<table class="table table-striped">
    <thead>
        <tr>
            <th rowspan="3">Statistieken</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Hoogste aantal minuten te laat</td>
            <td><?php echo $minuten['hoogst'] ?></td>
        </tr>
        <tr>
            <td>Gemiddeld aantal minuten</td>
            <td><?php echo $minuten['gemiddeld']?></td>
        </tr>
        <tr>
            <td>Totaal aantal minuten</td>
            <td><?php echo $minuten['opsomming']?></td>
        </tr>
    </tbody>
</table>
<br><br><br>
</main>
</body>
</html>