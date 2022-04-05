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
        $Appreciation = $_GET['appreciation'];
        $Note = $_GET['note'];
        $NomEntreprise = $_GET['nomE'];
        if($NomEntreprise == ""){
            $NomEntreprise = "NULL";
        }
        $idEntreprise = $_GET['ListeEntreprise'];
        if($idEntreprise == ""){
            $idEntreprise = "NULL";
        }
        $Ville = $_GET['ville'];
        if($Ville == ""){
            $Ville = "NULL";
        }
        $Activite = $_GET['activite'];
        if($Activite == ""){
            $Activite = "NULL";
        }

        var_dump($TelResponsable);

        if($idEntreprise == "NULL"){

            $txtReq2 = "INSERT INTO Entreprise (NomEntreprise, Activite, Ville) VALUES (:NomEntreprise, :Activite, :Ville)"; 
            $idEntreprise = $_GET["ListeEntreprise"];
        }

        $txtReq = "INSERT INTO Stage (Date_Debut, Date_Fin, MailResponsable, NomResponsable, TelephoneResponsable, MailTuteur, NomTuteur, TelephoneTuteur, Description, Appreciation, Note, Id_entreprise, Id_Eleves) VALUES (:DateDebut, :DateFin, :MailResponsable, :NomResponsable, :TelephoneResponsable, :MailTuteur, :NomTuteur, :TelephoneTuteur, :apercu, :Appreciation, :Note, :Id_entreprise, :Id_Eleves)";

       
             
       
        
        $req2 = $cnx->prepare($txtReq2);
        $req = $cnx->prepare($txtReq);
       

        var_dump($txtReq);

        $req->bindParam(":IdEleve",$IdEleve);
        $req->bindParam(":DateDebut",$DateDebut);
        $req->bindParam(":DateFin",$DateFin);
        $req->bindParam(":NomResponsable",$NomResponsable);
        $req->bindParam(":MailResponsable",$MailResponsable);
        $req->bindParam(":TelResponsable",$TelResponsable);
        $req->bindParam(":NomTuteur",$NomTuteur);
        $req->bindParam(":MailTuteur",$MailTuteur);
        $req->bindParam(":TelTuteur",$telTuteur);
        $req->bindParam(":apercu",$apercu);
        $req->bindParam(":Appreciation",$Appreciation);
        $req->bindParam(":Note",$Note);
        $req->bindParam(":Id_entreprise",$idEntreprise);


        $req2->bindParam(":NomEntreprise",$NomEntreprise);
        $req2->bindParam(":Activite",$Activite);
        $req2->bindParam(":Ville",$Ville);


        $req2->execute();
        $req->execute();
        

        header("location:../PageWebHTML/StageCree.html");
        exit();

    }    }
    
    envoi();

    

    
        
       
        
        
       