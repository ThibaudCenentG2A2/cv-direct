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
    if(isset($_GET['reponse'])) // Si il y a eu une erreur lors de l'upload du CV PDF
    {
        $reponse = afficher_type_changement($_GET['reponse']); // On récupère l'erreur correspondante
        require_once 'vue/ajouter_cv_pdf.php';
    }
    else if($_POST['ajoutcvpdf'] == "Ajouter CV PDF")
    {
        $id_cv_recupere = $_GET['numero']; // On récupére l'identifiant du CV en particulier sur lequel on souhaite ajouter un CV PDF
        if(upload_piece_jointe($id_cv_recupere , 'cvpdf') == false) // Si l'upload ne s'est pas bien passée
            header('Location: ajouter_cv_pdf?numero=' . $_GET['numero'] . '&reponse=15'); // On redirige vers ce contrôleur avec l'erreur en particulier produite
        header('Location: afficher_cv?numero=' . $id_cv_recupere . '&reponse=13'); // On redirige vers le CV à afficher avec précision de l'ajout du nouveau CV PDF
    }
    else if($_POST['ajoutcvpdf'] == 'Annuler')
        header('Location: afficher_cv?numero=' . $_GET['numero']);

    require_once 'vue/ajouter_cv_pdf.php';
