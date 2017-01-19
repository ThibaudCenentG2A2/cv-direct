<?php
    require_once 'gestion_upload_files.php';
    require_once 'modele/BD.php';
    require_once 'modele/CV.php';
    require_once 'modele/PieceJointe.php';
    require_once 'gestion_action_utilisateur.php';

    /**
     * Gére et récupére les informations à la création d'un CV pour chaque utilisateur en renvoyant vers la page de création en cas d'erreur pour l'importation de pièces jointes.
     * @author Thibaud CENENT
     * @version 1.6
     */

    if(isset($_GET['reponse']))
    {
        $reponse = afficher_type_changement($_GET['reponse']);
        require_once 'vue/creer_cv.php';
    }
    if($_POST['creer'] == "Creer CV")
    {
        $verif_creer_cv_possible = verif_infos_cv($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['num_portable'], $_POST['num_fixe']
            ,$_POST['adresse'], $_POST['code_postal'], $_POST['ville']);
        if($verif_creer_cv_possible != 0)
        {
           header('Location: creer_cv?reponse=' . $verif_creer_cv_possible);
        }
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $num_secu = $_POST['num_secu_sociale'];
        $num_portable = $_POST['num_portable'];
        $num_fixe = $_POST['num_fixe'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $id_cv_recupere = CV::inserer($num_secu, $num_portable, $num_fixe, $adresse, $code_postal, $ville, $nom, $prenom, $pseudo);
        if(!(upload_files($id_cv_recupere, 'assurance')))
        {
            header('Location: creer_cv?reponse=9');
        }
        upload_files($id_cv_recupere, 'photo');
        upload_files($id_cv_recupere , 'cvpdf');
        header('Location: afficher_tous_les_cv?reponse=10');
    }
    else if($_POST['creer'] == "Annuler")
    {
       header('Location: afficher_tous_les_cv');
    }
    else if($_POST['ajout'] == "Ajouter un CV")
    {
        header('Location: creer_cv');
    }
    require_once 'vue/creer_cv.php';
?>