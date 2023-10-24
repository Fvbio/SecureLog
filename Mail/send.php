<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.css">

</head>

<body>



    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    require '../Classes/Authentification.class.php';


    $RecupEmail = new Authentification();


    if (isset($_POST['submit']) and $RecupEmail->verifIdentifiant($_POST['identifiant']) == true) { // verifie si appuie sur le bouton et si identifiant existe

        $valide = true;

    }else{
        echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 1000);</script>'; // Redirection après 1 seconde

    }

    if ($valide == TRUE) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = ''; // gmail app login
        $mail->Password = ''; // gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('');

        $mail->addAddress($_POST['identifiant']); // ADRESSE DU DESTINATAIRE

        $code = substr(uniqid(), -4); // Génère une chaîne de 4 caractères à partir 
                                      //de la fin de la chaîne générée par uniqid()

        $subject = "Changement de Mot de Passe";
        $message = "Voici votre code: " . $code;


        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();

        if ($mail->send()) {
                $RecupEmail->recupCode($code);

                echo header('Location: ../Pages/changementMdp.php');
        } else {
            echo 'Une erreur est survenue lors de l\'envoi du message';
        }
    }



    ?>







</body>

</html>