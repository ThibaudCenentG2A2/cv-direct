<?php
    require_once 'header.php';

    require_once 'gestion_cv_pieces_jointes.php';
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
            ,$_POST['adresse'], $_POST['code_postal'], $_POST['ville']); // On utilise verif_infos_cv() qui va récupérer tous les champs saisis ou non lors de la création afin de savoir si ils respectent les expressions rationnelles posées
        if($verif_creer_cv_possible != 0) // Si il y a eu une erreur lors du champ saisie
           header('Location: creer_cv?reponse=' . $verif_creer_cv_possible); // On redirige vers creer_cv en expliquant pourquoi la création a échoué
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
        if(upload_piece_jointe($id_cv_recupere, 'assurance') == false) // Si l'upload de l'assurance ne réussit pas
            header('Location: creer_cv?reponse=9'); // On redirige vers creer_cv avec l'erreur correspondante
        if(upload_piece_jointe($id_cv_recupere, 'photo') == false)
            header('Location: creer_cv?reponse=16');
        if(upload_piece_jointe($id_cv_recupere , 'cvpdf') == false)
            header('Location: creer_cv?reponse=15');
        header('Location: afficher_tous_les_cv?reponse=10');
    }
    else if($_POST['creer'] == "Annuler")
       header('Location: afficher_tous_les_cv');

    else if($_POST['ajout'] == "Ajouter un CV")
        header('Location: creer_cv');

    require_once 'vue/creer_cv.php';

