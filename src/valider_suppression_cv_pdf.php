<?php

    require 'modele/BD.php';
    require 'modele/CV_PDF.php';
    require 'modele/Piece_Jointe.php';

    /**
     *Gére la suppression ou non d'un CV PDF en fonction du choix du recruteur.
     * @author Thibaud CENENT
     * @version 1.2
     */

    if($_POST['action'] == 'Supprimer')
    {
        $id_CV_PDF_A_Supprimer =  $_GET['id'];
        $id_Piece_Jointe_CV_PDF = $_GET['idpj'];
        $id_CV = $_GET['numero'];
        $cv_PDF_Supprime = new CV_PDF($id_CV_PDF_A_Supprimer, $id_CV);
        $cv_PDF_Supprime->supprimer();
        $piece_Jointe_Supprime = new Piece_Jointe($id_Piece_Jointe_CV_PDF, $id_CV, null, null, null);
        $piece_Jointe_Supprime = $piece_Jointe_Supprime->afficher();
        unlink("cv/pieces_jointes/". $piece_Jointe_Supprime->get_token() . "." . $piece_Jointe_Supprime->get_extension());
        header('Location: gestion_affichage_cv.php?numero=' . $id_CV);
    }
    else if($_POST['action'] == 'Annuler')
    {
        header('Location: gestion_affichage_cv.php?numero=' . $_GET['numero']);
    }
    else
    {
        header('Location: vue/supprimer_cv_pdf.php?numero=' . $_GET['numero'] . '&amp;id=' . $_GET['id'] . '&amp;idpj=' . $_GET['idpj']);
    }
?>