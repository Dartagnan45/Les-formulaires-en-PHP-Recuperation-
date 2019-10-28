<?php

echo 'Merci ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '' . ' de nous avoir contacté à propos de '. '' . $_POST['sujet']. '' .
'Un de nos conseiller vous contactera soit à l’adresse ' . '' .$_POST['email'].''. ' ou par téléphone au ' . '' . $_POST['number']. '' .
    ' dans les plus brefs délais pour traiter votre demande : ';
echo  "\n". $_POST['message'];
