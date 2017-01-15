<?php

    /** Fichier gérant la gestion des actions effectués par l'utilisateur sur le site
    * @author Thibaud CENENT
    * @version 1.0
    */
    /** Affiche une string associé au type d'action provoquant un changement ou une erreur par l'utilisateur lors de son parcours sur le site
    * @param $numero
    */
    function afficher_type_changement($numero)
    {
        switch ($numero)
        {
            case 1:
                echo "Le nom doit commencer par une majuscule suivie de minuscules";
                break;
            case 2:
                echo "Le prénom doit commencer par une majuscule suivie de minuscules";
                break;
            case 3:
                echo "Le numéro de téléphone portable ne doit être constitué que de 10 chiffres";
                break;
            case 4:
                echo "Le numéro de téléphone fixe ne doit être constitué que de 10 chiffres";
                break;
            case 5:
                echo "Erreur de syntaxe dans l'adresse ";
                break;
            case 6:
                echo "Le code postal est constitué au maximum de 5 chiffres";
                break;
            case 7:
                echo "Le nom de la ville doit être inscrit uniquement avec des majuscules";
                break;
            case 8:
                echo "Erreur lors de l'upload de l'assurance, veuillez réessayer svp";
                break;
            case 9:
                echo "Erreur lors de l'upload de la photo, veuillez réessayer svp";
                break;
            case 10:
                echo "Votre CV a bien été ajouté";
                break;
            case 11:
                echo "Votre CV a bien été mis à jour";
                break;
            case 12:
                echo "Votre CV a bien été supprimé";
                break;
            case 13:
                echo "Votre CV PDF a bien été ajouté";
                break;
            case 14:
                echo "Votre CV PDF a bien été supprimé";
                break;
        }
    }
?>