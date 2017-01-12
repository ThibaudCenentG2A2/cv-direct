<?php
    include '../modele/connexion_bd.php';
    require '../modele/CV.php';
    require '../modele/CV_PDF.php';
    require '../modele/Piece_Jointe.php';
    use \nsCV\CV;
    use \nsCV\CV_PDF;
    use \nsCV\Piece_Jointe;

    /**
     * Gére et récupére les informations à la création d'un CV pour chaque utilisateur en renvoyant vers la page de création en cas d'erreur pour l'importation de pièces jointes.
     * @author Thibaud CENENT
     * @version 1.4
     */

    if($_POST['creer'] == "Creer CV")
    {

        $num_Secu = $_POST['num_secu_sociale'];
        $num_Portable = $_POST['num_portable'];
        $num_Fixe = $_POST['num_fixe'];
        $adresse = $_POST['adresse'];
        $code_Postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $cv_Cree = new CV(null, $num_Secu, $num_Portable, $num_Fixe, $adresse, $code_Postal, $ville,
            $nom, $prenom);
        $id_CV_Recupere = $cv_Cree->inserer();
        $piece_Jointe_Uploade = new Piece_Jointe(null, $id_CV_Recupere, null, null,null);


        /**
         * Nous allons tester dans un premier temps que le contrat d'assurance upload a bien été reçu et qu'il ne contient pas d'erreur
         */
        if(isset($_FILES['assurance']) AND $_FILES['assurance']['error'] == 0)
        {
            $infos_Fichier = pathinfo($_FILES['assurance']['name']);
            $extension_Upload = $infos_Fichier['extension'];
            if($extension_Upload == 'jpg' OR $extension_Upload == 'pdf')
            {
                $piece_Jointe_Uploade->set_extension($extension_Upload);
                $piece_Jointe_Uploade->set_type('Assurance');
                $piece_Jointe_Uploade->set_token($piece_Jointe_Uploade->get_generer_token_aleatoire());
                $piece_Jointe_Uploade->creer();
                $chemin = "../cv/pieces_jointes/". $piece_Jointe_Uploade->get_token() . "." . $extension_Upload;
                move_uploaded_file($_FILES['assurance']['tmp_name'], $chemin);
            }
        }

        /**
         * Même principe pour la photographie
         */
        if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
        {
            $infos_Fichier = pathinfo($_FILES['photo']['name']);
            $extension_Upload = $infos_Fichier['extension'];
            if($extension_Upload == 'jpg' OR $extension_Upload == 'png' OR $extension_Upload == 'jpeg')
            {
                $piece_Jointe_Uploade->set_extension($extension_Upload);
                $piece_Jointe_Uploade->set_type('PhotoCV');
                $piece_Jointe_Uploade->set_token($piece_Jointe_Uploade->get_generer_token_aleatoire());
                $piece_Jointe_Uploade->creer();
                $chemin = "../cv/pieces_jointes/". $piece_Jointe_Uploade->get_token() . "." . $extension_Upload;
                move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
            }
        }

        $cv_PDF_Cree = new CV_PDF(null, $id_CV_Recupere);
        $cv_PDF_Cree->creer();

        /**
         * Même principe pour le CV au format PDF
         */
        if(isset($_FILES['cv_pdf']) AND $_FILES['cv_pdf']['error'] == 0)
        {
            $infos_Fichier = pathinfo($_FILES['cv_pdf']['name']);
            $extension_Upload = $infos_Fichier['extension'];
            if($extension_Upload == 'pdf')
            {
                $piece_Jointe_Uploade->set_extension($extension_Upload);
                $piece_Jointe_Uploade->set_type('CVPDF');
                $piece_Jointe_Uploade->set_token($piece_Jointe_Uploade->get_generer_token_aleatoire());
                $piece_Jointe_Uploade->creer();
                $chemin = "../cv/pieces_jointes/" . $piece_Jointe_Uploade->get_token() . "." . $extension_Upload;
                move_uploaded_file($_FILES['cv_pdf']['tmp_name'], $chemin);
            }
        }

        header('Location: gestion_affichage_tous_les_cv.php');

    }
    else if($_POST['creer'] == "Annuler")
    {
        header('Location: gestion_affichage_tous_les_cv.php');
    }
    else
    {
        header('Location: ../vue/creer_cv.php');
    }

?>