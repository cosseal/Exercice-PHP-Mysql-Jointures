<?php
include"BD.php";
?>
<a href="index.php">Revenir à la page précédente</a> <br>
<h2> Compétences</h2>
<?php

$index = $_GET ["index"];

    $comp_eleves = "SELECT * FROM eleves
    LEFT JOIN `eleves_competences` as e_c ON eleves.id = e_c.eleves_id
    LEFT JOIN competences as comp ON e_c.competences_id = comp.id
    WHERE eleves.id =" . $index. "
    ORDER BY eleves.id";


    $result = $conn->query($comp_eleves);

    while ($tab =$result->fetch_assoc()) {


       echo "<br>".$tab["nom"].", ".$tab["prenom"]. "<br> Competences : " .$tab["titre"]. ", niveau : " .$tab["niveau"]. ", auto-evalue : " .$tab["niveau_ae"];
       echo $conn->error;}
?>

