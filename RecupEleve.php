<?php
include "connexion.php";

$textReq = "Select * from Eleves";


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
    <h1 class="text-danger">Présentation des élèves</h1>

    <br>
    <br>
    <hr>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8">
                <h2> Tableau des élèves</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Specialite</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($tab as $pers)
                    {
                        echo "<tr>";
                        echo "<td>".$pers['Id_Eleves']."</td>";
                        echo "<td>".$pers['Nom']."</td>";
                        echo "<td>".$pers['Prenom']."</td>";
                        echo "<td>".$pers['Mail']."</td>";
                        echo "<td>".$pers['Telephone']."</td>";
                        echo "<td>".$pers['Specialite']."</td>";
                        echo "</tr>";
                    }
                ?>
                    </tbody>
                </table>
        </div> 
    
        <a href="RecupStage.php">Voir tableau des stages</a>


</body>
</html>