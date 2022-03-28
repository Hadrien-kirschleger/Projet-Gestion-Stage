<?php
include "../assets/connexion.php";

$textReq = "Select * from Stage where Id_Eleves =".$_GET["Id"];


$req = $cnx->prepare($textReq);
$req->execute();
$tab = $req->fetchAll();
//var_dump($tab);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class=container>
    <h1 class="text-danger">Présentation des Stages</h1>

    <br>
    <br>
    <hr>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8">
                <h2> Tableau des Stages</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant stage</th>
                            <th scope="col">Année début stage</th>
                            <th scope="col">Année fin stage</th>
                            <th scope="col">Nom entreprise</th>
                            <th scope="col">Description stage</th>
                            <th scope="col">Mail responsable</th>
                            <th scope="col">Nom responsable</th>
                            <th scope="col">Telephone responsable</th>
                            <th scope="col">Identifiant élève</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($tab as $pers)
                    {
                        echo "<tr>";
                        echo "<td>".$pers['Id_']."</td>";
                        echo "<td>".$pers['Date_Debut']."</td>";
                        echo "<td>".$pers['Date_Fin']."</td>";
                        echo "<td>".$pers['NomEntreprise']."</td>";
                        echo "<td>".$pers['Description']."</td>";
                        echo "<td>".$pers['MailResponsable']."</td>";
                        echo "<td>".$pers['NomResponsable']."</td>";
                        echo "<td>".$pers['TelephoneResponsable']."</td>";
                        echo "<td>".$pers['Id_Eleves']."</td>";
                        echo "</tr>";
                    }
                ?>
                    </tbody>
                </table>
        </div> 



</body>
</html>