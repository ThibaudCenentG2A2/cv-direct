<?php
    require 'modele/BD.php';
    require 'modele/CV_PDF.php';
    require 'modele/Piece_Jointe.php';

    /** Valide l'ajout d'un CV PDF et vérifie que le champ est bien rempli ou non et s'adapte en conséquence
     * @author Thibaud CENENT
     * @version 1.1
     *
     */

    if($_POST['ajout_cv-pdf'] == "Ajouter CV PDF")
    {
        if(isset($_FILES['cv_pdf']))
        {
            $id_CV_Recupere = $_GET['numero'];

            $cv_PDF_Cree = new CV_PDF(null, $id_CV_Recupere);
            $cv_PDF_Cree->creer();

            $piece_Jointe_Uploade = new Piece_Jointe(null, $id_CV_Recupere, null, null, null);
            if(isset($_FILES['cv_pdf']) AND $_FILES['cv_pdf']['error'] == 0)
            {
                $infos_Fichier = pathinfo($_FILES['cv_pdf']['name']);
                $extension_Upload = $infos_Fichier['extension'];
                if($extension_Upload == 'pdf')
                {
                   $piece_Jointe_Uploade->set_extension($extension_Upload);
                   $piece_Jointe_Uploade->set_type('CVPDF');
                   $piece_Jointe_Uploade->set_token($piece_Jointe_Uploade->get_generer_token_aleatoire());
                   $chemin = "cv/pieces_jointes/". $piece_Jointe_Uploade->get_token() . "." . $extension_Upload;
                   move_uploaded_file($_FILES['cv_pdf']['tmp_name'], $chemin);
                }
            }

            header('Location: gestion_affichage_cv.php?numero=' . $id_CV_Recupere);
        }
    }
    else if($_POST['ajout_cv-pdf'] == 'Annuler')
    {
        header('Location: gestion_affichage_cv.php?numero=' . $_GET['numero']);
    }
    else
    {
        header('Location: vue/ajouter_cv_pdf.php?numero=' . $_GET['numero']);
    }
?>