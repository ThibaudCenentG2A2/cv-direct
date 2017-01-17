<?php
require_once ('modele/Courriel.php');
require_once ('modele/Recruteur.php');

header('Location: http://cv-direct.alwaysdata.net/vue/mot_de_passe_oublie.php');

if (!empty($_POST['mail']))
{
    if (Recruteur::est_presente($_POST['mail']))
    {
        Courriel::envoyer_courriel_mot_de_passe_oublie($_POST['mail']);
        echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Bravo!</strong> Better check yourself, you\'re not looking too good.</div>';
    }
    else
    {

    }
}
else
{

}