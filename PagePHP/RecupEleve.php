<?php
include "../assets/connexion.php";
$textReq = "Select * from eleve";
$req = $cnx->prepare($textReq);
$req->execute();
$tab = $req->fetchAll();


@$keywords = $_GET['keywords'];
@$valider = $_GET['valider'];

if(isset($valider) && !empty(trim($keywords)))
{
    $words=explode(" ",trim($keywords));
    for($i=0;$i<count($words);$i++)
    {
        $kw[$i]="Nom like '%".$words[$i]."%'";
    }


    $res = $cnx->prepare("select Id_eleve,Nom from eleve where ".implode(" or ", $kw));
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();

    $tabBis=$res->fetchAll();

    $afficher="oui";

    
}


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
    <h1 class="text-danger">Présentation des élèves</h1>

    <br>
    <br>
    <hr>
    <div class="row">
        <div class="col-1"></div>



        <div class="col-8">

            <form name="fo" method="get" action=" ">
                <input type="text" name="keywords" value="<?php echo $keywords ?>" placeholder="Mots-clés" />
                <input type="submit" name="valider" value="Rechercher" />
            </form>

            <br>

            <?php if(@$afficher=="oui") { ?>


            <div id="resultats">
                <div id="nbr"><?=count($tabBis)." ".(count($tabBis)>1?"résultats trouvés":"résultat trouvé") ?> </div>
                    <ol>
                        <?php for($i=0;$i<count($tabBis);$i++){ ?>

                        <a href ="RecupStage.php?Id=<?php echo $tabBis[$i]["Id_eleve"];?>" > <li><?php echo$tabBis[$i]["Nom"] ?></li></a>
                        <?php } ?>
                    </ol>
            </div>
            <?php } ?>
            <br>

            <h2> Tableau des élèves</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Specialite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tab as $pers) {
                        echo "<tr>";
                        echo "<td>" . $pers['Nom'] . "</td>";
                        echo "<td>" . $pers['Prenom'] . "</td>";
                        echo "<td>" . $pers['Mail'] . "</td>";
                        echo "<td>" . $pers['Telephone'] . "</td>";
                        echo "<td>" . $pers['Specialite'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <a href="RecupStage.php">Voir tableau des stages</a>


</body>

</html>