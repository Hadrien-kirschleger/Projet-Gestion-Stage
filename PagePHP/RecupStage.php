<?php
include "../assets/connexion.php";

if(isset($_GET['Id'])){

    $IdEleve = $_GET['Id'];    
    $req = $bdd->prepare("Select Stage.Date_Debut, Stage.NomEntreprise, Stage.Date_Fin, Stage.MailResponsable, Stage.Description, Stage.TelephoneResponsable, Stage.NomResponsable, Stage.Id_Eleves, Eleves.Nom, Eleves.Prenom from Stage INNER JOIN Eleves on Stage.Id_Eleves = Eleves.Id_Eleves where Id_Eleves = :Id");
    
}
else{

    $textReq = "Select Stage.Date_Debut, Stage.NomEntreprise, Stage.Date_Fin, Stage.MailResponsable, Stage.Description, Stage.TelephoneResponsable, Stage.NomResponsable, Stage.Id_Eleves, Eleves.Nom, Eleves.Prenom from Stage INNER JOIN Eleves on Stage.Id_Eleves = Eleves.Id_Eleves order by Id_Eleves";

}


$req = $cnx->prepare($textReq);
$req->bindParam(":IdEleve",$IdEleve);
$req->execute();
$tab = $req->fetchAll();


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
                            <th scope="col">Eleves</th>
                            <th scope="col">Début stage</th>
                            <th scope="col">Fin stage</th>
                            <th scope="col">Nom entreprise</th>
                            <th scope="col">Mail responsable</th>
                            <th scope="col">Nom responsable</th>
                            <th scope="col">Telephone responsable</th>                            
                        </tr>
                    </thead>
                    <tbody>

                <?php
                    foreach ($tab as $pers)
                    {
                        echo "<tr>";
                        echo "<td>".$pers['Prenom']." ".$pers['Nom']."</td>";
                        echo "<td>".$pers['Date_Debut']."</td>";
                        echo "<td>".$pers['Date_Fin']."</td>";
                        echo "<td>".$pers['NomEntreprise']."</td>";
                        echo "<td>".$pers['MailResponsable']."</td>";
                        echo "<td>".$pers['NomResponsable']."</td>";
                        echo "<td>".$pers['TelephoneResponsable']."</td>";                       
                        echo "</tr>";
                    }
                ?>
                    </tbody>
                </table>
        </div> 
        <div>

        </div>



</body>
</html>