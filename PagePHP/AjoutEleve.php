<?php

include_once "../assets/connexion.php";

function envoi(){

    global $cnx; // On récupère la connexion à la base de données du include
    
    if(isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['spe'])){
        
        $prenom = $_GET['prenom'];
        $nom = $_GET['nom'];
        if(isset($_GET['tel'])){
            $tel = $_GET['tel'];
        }else{
            $tel = 'NULL';
        }
        if(isset($_GET['mail'])){
            $mail = $_GET['mail'];
        }else{
            $mail = 'NULL';
        }
        $spe = $_GET['spe'];

        $txtReq = "INSERT INTO Eleves (Nom, Prenom, Mail, Telephone, Specialite) VALUES (upper(:nom), :prenom, :mail, :tel, :spe)";

        $req =  $cnx->prepare($txtReq);

        $req->bindParam(":prenom",$prenom);
        $req->bindParam(":nom",$nom);  
        $req->bindParam(":tel",$tel);
        $req->bindParam(":mail",$mail);
        $req->bindParam(":spe",$spe);

        $req->execute();


    }

   

}

envoi();


global $cnx;