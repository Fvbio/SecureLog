<?php 
require '../Classes/Authentification.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement Mot de passe</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.css">

</head>
<body class="container">
    
<form class="w-50" action="">
    <div>
        <label for="">Entrez votre code</label>
        <input class="form-control" name="code" type="password">
    </div>
    <div>
        <label for="">Entrez votre nouveau mot de passe</label>
        <input class="form-control" name="mdp" type="password">
    </div>
    <input class="btn btn-danger" type="submit" name="" id="">

</form>

<?php 
    $nvMdp = new Authentification;

    $nvMdp->getCode();
    

    if(isset($_POST['submit'])){
        if($nvMdp->getCode() == $_POST['code']){
            echo "bravo";
        }else{
            echo "pas bon";
        }
    }

?>






</body>
</html>