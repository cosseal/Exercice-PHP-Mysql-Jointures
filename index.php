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


?>













