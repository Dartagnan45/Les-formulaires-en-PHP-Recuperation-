<?php

$errors = [];
$number = $_POST['number'];

if (isset($_POST) && (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['number'])
        && isset($_POST['message']) && isset($_POST['submit'])) && $errors[]= '') {

}

if (empty($errors)) {
    header("location: thanks.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="form.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire de contact</title>
</head>
<body class="container">

<form action="thanks.php" method="post">
    <h2><strong>Formulaire de contact</strong></h2>
    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" id="nom" name="firstname">
    </div>
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="lastname">
    </div>
    <div class="form-group">
        <label for="courriel">Courriel :</label>
        <input type="email" id="courriel" name="email">
    </div>
    <div class="form-group">
        <label for="number">Téléphone :</label>
        <input placeholder="+33 (0)1-23-45-67-89" type="tel" id="number" name="number">
        <p><?php if (preg_match('#(0|\+33)[1-9]([0-9]{2}){4}#', $_POST['number'])) {
                $sep = '[-. ]';
                $replace = '#'.$sep.'#';
                $_POST['number'] = preg_replace($sep,'' , $_POST['number']);
            } else {
                echo 'le numéro de téléphone n\'est pas correcte';
            } ?></p>
    </div>
    <div class="form-group">
        <label for="message">Message :</label>
        <textarea id="message" name="message"></textarea>
    </div>
    <div class="form-group">
        <label for="sujet">Sujet :</label>
        <select id="sujet" name="sujet">
            <option value="">Choisissez votre sujets</option>
            <option value="probleme technique">probleme technique</option>
            <option value="information">information</option>
            <option value="conseil">conseil</option>
        </select>
    </div>
    <div class="button">
        <button type="submit" class="btn btn-primary" name="submit">Envoyer votre message</button>
    </div>
</form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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




