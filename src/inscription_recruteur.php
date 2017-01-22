<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 16/01/2017
 * Time: 12:09
 */
require_once 'header.php';

require_once 'modele/Recruteur.php';
require_once 'modele/Courriel.php';
$alerteUser=0;
if (isset($_POST['pseudo_inscription']) &&
    isset($_POST['prenom_inscription']) && $_POST['nom_inscription'] && isset($_POST['mail_inscription']) && isset($_POST['mot_de_passe']))
{
    if(Recruteur::est_presente($_POST['mail_inscription'])==false)
    {
        Recruteur::inscrire_utilisateur($_POST['pseudo_inscription'], $_POST['prenom_inscription'], $_POST['nom_inscription'], $_POST['mail_inscription'], Recruteur::encryptage_mdp($_POST['mot_de_passe']));
        $alerteUser = 2;
        header('Location:index.php?alerteUser=' . $alerteUser);
    }
    else
    {
        $alerteUser=3;
        header("Location: inscription_recruteur.php?alerteUser=" . $alerteUser);
    }
}
require_once 'vue/page_inscription.php'

?>