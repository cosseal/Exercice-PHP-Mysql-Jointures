<?php
include"BD.php";
?>
<head>
    <title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://kit.fontawesome.com/5c87734899.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<link rel="stylesheet" href="style.css">

</head>

<a href="index.php">Revenir à la page précédente</a> <br>
<h2> Compétences</h2>

<?php
//    $niveauTab = "SELECT * FROM eleves
//    LEFT JOIN `eleves_competences` as e_c ON eleves.id = e_c.eleves_id
//    LEFT JOIN competences as comp ON e_c.competences_id = comp.id
//    WHERE eleves.id =" . $index . "
//    ORDER BY eleves.id";
//        $resultat = $conn->query($niveauTab);
//        While ($tab=$resultat->fetch_assoc()) {
//            $competences[]= $tab["titre"];
//            $niveau = $tab["niveau"];
//            $niveauEval = $tab["niveau_ae"];
//        }
//    SELECT * FROM `eleves_competences` LEFT JOIN competences ON eleves_competences.id = competences.id

if(isset($_GET["index"])) {
    $index = $_GET ["index"];

    $competences = [];
    $niveau = [];
    $niveauEval=[];

    $comp_eleves = "SELECT * FROM eleves
    LEFT JOIN `eleves_competences` as e_c ON eleves.id = e_c.eleves_id
    LEFT JOIN competences as comp ON e_c.competences_id = comp.id
    WHERE eleves.id =" . $index . "
    ORDER BY eleves.id";

    $result = $conn->query($comp_eleves);

        while ($tab =$result->fetch_assoc()) {
            $competences[]= $tab["titre"];
            $niveau[] = $tab["niveau"];
            $niveauEval[] = $tab["niveau_ae"];
           echo "<br>".$tab["nom"].", ".$tab["prenom"]. "<br> Competences : " .$tab["titre"]. ", niveau : " .$tab["niveau"]. ", auto-evalue : " .$tab["niveau_ae"];
           echo $conn->error;

        }


}


?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="Chart.js"></script>
<div class="chartjs-wrapper">
<canvas id="radar-chart" class ="chartjs" width="962" height="481" style="display: block; height: 385px; width: 770px;"></canvas>
</div>

<script>

    var competences = [<?php echo "'".implode("','",$competences)."'";?>];
    var niveau = [<?php echo "'".implode("','",$niveau)."'";?>];
    var niveauEval = [<?php echo "'".implode("','",$niveauEval)."'";?>];

    var graph = new Chart(document.getElementById("radar-chart"),
        {
            type: 'radar',
            data: {
                labels: competences,
                datasets:
                    [
                        {
                            label: "niveau",
                            data: niveau,
                            fill: true,
                            backgroundColor: "rgba(255, 99, 132, 0.2)",
                            borderColor: "rgb(255, 99, 132)",
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgb(255, 99, 132)",
                            pointHoverBorderColor: "rgb(255, 99, 132)"
                        },
                        {
                            label: "niveau évalué",
                            data: niveauEval,
                            fill: true,
                            backgroundColor:"rgba(54, 162, 235, 0.2)",
                            borderColor:"rgb(54, 162, 235)",
                            pointBackgroundColor:"rgb(54, 162, 235)",
                            pointBorderColor:"#fff",
                            pointHoverBackgroundColor:"#fff",
                            pointHoverBorderColor:"rgb(54, 162, 235)",
                        }
                    ],
                options: {
                    title:
                        {
                            display: true,
                            text: 'Niveaux compétences'
                        },
                    elements:
                        {line:
                            {tension:0,
                            borderWidth:3}}
                }
            }
        });






</script>







