<?php
    require_once 'gestion_upload_files.php';
    require_once 'modele/BD.php';
    require_once 'modele/PieceJointe.php';

    /** Valide l'ajout d'un CV PDF et vérifie que le champ est bien rempli ou non et s'adapte en conséquence
     * @author Thibaud CENENT
     * @version 1.4
     */
    if($_POST['ajoutcvpdf'] == "Ajouter CV PDF")
    {
        $id_cv_recupere = $_GET['numero'];
        upload_files($id_cv_recupere, 'cvpdf');
        header('Location: afficher_cv?numero=' . $id_cv_recupere . '&reponse=13');
    }
    else if($_POST['ajoutcvpdf'] == 'Annuler')
    {
        header('Location: afficher_cv?numero=' . $_GET['numero']);
    }
    else if($_POST['ajoutpdf'] == "Ajouter un CV PDF")
    {
        header('Location: ajouter_cv_pdf?numero=' . $_GET['numero']);
    }
    require_once 'vue/ajouter_cv_pdf.php';
?>