<?php
require_once ('modele/Courriel.php');
require_once ('modele/Recruteur.php');



if (isset($_POST['mail']))
{
    if (Recruteur::est_presente($_POST['mail']))
    {
        Courriel::envoyer_courriel_mot_de_passe_oublie($_POST['mail']);
        $alert = 1;
        require_once 'vue/mot_de_passe_oublie.php';
    }
    else
    {
        $alert = 2;
        require_once 'vue/mot_de_passe_oublie.php';
    }
}
else
{
    require_once 'vue/mot_de_passe_oublie.php';
}