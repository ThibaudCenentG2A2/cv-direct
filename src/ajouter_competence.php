<?php

require_once 'modele/Competences.php';

if (isset($_POST['ValidButton']) && isset($_POST['competences']) && isset($_POST['categorie']))
{
    // Si la catégorie n'existe pas
    if (!Competences::categorie_existe(htmlspecialchars($_POST['categorie'])))
    {
        // Affichage du message d'alerte approprié et on ré-affiche les données tapées
        $alert = 1;
        $competences = htmlspecialchars($_POST['categorie']);
    }

    // Si la catégorie existe
    else
    {
        // Récupération des compétences une par une et ajout en BD après protection
        $competences_form = htmlspecialchars($_POST['competences']);
        $competences = explode(", ", $competences_form);
        Competences::ajouter_les_competences($competences, htmlspecialchars($_POST['categorie']));
        $alert = 2;
    }
}

require_once 'vue/ajouter_competence.php';