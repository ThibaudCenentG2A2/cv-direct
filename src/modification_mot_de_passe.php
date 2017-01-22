<?php
echo '(ter';
require_once 'modele/Recruteur.php';
echo '0';
if (isset($_POST['mdp1']) && isset($_POST['mdp2']) && isset($_GET['mail']))
{
    $mdp = htmlentities($_POST['mdp1']);
    $mail = htmlentities($_GET['mail']);
    echo '1';
    if ($mdp == $_POST['mdp2'])
    {
        echo '2';
        $erreur = strlen(Recruteur::modifier_mot_de_passe($mail, $mdp));

        if ($erreur == null)
        {
            echo '3';
            header('Location: http://cv-direct.alwaysdata.net/index?alerte=2');
        }
        else
        {
            echo '4';
            $alerte = 3;
            require_once 'vue/changer_mot_de_passe.php';

        }
    }
    else
    {
        echo '5';
        $alerte = 1;
        require_once 'vue/changer_mot_de_passe.php';
    }
}
else
{
    echo '6';
    if (isset($_GET['mail']))
        require_once 'vue/changer_mot_de_passe.php';
    else
        header('Location: accueil');
}