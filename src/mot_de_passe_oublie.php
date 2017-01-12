<?php

if (isset($_POST['mail']))
{
    $presente = Utilisateur::est_presente($_POST['mail']);
    if ($presente)
    {
        Courriel::envoyer_courriel_mot_de_passe_oublie($_POST['mail']);
        require_once('vue/mot_de_passe_oublie_envoye.php');
    }
}
else
{
    require_once('vue/mot_de_passe_oublie.php');
}