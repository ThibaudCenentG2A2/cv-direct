<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 16/01/2017
 * Time: 12:09
 */
require_once 'header.php';
require_once 'modele/Recruteur.php';

if (isset($_POST['pseudo_inscription']) &&
    isset($_POST['prenom_inscription']) && $_POST['nom_inscription'] && isset($_POST['mail_inscription']) && isset($_POST['mot_de_passe']))

    Recruteur::inscrire_utilisateur($_POST['pseudo_inscription'],$_POST['prenom_inscription'],$_POST['nom_inscription'],$_POST['mail_inscription'],$_POST['mot_de_passe']);

require_once 'vue/page_inscription.php';
?>