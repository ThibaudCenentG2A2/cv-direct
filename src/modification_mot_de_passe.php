<?php
require_once 'modele/Recruteur.php';

//TODO finir verif mot de passe identique, insertion dans BD du nouveau mdp et variable global
if (isset($_POST['mdp1']) && isset($_POST['mdp2']))
{
    
    if ($_POST['mdp1'] == $_POST['mdp2'])
    {
        Recruteur::modifier_mot_de_passe($_GET['email'], $_POST['mdp1']);
        header('Location: http://cv-direct.alwaysdata.net/index?alerte=2');
    }
    else
    {
        $alerte = 1;
        require_once 'vue/changer_mot_de_passe.php';
    }
}
else
    require_once 'vue/changer_mot_de_passe.php';