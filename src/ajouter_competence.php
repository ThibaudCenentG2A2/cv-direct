<?php

require_once 'vue/header.php';

require_once 'modele/Competences.php';

if (isset($_POST['ValidButton']) && isset($_POST['competences']) && isset($_POST['categorie']))
{
    if (Competences::categorie_existe(htmlspecialchars($_POST['categorie'])))
    //TODO insertion des nouvelles données + redirection vers liste
    echo 'OK';

    //header('Location: competences');
}

require_once 'vue/ajouter_competence.php';