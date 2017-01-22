<?php

require_once 'header.php';

require_once 'modele/Competences.php';

if (isset($_POST['ValidButton']) && isset($_POST['categorie']))
{
    $categorie = htmlspecialchars($_POST['categorie']);

    // Si la catégorie existe déjà
    if (Competences::categorie_existe_nom($categorie))
        // Affichage du message d'alerte approprié et on ré-affiche les données tapées
        $alert = 1;

    // Si la n'existe catégorie pas
    else
    {
        Competences::ajouter_la_categorie($categorie);
        $alert = 2; // message de succès
    }
}

require_once 'vue/ajouter_categorie.php';