<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 16/01/2017
 * Time: 12:09
 */
require_once 'header.php';
require_once 'modele/Recruteur.php';
if (isset($_POST['pseudo']) &&
    isset($_POST['mdp']))
{

$user= new Recruteur($_POST['pseudo'],$_POST['mdp']);

if($user->getNom()!=null)
{
    $_SESSION['pseudo'] = $user->getPseudo();
    $_SESSION['nom'] = $user->getNom();
    $_SESSION['prenom'] = $user->getPrenom();
}
}
?>