<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 16/01/2017
 * Time: 12:09
 */
require_once ('../modele/Recruteur.php');
Recruteur::inscrire_utilisateur($_POST['pseudo_inscription'],$_POST['prenom_inscription'],$_POST['nom_inscription'],$_POST['mail_inscription'],$_POST['mot_de_passe']);
?>