<?php
session_start();
$_SESSION = $_POST;
$errors = [];

if (array_key_exists('submit', $_POST)) {
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = "Le nom ne peut être vide";
    }
    if (!preg_match('#\w#', $_POST['firstname'])) {
        $errors['firstname'] = "Le nom doit contenir que des lettres";
    }
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = "Le nom ne peut être vide";
    }
    if (!preg_match('#\w#', $_POST['lastname'])) {
        $errors['lastname'] = "Le nom doit contenir que des lettres";
    }
    if (empty($_POST['email']) OR !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'email entré n'est pas valide";
    }
    if (!preg_match('#(0|\+33)[1-9]([0-9]{2}){4}#', $_POST['number'])) {
        $errors['number'] = "Le numéro entré n'est pas valide";
    }
    if (empty($_POST['sujet'])) {
        $errors['sujet'] = 'Veuillez selectionner un sujet';
    }
    if (empty($_POST['message'])) {
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

<div id="progress-inputs" class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0"
         aria-valuemin="0" aria-valuemax="100" style="width:0;">
        <span id="sr-only">0%</span>
    </div>
</div>

<div class="container">
    <form id="input-progress" action="" method="post">
        <?php if (!empty($errors)): ?>
            <legend class="alert alert-danger">Des erreurs ont été trouvées</legend>
        <?php endif; ?>
        <h2><strong>Formulaire de contact</strong></h2>

        <div class="form-group">
            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname" minlength="3" maxlength="12" class="moo">
            <p><?php if (isset($errors['firstname'])) echo $errors['firstname'] ?></p>
        </div>

        <div class="form-group">
            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="lastname" class="moo" required>
            <p><?php if (isset($errors['lastname'])) echo $errors['lastname'] ?></p>
        </div>

        <div class="form-group">
            <label for="email">Courriel :</label>
            <input type="email" id="email" name="email" class="moo" required>
            <p><?php if (isset($errors['email'])) echo $errors['email'] ?></p>
        </div>

        <div class="form-group">
            <label for="number">Téléphone :</label>
            <input placeholder="+33 (0)1-23-45-67-89" type="tel" id="number" name="number" class="moo" required>
            <p><?php if (isset($errors['number'])) echo $errors['number'];
                $_POST['number'] = wordwrap($_POST['number'], 2, "-", true); ?></p>
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea id="message" name="message" class="moo"></textarea>
            <p><?php if (isset($errors['message'])) echo $errors['message'] ?></p>
        </div>

        <div class="form-group">
            <label for="subject">Sujet :</label>
            <select id="subject" name="subject">
                <option value="">Choisissez votre sujets</option>
                <option value="probleme technique">probleme technique</option>
                <option value="information">information</option>
                <option value="conseil">conseil</option>
            </select>
            <p><?php if (isset($errors['subject'])) echo $errors['subject'] ?></p>
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
    }, 100000);


    $(document).ready(function () {
        function updateInputProgress() {
            var filledFields = 0;
            $("#input-progress").find("input, select, textarea").each(function () {
                if ($(this).val() !== "") {
                    filledFields++;
                }
            });
            var percent = Math.ceil(100 * filledFields / totalFields);
            $("#progress-inputs .progress-bar").attr("aria-valuenow", percent).width(percent + "%");
            $("#sr-only").html(percent + "% Complete");

            return percent;
        }

        //Input Progress
        var totalFields = $("#input-progress").find("input, select, textarea").length;
        $("#input-progress").click(function () {
            updateInputProgress();
        });
        $("#input-progress .btn-primary").click(function () {
            var percent = updateInputProgress();
            if (percent === 100) {
                alert("Finished inputs successfully!");
            }
        })

    });

</script>
</body>
</html>



