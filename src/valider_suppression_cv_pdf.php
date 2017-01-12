<?php
    session_start();
    include '../modele/connexion_bd.php';
    require '../modele/CV_PDF.php';
    use \nsCV\CV_PDF;

    /**
     *Gére la suppression ou non d'un CV PDF en fonction du choix du recruteur.
     * @author Thibaud CENENT
     * @version 1.1
     */
    if($_POST['action'] == 'Supprimer')
    {
        $id_CV_PDF_A_Supprimer =  $_GET['id'];
        $id_CV = $_GET['numero'];
        $cv_PDF_Supprime = new CV_PDF($id_CV_PDF_A_Supprimer, $id_CV);
        $cv_PDF_Supprime->supprimer();
        //header('Location:../vue/afficher_tous_les_cv.php');
        echo 'Suppression du CV PDF effectuée';
    }
    else if($_POST['action'] == 'Annuler')
    {
        //header('Location:../vue/afficher_tous_les_cv.php');
        echo 'Suppression refusée';
    }
    else
    {
        header('Location: ../vue/supprimer_cv_pdf.php');
    }
?>