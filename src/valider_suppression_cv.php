<?php

    session_start();
    include '../modele/connexion_bd.php';
    require '../modele/CV.php';
    require '../modele/Piece_Jointe.php';
    use \nsCV\CV;

    /**
     *Gére la suppression ou non d'un CV en fonction du choix du recruteur.
     * @author Thibaud CENENT
     * @version 1.1
     */
    if($_POST['action'] == 'Supprimer')
    {
        $id_CV_A_Supprimer = $_GET['numero'];
        $cv_A_Supprimer = new CV($id_CV_A_Supprimer, null, null, null, null, null, null, null, null);
        $cv_A_Supprimer->supprimer();

        /**
         * Gestion de suppression grâce à la fonction unlink()
         */
        foreach ($cv_A_Supprimer->afficher_pieces_jointes() as $piece_jointe)
        {
            unlink("../cv/pieces_jointes/" . $piece_jointe->get_token() . "." . $piece_jointe->get_extension());
        }
        header('Location: gestion_affichage_tous_les_cv.php');
    }
    else if($_POST['action'] == 'Annuler')
    {
        header('Location: gestion_affichage_tous_les_cv.php');
    }
    else
    {
        header('Location: ../vue/supprimer_cv.php');
    }
?>