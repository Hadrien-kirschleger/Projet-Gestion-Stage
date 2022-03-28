<?php

include_once "../assets/connexion.php";

function envoi(){

    global $cnx; // On récupère la connexion à la base de données du include
    
    if(isset($_GET['ListeEleve']) && isset($_GET['dd']) && isset($_GET['df'])){
        
        $IdEleve = $_GET['ListeEleve'];
        $DateDebut = $_GET['dd'];
        $DateFin = $_GET['df'];
        $NomEntreprise = $_GET['nomE'];
        $NomResponsable = $_GET['nomR'];
        $MailResponsable = $_GET['mailR'];        
        $TelResponsable = $_GET['telR'];  
        if($TelResponsable == ""){
            $TelResponsable = "NULL";
        }
        $apercu = $_GET['apercu'];
        if($apercu == ""){
            $apercu = "NULL";
        }

        var_dump($TelResponsable);

       
        $txtReq = "INSERT INTO Stages (Date_Debut, Nom_Entreprise, Description, Mail_Responsable, Nom_Responsable, Telephone_Responsable, Date_Fin) VALUES (:DateDebut, :NomEntreprise, :apercu, :MailResponsable, :NomResponsable, :TelResponsable, :DateFin) SELECT NULL FROM Stages inner join Eleves on Stages.Id_Eleves = Eleves.Id_Eleves WHERE Eleves.Id_Eleve = :IdEleve";
        

        $req = $cnx->prepare($txtReq);

        var_dump($txtReq);

        $req->bindParam(":IdEleve",$IdEleve);
        $req->bindParam(":DateDebut",$DateDebut);
        $req->bindParam(":DateFin",$DateFin);
        $req->bindParam(":NomEntreprise",$NomEntreprise);
        $req->bindParam(":NomResponsable",$NomResponsable);
        $req->bindParam(":MailResponsable",$MailResponsable);
        $req->bindParam(":TelResponsable",$TelResponsable);
        $req->bindParam(":apercu",$apercu);


        $req->execute();

        

    }    }
    
    envoi();

    

    
        
       
        
        
       