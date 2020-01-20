<?php
include "BD.php";
?>

<h2>Liste des éléves</h2>

<ul>
<?php


$infosEl = "SELECT * FROM eleves LEFT JOIN eleves_infos ON eleves.id = eleves_infos.eleves_id";
$result = $conn->query($infosEl);

while ($tab = $result->fetch_assoc() ) {
    $i = $tab["id"];
    echo "<li><a href='competences.php?index=$i'>" . $tab["nom"] . " " . $tab["prenom"] . "</a> <br> age : " . $tab["age"]
        . " ans, ville : " . $tab["ville"] . ", surnom : " . $tab["avatar"] . "</li>";
}

?>
</ul>




<?php

//$sql = "INSERT INTO eleves VALUES(NULL , 'Yolande','Cosse', 'Yoyo','Ric')";
//$conn->query($sql);
//echo $conn->error;

//$infosEl = "SELECT * FROM eleves LEFT JOIN eleves_infos ON eleves.id = eleves_infos.eleves_id";
//$result = $conn->query($infosEl);
//
//while ($tab = $result->fetch_assoc() ){
//    echo "<br>".$tab["nom"]. " " . $tab["prenom"]. "<br>" . $tab["age"]
//        . "ans," .$tab["ville"]. ", " . $tab["avatar"];
//}
//
//$comp_eleves = "SELECT * FROM eleves
//LEFT JOIN `eleves_competences` as e_c ON eleves.id = e_c.eleves_id
//LEFT JOIN competences as comp ON e_c.competences_id = comp.id";
//
//$result = $conn->query($comp_eleves);
//
//while ($tab =$result->fetch_assoc()) {
//    echo "<br>".$tab["nom"].", ".$tab["prenom"]. "<br> Competences : " .$tab["titre"]. ", niveau : " .$tab["niveau"]. ", auto-evalue : " .$tab["niveau_ae"];
//    echo $conn->error;
//}
?>













