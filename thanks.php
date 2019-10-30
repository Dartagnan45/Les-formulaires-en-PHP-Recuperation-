<?php
session_start();

$firstname = htmlspecialchars($_SESSION['firstname']);
$lastname = htmlspecialchars($_SESSION['lastname']);
$email = htmlspecialchars($_SESSION['email']);
$number = $_SESSION['number'] = wordwrap($_SESSION['number'],2,"-",true );
$sujet = htmlspecialchars($_SESSION['sujet']);
$message = htmlspecialchars($_SESSION['message']);


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="thanks.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>formulaire de contact</title>
</head>
<body class="container">

<h2>Votre demande de contact est bien envoyée</h2>

<p><?php echo 'Merci ' . '<strong>' . $firstname . '</strong>' . ' ' . '<strong>' . $lastname . '</strong>' . ' de nous avoir contacté à propos de ' . '<strong>' . $sujet . '</strong>' . '.' ?></p>
<p><?php echo 'Un de nos conseiller vous contactera soit à l’adresse ' . '<strong>' . $email . '</strong>' . ' ou par téléphone au ' . '<strong>' . $number . '</strong>' .
        ' dans les plus brefs délais pour traiter votre demande : '; ?> </p>
<div class="message">
<h4>Votre message</h4>
<p><?php echo $message ?></p>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>
</html>