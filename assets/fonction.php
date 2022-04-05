<?php
header("content-type:application/json");

include_once "connexion.php";

if(isset($_GET['page'])){
    ListerEleve();
}

if(isset($_GET['Entreprise'])){
    ListerEntreprise();
}

function ListerEleve(){

    global $cnx;

    $txtReq = "SELECT Nom, Prenom, Id_eleve, Specialite FROM eleve order by Id_eleve";

    $req = $cnx->prepare($txtReq);

    $req->execute();

    $res = $req->fetchAll();

    echo (json_encode($res));


}

function listerEntreprise(){
    
        global $cnx;
    
        $txtReq = "SELECT Id_entreprise, NomEntreprise FROM entreprise order by NomEntreprise";
    
        $req = $cnx->prepare($txtReq);
    
        $req->execute();
    
        $res = $req->fetchAll();
    
        echo (json_encode($res));
    
}