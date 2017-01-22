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

        $competences_form = htmlspecialchars($_POST['competences']); // utilisée dans la vue
        $competences = preg_split('/(\s)*,(\s)*/', $competences_form); // à enregistrer dans la BD
        Competences::ajouter_les_competences($competences, intval($_POST['categorie'])); // enregistrement
        $alert = 2; // message de succès
    }
}

require_once 'vue/ajouter_competence.php';