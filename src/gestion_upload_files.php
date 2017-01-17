<?php

    /**
     * Fichier contenant les fonctions gérant la mise ou non des pièces jointes sur le serveur
     * @author Thibaud CENENT
     * @version 1.1
     */

    /** Gére si possible l'upload des pièces jointes sur le serveur ainsi que la vérification et des champs entrés pour la création ou la modification des CV
     * @param $id_cv
     * @param $nom_file
     * @return bool
     */
    function upload_files($id_cv, $nom_file)
    {
        if(!empty($_FILES[$nom_file])AND $_FILES[$nom_file]['error'] == 0)
        {
            $token = PieceJointe::verifier_presence_token();
            $infos_Fichier = pathinfo($_FILES[$nom_file]['name']);
            $extension_Upload = $infos_Fichier['extension'];
            if($nom_file == 'assurance' AND ($extension_Upload == 'jpg' OR $extension_Upload == 'pdf'))
                PieceJointe::inserer($id_cv, 'Assurance', $extension_Upload, $token);
            else if($nom_file == 'photo' AND ($extension_Upload == 'jpg' OR $extension_Upload == 'png' OR $extension_Upload == 'jpeg'))
                PieceJointe::inserer($id_cv, 'PhotoCV', $extension_Upload, $token);
            else if($nom_file == 'cvpdf' AND $extension_Upload == 'pdf')
                PieceJointe::inserer($id_cv, 'CVPDF', $extension_Upload, $token);
            $chemin = "cv/pieces_jointes/" . $token . "." . $extension_Upload;
            move_uploaded_file($_FILES[$nom_file]['tmp_name'], $chemin);
            return true;
        }
        return false;
    }

    /** Fonction renvoyant le code erreur associé à un champ inséré lors de la création ou de la mise à jour d'un CV, retourne 0 sinon
     * @param $nom
     * @param $prenom
     * @param $portable
     * @param $fixe
     * @param $adresse
     * @param $code_postal
     * @param $ville
     * @return int
     */
    function verif_infos_cv($nom, $prenom, $portable, $fixe, $adresse, $code_postal, $ville)
    {
        if(!empty($nom) && preg_match('`^[a-zA-ZÂÊÎÔÛÄËÏÖÜÀÆæÇÉÈŒœÙàáâäçèéêëìíîïñòóôöùúûüýÿ]+(?:[\/\-\.\'][a-zA-ZÂÊÎÔÛÄËÏÖÜÀÆæÇÉÈŒœÙàáâäç
        èéêëìíîïñòóôöùúûüýÿ]+)*$`', $nom))
            return 1;
        if(!empty($prenom) && preg_match('`^[a-zA-ZÂÊÎÔÛÄËÏÖÜÀÆæÇÉÈŒœÙàáâäçèéêëìíîïñòóôöùúûüýÿ]+(?:[\/\-\.\'][a-zA-ZÂÊÎÔÛÄËÏÖÜÀÆæÇÉÈŒœÙàáâäç
        èéêëìíîïñòóôöùúûüýÿ]+)*$`', $prenom))
            return 2;
        if(!empty($portable) && preg_match('[0-9]{10}', $portable))
            return 3;
        if(!empty($fixe) && preg_match('[0-9]{10}', $fixe))
            return 4;
        if(!empty($adresse) && preg_match('^[a-zA-Z0-9]+', $adresse))
            return 5;
        if(!empty($code_postal)&& preg_match('#^[0-9]{5}$#', $code_postal))
            return 6;
        if(!empty($ville) && preg_match('[A-Za-z]+', $ville))
            return 7;
        return 0;
    }

    function supprimer_pieces_jointes_cv(CV $cv_a_supprimer)
    {
        foreach ($cv_a_supprimer->get_liste_pieces_jointe() as $piece_jointe)
            unlink("cv/pieces_jointes/" . $piece_jointe->get_token() . "." . $piece_jointe->get_extension());
        foreach ($cv_a_supprimer->get_liste_cv_pdf() as $cv_pdf)
            unlink("cv/pieces_jointes/" . $cv_pdf->get_token() . "." . $cv_pdf->get_extension());
    }

?>
