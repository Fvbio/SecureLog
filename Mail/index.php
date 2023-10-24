<?php require '../Classes/Authentification.class.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.css">
</head>

<body>

    <div class="container w-50 mt-5 p-4">

        <!-- FORMULAIRE 1: VERIFIE SI L'IDENTIFIANT EXISTE -->
        <form style="background-color: #191919" class="rounded-1 mt-5 p-4 " method="post" action="send.php">
    
            <label for="">Entrez votre identifiant</label>
            <input class="form-control" name="identifiant" type="email">

            <input class="form-control btn btn-info" type="submit" name="submit" value="ENTRER">
            </table>
        </form>

    </div>

</body>

</html>