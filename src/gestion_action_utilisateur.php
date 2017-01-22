<?php
    require_once 'header.php';

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
                return "Le pseudonyme doit être constitué d'une majuscule en première lettre suivi de minuscules et se terminant par un ou plusieurs chiffres";
            case 4:
                return "Le numéro de téléphone portable ne doit être constitué que de 10 chiffres";
            case 5:
                return "Le numéro de téléphone fixe ne doit être constitué que de 10 chiffres";
            case 6:
                return "Erreur de syntaxe dans l'adresse ";
            case 7:
                return "Le code postal est constitué au maximum de 5 chiffres";
            case 8:
                return "Le nom de la ville doit être inscrit uniquement avec des majuscules";
            case 9:
                return "Erreur lors de l'upload de l'assurance, veuillez réessayer svp (Rappel : Taille maximale autorisé à 400 Ko, Formats autorisés : JPG, JPEG, PNG)";
            case 10:
                return "Votre CV a bien été ajouté";
            case 11:
                return "Votre CV a bien été mis à jour";
            case 12:
                return "Votre CV a bien été supprimé";
            case 13:
                return "Votre CV PDF a bien été ajouté";
            case 14:
                return "Votre CV PDF a bien été supprimé";
            case 15:
                return "Erreur lors de l'upload du CV PDF, veuillez réessayer svp (Rappel : Taille maximale autorisé à 400 Ko, Format Autorisé : PDF)";
            case 16:
                return "Erreur lors de l'upload de la photo de profil, veuillez réessayer svp (Rappel : Taille maximale autorisé à 400 Ko, Formats autorisés : JPEG, JPG, PNG)";
            case 17 :
                return "Votre photo de profil a bien été mise à jour";
            case 18 :
                return "Votre photo de profil a bien été supprimée";
        }
    }