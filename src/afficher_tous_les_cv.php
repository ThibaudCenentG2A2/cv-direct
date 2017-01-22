<?php
    require_once 'header.php';

    require_once 'modele/BD.php';
    require_once 'modele/CV.php';
    require_once 'gestion_action_utilisateur.php';

    /**
     *Gestion de l'affichage de tous les CV de la BD en fonction des restrictions de pagination imposées
     * @author Thibaud CENENT
     * @version 1.1
     */

    $liste_cv_bd = CV::afficher_tous_les_cv();
    $i = CV::get_page_actuelle();
    $nbre_pages = CV::get_nombres_pages_necessaires();
    $suivant = $i+1;
    if(isset($_GET['reponse'])) // Si un CV a été ajouté ou supprimé
    {
        $reponse = afficher_type_changement($_GET['reponse']); // On récupére le changement effectué
        require_once('vue/afficher_tous_les_cv.php');
    }
    require_once('vue/afficher_tous_les_cv.php');
