<?php
    require_once 'modele/BD.php';
    require_once 'modele/CV.php';
    require_once 'gestion_upload_files.php';
    require_once 'gestion_action_utilisateur.php';

    /**
     * Phase de validation de la modification du CV avec l'ajout probable d'un nouveau CV PDF où on a accepté d'appliquer les principales modifications.
     * @author Thibaud CENENT
     * @version 1.5
     */
    if(isset($_GET['reponse']))
    {
        $reponse = afficher_type_changement($_GET['reponse']);
        require_once 'vue/maj_cv.php';
    }
    if($_POST['majcv'] == "Enregistrer Modifications")
    {
        $verif_maj_cv_possible = verif_infos_cv($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['num_portable'], $_POST['num_fixe']
            ,$_POST['adresse'], $_POST['code_postal'], $_POST['ville']);
        if($verif_maj_cv_possible != 0)
        {
           header('Location: maj_cv?numero=' . $_GET['numero']. '&reponse=' . $verif_maj_cv_possible);
        }
        $id_Cv = $_GET['numero'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $num_portable = $_POST['num_portable'];
        $num_fixe = $_POST['num_fixe'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        CV::mettre_a_jour($id_Cv, $num_portable, $num_fixe, $adresse, $code_postal, $ville, $nom, $prenom, $pseudo);
        header('Location: afficher_cv?numero='.$_GET['numero'] .'&reponse=11');
    }
    else if($_POST['majcv'] == "Annuler")
    {
        header('Location: afficher_cv?numero='.$_GET['numero']);
    }
    require_once 'vue/maj_cv.php';
?>