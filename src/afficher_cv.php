<?php
    require_once 'header.php';

    require_once 'modele/BD.php';
    require_once 'modele/CV.php';
    require_once 'modele/PieceJointe.php';
    require_once 'gestion_action_utilisateur.php';

    /** Gére l'affichage et la mise en page d'un CV en particulier avec son contenu et ses pièces jointes
     * @author Thibaud CENENT
     * @version 1.0
     */
    $cv_a_afficher = CV::afficher($_GET['numero']);
    $photo = $cv_a_afficher->get_piece_jointe('PhotoCV');
    $contrat_assurance = $cv_a_afficher->get_piece_jointe('Assurance');
    $liste_pdf = $cv_a_afficher->get_liste_cv_pdf();
    if(isset($_GET['reponse'])) // Si on a eu un changement relatif par rapport à ce CV
    {
        $reponse = afficher_type_changement($_GET['reponse']); // On récupére la mise à jour effectué sur ce CV
        require_once('vue/afficher_cv.php');
    }
    require_once('vue/afficher_cv.php');
