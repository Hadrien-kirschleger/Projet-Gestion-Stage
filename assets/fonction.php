<?php
header("content-type:application/json");

include_once "connexion.php";

if(isset($_GET['page'])){
    ListerEleve();
}

function ListerEleve(){

    global $cnx;

    $txtReq = "SELECT Nom, Prenom, Id_Eleves, Specialite FROM Eleves order by Id_Eleves";

    $req = $cnx->prepare($txtReq);

    $req->execute();

    $res = $req->fetchAll();

    echo (json_encode($res));


}