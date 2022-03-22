<?php
include "connexion.php";

$textReq = "Select * from Eleves";


$req = $cnx->prepare($textReq);
$req->execute();
$tab = $req->fetchAll();
var_dump($tab);