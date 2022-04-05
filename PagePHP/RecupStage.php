<?php
include "../assets/connexion.php";

if(isset($_GET['Id'])){

   
    $textReq = ("Select stage.idStage, stage.Date_Debut, entreprise.NomEntreprise, entreprise.Activite, entreprise.Ville, stage.Date_Fin, stage.MailResponsable, stage.Description, stage.TelephoneResponsable, stage.NomResponsable, stage.Id_eleve, eleve.Nom, eleve.Prenom, stage.NomTuteur, stage.MailTuteur, stage.TelephoneTuteur, stage.Appreciation, stage.Note from stage INNER JOIN eleve on stage.Id_eleve = eleve.Id_eleve INNER JOIN entreprise on stage.Id_entreprise = entreprise.Id_entreprise  where stage.Id_eleve = ".$_GET['Id']);
    
}
else{

    $textReq = "Select stage.idStage, stage.Date_Debut, entreprise.NomEntreprise, entreprise.Activite, entreprise.Ville, stage.Date_Fin, stage.MailResponsable, stage.Description, stage.TelephoneResponsable, stage.NomResponsable, stage.Id_eleve, eleve.Nom, eleve.Prenom, stage.NomTuteur, stage.MailTuteur, stage.TelephoneTuteur, stage.Appreciation, stage.Note from stage INNER JOIN eleve on stage.Id_eleve = eleve.Id_eleve INNER JOIN entreprise on stage.Id_entreprise = entreprise.Id_entreprise order by Id_eleve";

}


$req = $cnx->prepare($textReq);
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
        
        <div class="col-9">
                <h2> Tableau des Stages</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant Stage</th>
                            <th scope="col">Eleves</th>
                            <th scope="col">Début stage</th>
                            <th scope="col">Fin stage</th>
                            <th scope="col">Nom entreprise</th>
                            <th scope="col">Mail responsable</th>
                            <th scope="col">Nom responsable</th>
                            <th scope="col">Telephone responsable</th> 
                            <th scope="col">Mail tuteur</th> 
                            <th scope="col">Nom tuteur</th> 
                            <th scope="col">Telephone tuteur</th> 
                            <th scope="col">Appreciation</th> 
                            <th scope="col">Note</th> 
                            <th scope="col">Description</th> 

                        </tr>
                    </thead>
                    <tbody>

                <?php
                    foreach ($tab as $pers)
                    {
                        echo "<tr>";
                        echo "<td>".$pers['idStage']."</td>";   
                        echo "<td>".$pers['Prenom']." ".$pers['Nom']."</td>";
                        echo "<td>".$pers['Date_Debut']."</td>";
                        echo "<td>".$pers['Date_Fin']."</td>";
                        echo "<td>".$pers['NomEntreprise']."</td>";
                        echo "<td>".$pers['MailResponsable']."</td>";
                        echo "<td>".$pers['NomResponsable']."</td>";
                        echo "<td>".$pers['TelephoneResponsable']."</td>";  
                        echo "<td>".$pers['MailTuteur']."</td>";  
                        echo "<td>".$pers['NomTuteur']."</td>";  
                        echo "<td>".$pers['TelephoneTuteur']."</td>"; 
                        echo "<td>".$pers['Appreciation']."</td>"; 
                        echo "<td>".$pers['Note']."</td>";  
                        echo "<td>".$pers['Description']."</td>";

                        echo "</tr>";
                    }
                ?>
                    </tbody>
                </table>
        </div> 
        <div>

        </div>


        <a href="RecupEleve.php">Voir tableau des élèves</a>


</body>
</html>