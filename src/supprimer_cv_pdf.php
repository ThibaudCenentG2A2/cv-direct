<?php
    require_once 'modele/BD.php';
    require_once 'modele/CV.php';
    require_once 'modele/PieceJointe.php';
    /**
     *Gére la suppression ou non d'un CV PDF en fonction du choix du recruteur.
     * @author Thibaud CENENT
     * @version 1.4
     */

    if($_POST['action'] == 'Supprimer')
    {
        $id_cv_pdf_a_supprimer =  $_GET['idpdf'];
        PieceJointe::supprimer($id_cv_pdf_a_supprimer);
        $piece_jointe_supprime = PieceJointe::afficher($id_cv_pdf_a_supprimer);
        unlink("cv/pieces_jointes/". $piece_jointe_supprime->get_token() . "." . $piece_jointe_supprime->get_extension());
        header('Location: afficher_cv?numero=' . $_GET['numero'] . '&reponse=14');
    }
    else if($_POST['action'] == 'Annuler')
    {
        header('Location: afficher_cv?numero=' . $_GET['numero']);
    }
    require_once 'vue/supprimer_cv_pdf.php';
?>