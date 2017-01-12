<?php
    require 'modele/CV.php';
    require 'modele/CV_PDF.php';
    require 'modele/Piece_Jointe.php';

    $cv_a_afficher = new CV($_GET['numero'], null, null, null, null, null, null, null, null);
    $cv_a_afficher = $cv_a_afficher->afficher();
    echo 'CV N° : ' . $_GET['numero'] . '<br/> <br/>';
    echo ' Identité Civile <br/> <br/> ';
    echo 'Nom : ' . $cv_a_afficher->get_nom();
    echo '<br/> <br/>' . 'Prenom : ' . $cv_a_afficher->get_prenom();
    echo '<br/> <br/>' . 'Adresse : ' . $cv_a_afficher->get_adresse();
    echo '<br/> <br/>' . 'Code Postal : ' . $cv_a_afficher->get_code_postal();
    echo '<br/> <br/>' . 'Ville : ' . $cv_a_afficher->get_ville();
    echo '<br/> <br/>' . 'Numéro Téléphone Portable : ' . $cv_a_afficher->get_num_tel_portable();
    echo '<br/> <br/>' . 'Numéro Téléphone Fixe : ' . $cv_a_afficher->get_num_tel_fixe();
    echo '<br/> <br/>' . 'Numéro de Sécurité Sociale : ' . $cv_a_afficher->get_numero_secu_sociale();
    echo '<a href="valider_maj_cv.php?numero='.$cv_a_afficher->get_id_cv().'"><img src="images_site/maj.png"> </a>';
    echo '<a href="valider_suppression_cv.php?numero='.$cv_a_afficher->get_id_cv().'"><img src="images_site/supprimer.png"> </a>';
    echo '<br/> <br/>' . 'Contrat D Assurance Professionnel' . '<br/> <br/> <br/>';
    foreach($cv_a_afficher->get_liste_pieces_jointe() as $contrat_assurance)
    {
        if($contrat_assurance->get_type() == "Assurance")
        {
            echo '<a href="visualiser_assurance.php?numero='.$contrat_assurance->get_id_piece_jointe().'"><img src="images_site/supprimer.png/> </a>"';
        }
    }

?>