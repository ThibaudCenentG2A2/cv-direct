<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 16/01/2017
 * Time: 12:09
 */
require_once ('../modele/Recruteur.php');
$uer= new Utilisateur($_POST['pseudo'],$_POST['mdp']);
?>