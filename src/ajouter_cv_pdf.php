<?php
    require_once 'header.php';

    require_once 'gestion_action_utilisateur.php';
    require_once 'gestion_cv_pieces_jointes.php';
    require_once 'modele/BD.php';
    require_once 'modele/PieceJointe.php';

    /** Valide l'ajout d'un CV PDF et vérifie que le champ est bien rempli ou non et s'adapte en conséquence
     * @author Thibaud CENENT
     * @version 1.4
     */
    if(isset($_GET['reponse']))
    {
        $reponse = afficher_type_changement($_GET['reponse']);
        require_once 'vue/ajouter_cv_pdf.php';
    }
    else if($_POST['ajoutcvpdf'] == "Ajouter CV PDF")
    {
        $id_cv_recupere = $_GET['numero'];
        if(upload_piece_jointe($id_cv_recupere , 'cvpdf') == false)
            header('Location: ajouter_cv_pdf?numero=' . $_GET['numero'] . '&reponse=15');
        header('Location: afficher_cv?numero=' . $id_cv_recupere . '&reponse=13');
    }
    else if($_POST['ajoutcvpdf'] == 'Annuler')
        header('Location: afficher_cv?numero=' . $_GET['numero']);

    require_once 'vue/ajouter_cv_pdf.php';
