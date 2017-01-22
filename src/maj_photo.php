<?php
    require_once 'header.php';

    /**
     * Contrôleur sur la modification de la photo qui va réagir différement sur la vue en fonction si la personne concernée par le CV a une photo ou non.
     * @author Thibaud CENENT
     * @version 1.1
     */

    require_once 'gestion_action_utilisateur.php';
    require_once 'modele/BD.php';
    require_once 'modele/CV.php';
    require_once 'modele/PieceJointe.php';

    $id_cv = $_GET['numero']; // On récupére l'identifiant du CV passé à travers $_GET
    if(isset($_GET['reponse'])) // Si y a eu une erreur lors de l'upload de la nouvelle photo de profil
    {
        $reponse = afficher_type_changement($_GET['reponse']);
        if (isset($_GET['idpj'])) // Si l'identifiant de la pièce jointe est défini
        {
            $id_piece_jointe = $_GET['idpj']; // On récupére l'id pièce jointe par le biais de $_GET qui correspond à une photo déja existante dans la BD
            $photo = PieceJointe::afficher($id_piece_jointe);
            require_once 'vue/maj_photo.php';
        }
        require_once 'vue/maj_photo.php'; // On se place dans le cas où n'avons pas encore de photo de profil stocké dans la BD
    }
    else // On se place dans la situation où il n'y a pas eu d'erreur
    {
        if (isset($_GET['idpj']))
        {
            $id_piece_jointe = $_GET['idpj'];
            $photo = PieceJointe::afficher($id_piece_jointe); // On récupére l'objet Pièce Jointe grâce à son identifiant passé en paramètre
            require_once 'vue/maj_photo.php';
        }
        require_once 'vue/maj_photo.php';
    }
