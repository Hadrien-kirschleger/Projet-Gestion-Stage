<?php

include_once "../assets/connexion.php";

function envoi(){

    global $cnx; // On récupère la connexion à la base de données du include
    
    if(isset($_GET['ListeEleve']) && isset($_GET['dd']) && isset($_GET['df'])){
        
        $IdEleve = $_GET['ListeEleve'];
        $DateDebut = $_GET['dd'];
        $DateFin = $_GET['df'];
        $NomResponsable = $_GET['nomR'];
        $MailResponsable = $_GET['mailR'];        
        $TelResponsable = $_GET['telR'];  
        if($TelResponsable == ""){
            $TelResponsable = "NULL";
        }
        $NomTuteur = $_GET['nomT'];
        $MailTuteur = $_GET['mailT'];
        $telTuteur = $_GET['telT'];
        if($telTuteur == ""){
            $telTuteur = "NULL";
        }
        $apercu = $_GET['apercu'];
        if($apercu == ""){
            $apercu = "NULL";
        }
        $NomEntreprise = $_GET['nomE'];
        $VilleEntreprise = $_GET['villeE'];
        $Activite = $_GET['activite'];

        var_dump($TelResponsable);

       
        $txtReq = "INSERT INTO Stage (Date_Debut, NomEntreprise, Description, MailResponsable, NomResponsable, TelephoneResponsable, Id_Eleves, Date_Fin) VALUES (:DateDebut, :NomEntreprise, :apercu, :MailResponsable, :NomResponsable, :TelResponsable, :IdEleve, :DateFin)";
        $txtReq2 = "INSERT INTO Entreprise (NomEntreprise, Activite, Ville) VALUES (:NomEntreprise, :Activite, :Ville)";
        

        $req = $cnx->prepare($txtReq);
        $req2 = $cnx->prepare($txtReq2);

        var_dump($txtReq);

        $req->bindParam(":IdEleve",$IdEleve);
        $req->bindParam(":DateDebut",$DateDebut);
        $req->bindParam(":DateFin",$DateFin);
        $req->bindParam(":NomResponsable",$NomResponsable);
        $req->bindParam(":MailResponsable",$MailResponsable);
        $req->bindParam(":TelResponsable",$TelResponsable);
        $req->bindParam(":apercu",$apercu);
        $req2->bindParam(":NomEntreprise",$NomEntreprise);
        $req2->bindParam(":Activite",$Activite);
        $req2->bindParam(":Ville",$Ville);



        $req->execute();
        $req2->execute();

        header("location:../PageWebHTML/StageCree.html");
        exit();

    }    }
    
    envoi();

    

    
        
       
        
        
       