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
            $TelResponsable = null;
        }
        $NomTuteur = $_GET['nomT'];
        $MailTuteur = $_GET['mailT'];
        $telTuteur = $_GET['telT'];
        if($telTuteur == ""){
            $telTuteur = null;
        }
        $apercu = $_GET['apercu'];
        if($apercu == ""){
            $apercu = null;
        }
        $Appreciation = $_GET['appreciation'];
        $Note = $_GET['note'];
        $NomEntreprise = $_GET['nomE'];
        if($NomEntreprise == ""){
            $NomEntreprise = null;
        }
        $idEntreprise = $_GET['ListeEntreprise'];
        $Ville = $_GET['ville'];
        if($Ville == ""){
            $Ville = null;
        }
        $Activite = $_GET['activite'];
        if($Activite == ""){
            $Activite = null;
        }

       var_dump($IdEleve);

        if($Ville != null){

            $txtReq2 = "INSERT INTO entreprise (NomEntreprise, Activite, Ville) VALUES (:NomEntreprise, :Activite, :Ville)";
            $req2 = $cnx->prepare($txtReq2); 
            $req2->bindParam(":NomEntreprise",$NomEntreprise);
            $req2->bindParam(":Activite",$Activite);
            $req2->bindParam(":Ville",$Ville);    
            $req2->execute();
            $idEntreprise ++;
        }

        $txtReq = "INSERT INTO stage (Date_Debut, Date_Fin, MailResponsable, NomResponsable, TelephoneResponsable, MailTuteur, NomTuteur, TelephoneTuteur, Description, Appreciation, Note, Id_entreprise, Id_eleve) VALUES (:DateDebut, :DateFin, :MailResponsable, :NomResponsable, :TelResponsable, :MailTuteur, :NomTuteur, :TelTuteur, :apercu, :Appreciation, :Note, :Id_entreprise, :IdEleve)";

       var_dump($txtReq);
        $req = $cnx->prepare($txtReq);
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
        $req->execute();
        

        header("location:../PageWebHTML/StageCree.html");
        exit();

    }    }
    
    envoi();

    

    
        
       
        
        
       