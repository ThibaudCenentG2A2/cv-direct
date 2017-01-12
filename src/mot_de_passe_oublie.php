<?php

require_once ('modele/Utilisateur.php');
require_once ('modele/Courriel.php');

if (isset($_POST['mail']))
    if (Utilisateur::est_presente($_POST['mail']))
    {
        Courriel::envoyer_courriel_mot_de_passe_oublie($_POST['mail']);
        require_once('vue/mot_de_passe_oublie_envoye.php');
    }
    else
    {
        require_once('vue/mot_de_passe_oublie.php');
        echo 'Email non reconnu';
    }
else
    require_once('vue/mot_de_passe_oublie.php');