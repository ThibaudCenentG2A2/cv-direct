<?php
/**
 *
 * @author Thierry
 * @author Tristan DIETZ
 *
 * @version 1.2
 */
require_once 'header.php';
require_once 'modele/Recruteur.php';
$alerteUser=1;

if (isset($_POST['pseudo']) &&
    isset($_POST['mdp'])) {

    // Test de la connexion : initialisation des données-membres si l'utilisateur est connecté
    $user = new Recruteur($_POST['pseudo'], $_POST['mdp']);

    // En cas de succès :
    if ($user->getNom() != null && $user->getValid() == 0) {
        $_SESSION['pseudo'] = $user->getPseudo();
        $_SESSION['nom'] = $user->getNom();
        $_SESSION['prenom'] = $user->getPrenom();
        header('page_perso.php');
    }

    else
    {
        header("Location: $_SERVER[HTTP_REFERER]?alerteUser=".$alerteUser);

    }
}
