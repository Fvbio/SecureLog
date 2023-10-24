<?php
require_once '../Classes/Inscription.class.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.css">

    <title>INSCRIPTION</title>
</head>

<body>
<div  class="container w-50 mt-5 p-4 ">
        <form style="background-color: #191919" class="rounded-1 mt-5 p-4 " method="post" action="">

            <div><label for="">NOM</label><input class="form-control" type="text" name="nom"></div>
            <div><label for="">PRENOM</label><input class="form-control" type="text" name="prenom"></div>
            <div><label for="">IDENTIFIANT</label><input class="form-control" type="text" name="identifiant"></div>
            <div><label for="">MOT DE PASSE</label><input class="form-control" type="password" name="mdp"></div>
            <br>
            <div><input class="form-control btn btn-primary" type="submit" value="S'INSCRIRE" name="inscription"></div>


        </form>
    </div>

    <?php
    // VERIFIE SI LE FOORMULAIRE EST ENVOYÉ
    if (isset($_POST['inscription'])) { 
        if (!empty($_POST['nom'] and $_POST['prenom'] and $_POST['identifiant'] and $_POST['mdp'])) { // VERIFIE SI LES CHAMPS NE SONT PAS VIDE

            // INITIALISE L'OBJET
            $inscription = new Inscription($_POST['nom'], $_POST['prenom'], $_POST['identifiant'], $_POST['mdp']); 

            // AFFICHE UN MESSAGE D'ERREUR SI INSERTION ÉCHOUÉ OU REUSSI
            echo $inscription->verifInsertion(); 

        } else { // AFFICHE MESSAGE : 
            echo '<div class="text-center "> VEUILLEZ REMPLIR TOUT LES CHAMPS </div>';
        }
    }
    ?>


</body>

</html>