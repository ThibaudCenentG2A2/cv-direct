<?php
require_once 'header.php';
    require_once 'modele/BD.php';
    require_once 'modele/PieceJointe.php';
    require_once 'modele/CV.php';
    require_once 'gestion_cv_pieces_jointes.php';

    /**
     *Gére la suppression ou non d'un CV en fonction du choix du recruteur.
     * @author Thibaud CENENT
     * @version 1.4
     */

    if($_POST['action'] == 'Supprimer')
    {
        $id_cv_a_supprimer = $_GET['numero'];
        $cv_a_supprimer = CV::afficher($id_cv_a_supprimer);
        CV::supprimer($id_cv_a_supprimer);
        supprimer_pieces_jointes_cv($cv_a_supprimer);
        header('Location: afficher_tous_les_cv?reponse=12');
    }
    else if($_POST['action'] == 'Annuler')
        header('Location: afficher_cv?numero=' . $_GET['numero']);

    require_once 'vue/supprimer_cv.php';
