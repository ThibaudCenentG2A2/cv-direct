<?php

require_once ('modele/Recruteur.php');
require_once ('modele/Courriel.php');

if (isset($_POST['mail']))
{
    if (Recruteur::est_presente($_POST['mail']))
    {
        Courriel::envoyer_courriel_mot_de_passe_oublie($_POST['mail']);
        echo '<div class="alert alert-icon alert-success" role="alert"></div>';
    }
    else
        echo 'Email non reconnu. Veuillez un email associé a un compte.';
    require_once('vue/mot_de_passe_oublie.php');
}
else
    require_once('vue/mot_de_passe_oublie.php');