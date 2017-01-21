<?php
    /** Contrôleur gérant la suppression ou non de la photo sur un CV d'une personne en particulier
    * @author Thibaud CENENT
    * @version 1.0
    */

    require_once 'modele/BD.php';
    require_once 'modele/PieceJointe.php';

    $photo = PieceJointe::afficher($_GET['idpj']);
    if($_POST['supprimer'] == 'Supprimer')
    {
        unlink('cv/pieces_jointe/'. $photo->get_token() . '.' . $photo->get_extension());
        PieceJointe::supprimer($_GET['idpj']);
        header('Location: afficher_cv?numero=' . $_GET['numero'] . '&reponse=18');
    }
    else if($_POST['supprimer'] == 'Annuler')
        header('Location: afficher_cv?numero=' . $_GET['numero']);
    require_once 'vue/supprimer_photo.php';