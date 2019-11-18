<?php
session_start();
$_SESSION = $_POST;
$errors = [];

if (array_key_exists('submit', $_POST)) {
    if (isset($_POST['firstanme']) && empty($_POST['firstname'])) {
        $errors['firstname'] = "Le nom ne peut être vide";
    }
    if (!preg_match('#\w#', $_POST['firstname'])) {
        $errors['firstname'] = "Le nom doit contenir que des lettres";
    }
    if (isset($_POST['lastname']) && empty($_POST['lastname'])) {
        $errors['lastname'] = "Le nom ne peut être vide";
    }
    if (!preg_match('#\w#', $_POST['lastname'])) {
        $errors['lastname'] = "Le nom doit contenir que des lettres";
    }
    if (isset($_POST['email']) && empty($_POST['email']) OR !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'email entré n'est pas valide";
    }
    if (isset($_POST['number']) && empty($_POST['number'])) {
        $errors['number'] = "Le numéro ne peut être vide";
        wordwrap($_POST['number'], 2, "-", true);
    }
    if (!preg_match('#(0|\+33)[1-9]([0-9]{2}){4}#', $_POST['number'])) {
        $errors['number'] = "Le numéro entré n'est pas valide";
    }
    if (isset($_POST['sujet']) && empty($_POST['sujet'])) {
        $errors['sujet'] = 'Veuillez selectionner un sujet';
    }
    if (isset($_POST['message']) && empty($_POST['message'])) {
        $errors['message'] = 'Le message ne peut être vide';
    }
    if (empty($errors)) {
        header("location: thanks.php");
    }
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
<body>
<div class="progress">
    <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
         style="width: 10%" aria-valuenow="100"
         aria-valuemin="0" aria-valuemax="100">
    </div>
</div>

<div class="container">
    <form action="" method="post">
        <?php if (!empty($errors)): ?>
            <legend class="alert alert-danger">Des erreurs ont été trouvées</legend>
        <?php endif; ?>
        <h2><strong>Formulaire de contact</strong></h2>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="firstname" minlength="3" maxlength="12">
            <p><?php if (isset($errors['firstname'])) echo $errors['firstname'] ?></p>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="lastname">
            <p><?php if (isset($errors['lastname'])) echo $errors['lastname'] ?></p>
        </div>

        <div class="form-group">
            <label for="courriel">Courriel :</label>
            <input type="email" id="courriel" name="email" required>
            <p><?php if (isset($errors['email'])) echo $errors['email'] ?></p>
        </div>

        <div class="form-group">
            <label for="number">Téléphone :</label>
            <input placeholder="+33 (0)1-23-45-67-89" type="tel" id="number" name="number" required>
            <p><?php if (isset($errors['number'])) echo $errors['number']; ?></p>
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea id="message" name="message"></textarea>
            <p><?php if (isset($errors['message'])) echo $errors['message'] ?></p>
        </div>

        <div class="form-group">
            <label for="sujet">Sujet :</label>
            <select id="sujet" name="sujet">
                <option value="">Choisissez votre sujets</option>
                <option value="probleme technique">probleme technique</option>
                <option value="information">information</option>
                <option value="conseil">conseil</option>
            </select>
            <p><?php if (isset($errors['sujet'])) echo $errors['sujet'] ?></p>
        </div>

        <div class="button">
            <button type="submit" class="btn btn-primary" name="submit">Envoyer votre message</button>
        </div>
    </form>
</div>

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
<script>

    setTimeout(function () {
        alert('Tu dors ?');
    }, 30000);

    function progress(){
        var progress = $('#progressbar').progressbar('option', 'value'); // récupération de la valeur actuelle
        var value = $('input');

        if(progress < 100% && value > 0){
            $('#progressbar').progressbar('option', 'value', progress + 20%); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
             // puis on relance la fonction
        }
    }

    /*$(document).ready(function(){
        var progressBarVal = 0 ;
        var html="<div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow="+progressBarVal+" " +
            "aria-valuemin='0' aria-valuemax='100' style='width:"+progressBarVal+"%'>"+progressBarVal+"%</div>";
        $(".progress").append(html);
    });*/
    // la fonction exécutera l'alerte après 5000 millisecondes, soit 5 secondes

</script>
</body>
</html>
