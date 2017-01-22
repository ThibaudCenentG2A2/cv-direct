<?php
require_once 'modele/Recruteur.php';
if (isset($_POST['mdp1']) && isset($_POST['mdp2']) && isset($_GET['mail']))
{
    $mdp = htmlentities($_POST['mdp1']);
    $mail = htmlentities($_GET['mail']);
    if ($mdp == $_POST['mdp2'])
    {
        $erreur = Recruteur::modifier_mot_de_passe($mail, $mdp);

        if ($erreur == null)
        {
            header('Location: http://cv-direct.alwaysdata.net/index?alerte=2');
        }
        else
        {
            $alerte = 3;
            require_once 'vue/changer_mot_de_passe.php';
        }
    }
    else
    {
        $alerte = 1;
        require_once 'vue/changer_mot_de_passe.php';
    }
}
else
{
    if (isset($_GET['mail']))
        require_once 'vue/changer_mot_de_passe.php';
    else
        header('Location: accueil');
}