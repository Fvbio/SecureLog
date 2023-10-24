<?php
include 'Classes/Connexion.class.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.css">
    <title>Connexion</title>
</head>

<body class="">

    <!-- FORMULAIRE  -->
    <div class="container w-50 mt-5 p-4 mx-auto">
    <form style="background-color: #191919" class="rounded-1 mt-5 p-4" action="" method="post">

        <div>
            <label class="form-label mt-4" for="">IDENTIFIANT</label><input name="identifiant" class="form-control" type="email">
        </div>
        <div>
            <label class="form-label mt-4" for="">MOT DE PASSE</label><input name="motDePasse" class="form-control" type="password">
        </div>
        <br>
        <table>
            <tr>
                <td class="w-50"> <input class="form-control btn btn-primary" type="submit" value="SE CONNECTER" name="submit"></td>
                <td class="w-25"><input class="form-control btn btn-primary" type="submit" value="MOT DE PASSE OUBLIÉ" name="Oublie"></td>
                <td class="w-25"><input class="form-control btn btn-primary" type="submit" value="S'INSCRIRE" name="inscription"></td>
            </tr>
        </table>

    </form>
</div>




    <?php

    // Controle formulaire
    if (isset($_POST['submit'])) {
        if (!empty($_POST['identifiant'] and $_POST['motDePasse'])) {// Verifie que les 2 champs ne sont pas vide.
            $tentativeConnexion = new Connexion($_POST['identifiant'], $_POST['motDePasse']);
            echo '<div class="text-center">' . $tentativeConnexion->verifieIdentifiantMdp() . '</div>';
        } else {
            echo '<div class="text-center"> VEUILLEZ REMPLIR TOUT LES CHAMPS </div>';
        }
    }

    // SI MDP OUBLIÉ
    if (isset($_POST['Oublie'])) {
        header('Location: Mail/index.php');
    }

    if (isset($_POST['inscription'])) {
        // header('Location: inscription.php');
        header('Location: Pages/inscription.php');
    }




    ?>










</body>

</html>