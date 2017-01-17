<?php

    /** Fichier gérant la gestion des actions effectués par l'utilisateur sur le site
    * @author Thibaud CENENT
    * @version 1.0
    */

    /** Affiche une string associé au type d'action provoquant un changement ou une erreur par l'utilisateur lors de son parcours sur le site
     * @param $numero
     * @return string
     */
    function afficher_type_changement($numero)
    {
        switch ($numero)
        {
            case 1:
                return "Le nom doit commencer par une majuscule suivie de minuscules";
            case 2:
                return "Le prénom doit commencer par une majuscule suivie de minuscules";
            case 3:
                return "Le numéro de téléphone portable ne doit être constitué que de 10 chiffres";
            case 4:
                return "Le numéro de téléphone fixe ne doit être constitué que de 10 chiffres";
            case 5:
                return "Erreur de syntaxe dans l'adresse ";
            case 6:
                return "Le code postal est constitué au maximum de 5 chiffres";
            case 7:
                return "Le nom de la ville doit être inscrit uniquement avec des majuscules";
            case 8:
                return "Erreur lors de l'upload de l'assurance, veuillez réessayer svp";
            case 9:
                return "Votre CV a bien été ajouté";
            case 10:
                return "Votre CV a bien été mis à jour";
            case 11:
                return "Votre CV a bien été supprimé";
            case 12:
                return "Votre CV PDF a bien été ajouté";
            case 13:
                return "Votre CV PDF a bien été supprimé";
        }
    }
?>