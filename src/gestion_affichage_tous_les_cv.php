<?php
    session_start();
    require 'modele/CV.php';

    /**
     *Gestion de l'affichage de tous les CV de la BD en fonction des restrictions de pagination imposées
     * @author Thibaud CENENT
     * @version 1.0
     */

    include '../vue/afficher_tous_les_cv.php';
    $liste_cv_bd = CV::afficher_tous_les_CV();
    foreach ($liste_cv_bd as $cv_a_afficher)
    {
        echo '<a href="gestion_affichage_cv.php?numero='.$cv_a_afficher->get_id_cv().'"><img src="../images_site/cv.png"> </a>';
        echo '<br/> <br/>';
        echo '<p style="margin-left: 60px;">' . $cv_a_afficher->__toString() . "</p>";
        echo '<br/> <br/> <br/> <br/>';
    }
    echo '<br/> <br/>';
    echo '<p align="center">Page : ';
    for($i = 1; $i <= CV::get_nombres_pages_necessaires(); $i++)
    {
        if($i == CV::get_page_actuelle())
        {
            echo ' <a href="gestion_affichage_tous_les_cv.php?page=' . CV::get_page_actuelle() . '"> ' . $i . '</a> ';
            echo '  ';
            echo ' <a href="gestion_affichage_tous_les_cv.php?page=' . $i++ . '"> ' . $i . '</a> ';
            echo ' ... ';
            echo ' <a href="gestion_affichage_tous_les_cv.php?page=' . CV::get_nombres_pages_necessaires() . '"> ' . CV::get_nombres_pages_necessaires() . '</a> ';
            echo '     ';
            echo ' <a href="gestion_affichage_tous_les_cv.php?page=' . $i++ . '"> Suivant </a> ';
        }
        else
        {
            echo ' <a href="gestion_affichage_tous_les_cv.php?page=' . $i . '"> ' . $i . '</a> ';
        }
    }
    echo '</p>';
?>